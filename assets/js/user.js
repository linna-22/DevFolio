$(document).ready(function () {

    loadUsers();

    $("#userForm").on("submit", function (e) {

        e.preventDefault();

        // Decide whether to create or update
        let url = "../actions/user/store.php";

        if ($("#user_id").val() !== "") {
            url = "../actions/user/update.php";
        }

        $.ajax({

            url: url,
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",

            beforeSend: function () {

                Swal.fire({
                    title: "Saving...",
                    text: "Please wait...",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

            },

            success: function (response) {

                Swal.close();

                if (response.status === "success") {

                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: response.message,
                        timer: 1800,
                        showConfirmButton: false
                    }).then(() => {

                        $("#userForm")[0].reset();
                        $("#user_id").val("");

                        $("#modalTitle").text("Add New User");
                        $("#saveBtn").text("Save User");

                        toggleModal(false);

                        loadUsers();

                    });

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message
                    });

                }

            },

            error: function (xhr) {

                Swal.close();

                Swal.fire({
                    icon: "error",
                    title: "Server Error",
                    text: xhr.responseText
                });

            }

        });

    });

});
$(document).on("click", ".editBtn", function () {

    const id = $(this).data("id");

    $.ajax({

        url: "../actions/user/get.php",
        type: "GET",
        data: { id: id },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#user_id").val(response.data.id);
                $("#full_name").val(response.data.fullname);
                $("#gender").val(response.data.gender);
                $("#email").val(response.data.email);
                $("#job_title").val(response.data.job_title);
                $("#address").val(response.data.address);
                $("#role").val(response.data.role);
                // $("#role").val(response.data.role);

                // Don't fill the password field
                $("#password").val("");

                // Change the button text
                $("#modalTitle").text("Edit User");
                $("#saveBtn").text("Update User");


                // Open the modal
                toggleModal(true);

            } else {

                Swal.fire("Error", response.message, "error");

            }

        }

    });

});
$(document).on("click", ".deleteBtn", function () {

    const id = $(this).data("id");

    Swal.fire({
        title: "Delete User?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc2626",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancel"

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "../actions/user/delete.php",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "json",

                beforeSend: function () {

                    Swal.fire({
                        title: "Deleting...",
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                },

                success: function (response) {

                    Swal.close();

                    if (response.status === "success") {

                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            text: response.message,
                            timer: 1800,
                            showConfirmButton: false
                        });

                        loadUsers();

                    } else {

                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message
                        });

                    }

                },

                error: function () {

                    Swal.fire({
                        icon: "error",
                        title: "Server Error",
                        text: "Something went wrong."
                    });

                }

            });

        }

    });

});
function loadUsers() {

    $.ajax({

        url: "../actions/user/fetch.php",
        type: "GET",

        success: function (response) {

            $("#userTable").html(response);

        },

        error: function () {

            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Failed to load users."
            });

        }

    });

}