$(document).ready(function () {

    loadSocial();

    $("#socialForm").on("submit", function (e) {

        e.preventDefault();

        let url = "../actions/social/store.php";

        if ($("#social_id").val() !== "") {
            url = "../actions/social/update.php";
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

                        $("#socialForm")[0].reset();
                        $("#social_id").val("");

                        $("#modalTitle").text("Add New Social");
                        $("#saveBtn").text("Save Social");

                        toggleModal(false);

                        loadSocial();

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

        url: "../actions/social/get.php",
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#social_id").val(response.data.id);
                $("#name").val(response.data.name);
                $("#url").val(response.data.url);
                $("#logo").val(response.data.logo);
                $("#target").val(response.data.target);

                $("#modalTitle").text("Edit Social");
                $("#saveBtn").text("Update Social");

                toggleModal(true);

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: response.message
                });

            }

        }

    });

});

$(document).on("click", ".deleteBtn", function () {

    const id = $(this).data("id");

    Swal.fire({

        title: "Delete Social?",
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

                url: "../actions/social/delete.php",
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

                        loadSocial();

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

function loadSocial() {

    $.ajax({

        url: "../actions/social/fetch.php",
        type: "GET",

        success: function (response) {

            $("#socialTable").html(response);

        },

        error: function () {

            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Failed to load social records."
            });

        }

    });

}