console.log("Hi");
$(document).ready(function () {

    loadAbout();

    $("#aboutForm").on("submit", function (e) {

        e.preventDefault();

        // Decide whether to create or update
        let url = "../actions/about/store.php";

        if ($("#about_id").val() !== "") {
            url = "../actions/about/update.php";
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

                        $("#aboutForm")[0].reset();
                        $("#about_id").val("");

                        $("#modalTitleAbout").text("Add New about");
                        $("#saveBtn").text("Save");

                        toggleModal(false);

                        loadAbout();

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

        url: "../actions/about/get.php",
        type: "GET",
        data: { id: id },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#about_id").val(response.data.id);
                $("#position").val(response.data.position);
                $("#position_desc").val(response.data.position_desc);
                $("#skills").val(response.data.skills);
                $("#aboutme_title").val(response.data.aboutme_title);
                $("#aboutme_desc").val(response.data.aboutme_desc);
                $("#experience").val(response.data.experience);
                $("#completed_project").val(response.data.completed_project);

                // Change modal title and button text
                $("#modalTitleAbout").text("Edit About Information");
                $("#saveBtn").text("Update");

                // Open modal
                toggleModal(true);

            } else {

                Swal.fire("Error", response.message, "error");

            }

        }

    });

});
function loadAbout() {

    $.ajax({
        url: "../actions/about/fetch.php",
        type: "GET",
        dataType: "json",

        success: function (response) {

            $("#aboutTable").html(response.html);

            if (response.total >= 1) {
                $("#addaboutBtn").hide();
            } else {
                $("#addaboutBtn").show();
            }

        }
    });

}