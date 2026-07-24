$(document).ready(function () {

    loadProjects();

    $("#projectForm").on("submit", function (e) {

        e.preventDefault();

        let url = "../actions/project/store.php";

        if ($("#project_id").val() !== "") {
            url = "../actions/project/update.php";
        }

        let formData = new FormData(this);

        $.ajax({

            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",

            beforeSend: function () {

                Swal.fire({
                    title: "Saving...",
                    text: "Please wait...",
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
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

                        $("#projectForm")[0].reset();
                        $("#project_id").val("");

                        $("#preview").attr("src", "");
                        $("#imagePreview").addClass("hidden");

                        $("#modalTitle").text("Add New Project");
                        $("#saveBtn").text("Save Project");

                        toggleModal(false);

                        loadProjects();

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

        url: "../actions/project/get.php",
        type: "GET",
        data: { id: id },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#project_id").val(response.data.id);
                $("#title").val(response.data.title);
                $("#desc").val(response.data.desc);
                $("#url").val(response.data.url);
                $("#target").val(response.data.target);

                if (response.data.image != "") {

                    $("#preview").attr(
                        "src",
                        "../public/uploads/projects/" + response.data.image
                    );

                    $("#imagePreview").removeClass("hidden");

                } else {

                    $("#preview").attr("src", "");
                    $("#imagePreview").addClass("hidden");

                }

                $("#modalTitle").text("Edit Project");
                $("#saveBtn").text("Update Project");

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

        title: "Delete Project?",
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

                url: "../actions/project/delete.php",
                type: "POST",
                data: { id: id },
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

                        loadProjects();

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


function loadProjects() {

    $.ajax({

        url: "../actions/project/fetch.php",
        type: "GET",

        success: function (response) {

            $("#projectTable").html(response);

        },

        error: function () {

            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Failed to load projects."
            });

        }

    });

}