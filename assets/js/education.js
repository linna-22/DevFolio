$(document).ready(function () {

    loadEducation();

    $("#educationForm").on("submit", function (e) {

        e.preventDefault();

        let url = "../actions/education/store.php";

        if ($("#education_id").val() !== "") {
            url = "../actions/education/update.php";
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

                        $("#educationForm")[0].reset();
                        $("#education_id").val("");

                        $("#modalTitleEducation").text("Add New Education");
                        $("#saveBtn").text("Save Education");

                        toggleModal(false);

                        loadEducation();

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

        url: "../actions/education/get.php",
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#education_id").val(response.data.id);
                $("#school_name").val(response.data.school_name);
                $("#major").val(response.data.major);
                $("#major_detail").val(response.data.major_detail);
                $("#start_year").val(response.data.start_year);
                $("#end_year").val(response.data.end_year);

                $("#modalTitleEducation").text("Edit Education");
                $("#saveBtn").text("Update Education");

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
        title: "Delete Education?",
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

                url: "../actions/education/delete.php",
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

                        loadEducation();

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

function loadEducation() {

    $.ajax({

        url: "../actions/education/fetch.php",
        type: "GET",

        success: function (response) {

            $("#educationTable").html(response);

        },

        error: function () {

            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Failed to load education records."
            });

        }

    });

}