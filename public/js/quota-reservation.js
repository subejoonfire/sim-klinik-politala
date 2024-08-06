document.addEventListener("DOMContentLoaded", function () {
    // Modal Handling
    var addModal = document.getElementById("add-quota-modal");
    var addBtn = document.getElementById("add-quota-btn");
    var addSpan = document.getElementsByClassName("close")[0];

    addBtn.onclick = function () {
        addModal.style.display = "block";
    };

    addSpan.onclick = function () {
        addModal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == addModal) {
            addModal.style.display = "none";
        }
    };

    var editButtons = document.querySelectorAll(".edit-button");
    var editModal = document.getElementById("edit-quota-modal");
    var editForm = document.getElementById("form-edit");

    editButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            // Get data attributes from the button
            const id = button.getAttribute("data-id-quota");
            const serviceName = button.getAttribute("data-service_name");
            const doctorName = button.getAttribute("data-doctor_name");
            const practiceTime = button.getAttribute("data-practice_time");
            const type = button.getAttribute("data-type");
            const maxReservation = button.getAttribute("data-max_reservation");
            const day = button.getAttribute("data-day");

            console.log(id);
            // Populate the form fields in the edit modal
            editForm.querySelector("#edit_quota_id").value = id;
            editForm.querySelector("#edit_service_name").value = serviceName;
            editForm.querySelector("#edit_doctor_name").value = doctorName;
            editForm.querySelector("#edit_practice_time").value = practiceTime;
            editForm.querySelector("#edit_type").value = type;
            editForm.querySelector("#edit_max-reservation").value =
                maxReservation;
            editForm.querySelector("#edit_day").value = day;

            // Display the modal
            editModal.style.display = "block";
        });
    });

    window.addEventListener("click", function (e) {
        if (e.target == editModal) {
            editModal.style.display = "none";
        }
    });
    var $searchInput = $('input[placeholder="Masukkan kata kunci"]');
    var $tableRows = $("#patient-reservation-table tbody tr");

    $searchInput.on("keyup", function () {
        var searchText = $searchInput.val().toLowerCase();
        $tableRows.each(function () {
            var $row = $(this);
            var rowText = $row.text().toLowerCase();

            if (rowText.indexOf(searchText) > -1) {
                $row.show(); // Show row if text matches
            } else {
                $row.hide(); // Hide row if text does not match
            }
        });
    });
});
