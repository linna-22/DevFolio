
$(document).ready(function () {

    loadHero();

    $("#heroForm").on("submit", function (e) {

        e.preventDefault();

        // Decide whether to create or update
        let url = "../actions/hero/store.php";

        if ($("#hero_id").val() !== "") {
            url = "../actions/hero/update.php";
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

                        $("#heroForm")[0].reset();
                        $("#hero_id").val("");

                        $("#modalTitleHero").text("Add New Hero Information");
                        $("#saveBtn").text("Save");

                        toggleModal(false);

                        loadHero();

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

        url: "../actions/hero/get.php",
        type: "GET",
        data: { id: id },
        dataType: "json",

        success: function (response) {

            if (response.status === "success") {

                $("#hero_id").val(response.data.id);
                $("#title").val(response.data.title);
                $("#desc").val(response.data.desc);
                $("#freelance_status").val(response.data.freelance_status);
                // Change the button text
                $("#modalTitleHero").text("Edit Hero Information");
                $("#saveBtn").text("Update");


                // Open the modal
                toggleModal(true);

            } else {

                Swal.fire("Error", response.message, "error");

            }

        }

    });

});
function loadHero() {

    $.ajax({
        url: "../actions/hero/fetch.php",
        type: "GET",
        dataType: "json",

        success: function(response) {

            $("#heroTable").html(response.html);

            if (response.total >= 1) {
                $("#addHeroBtn").hide();
            } else {
                $("#addHeroBtn").show();
            }

        }
    });

}