document.addEventListener("DOMContentLoaded", function () {
    // Handling the modal for adding data
    var addDataButton = document.getElementById("show-add-data");
    var addDataModal = document.getElementById("add-data-modal");
    var closeAddDataModal = document.getElementById("close-modal");
    var saveDataButton = document.getElementById("save-data");

    addDataButton.addEventListener("click", function () {
        addDataModal.style.display = "block";
    });

    closeAddDataModal.addEventListener("click", function () {
        addDataModal.style.display = "none";
    });

    saveDataButton.addEventListener("click", function () {
        addDataModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == addDataModal) {
            addDataModal.style.display = "none";
        }
    });

    // Handling the modal for editing data
    var editButtons = document.querySelectorAll("#reservation-edit-btn");
    var editModal = document.getElementById("edit-doctor-modal");
    var closeEditModal = document.getElementById("close-edit-modal");
    var editForm = editModal.querySelector("form");

    editButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Get data attributes from the clicked button
            const id_reservasi = button.getAttribute("data-id");
            const reservationNumber = button.getAttribute(
                "data-reservation-number"
            );
            const reservationDate = button.getAttribute(
                "data-reservation-date"
            );
            const reservationTime = button.getAttribute(
                "data-reservation-time"
            );
            const service = button.getAttribute("data-service");
            const doctor = button.getAttribute("data-doctor");
            const idpatient = button.getAttribute("data-patient-idpatient");
            const practiceTime = button.getAttribute("data-practice-time");
            const mr = button.getAttribute("data-mr");
            const patientName = button.getAttribute("data-patient-name");
            const phone = button.getAttribute("data-phone");
            const room = button.getAttribute("data-room");
            const status = button.getAttribute("data-status");
            const type = button.getAttribute("data-type");
            const notes = button.getAttribute("data-notes");

            // Populate the edit form with data
            editForm.querySelector("#edit_id_reservation").value = id_reservasi;
            editForm.querySelector("#edit_reservation_number").value =
                reservationNumber;
            editForm.querySelector("#edit_reservation_date").value =
                reservationDate;
            editForm.querySelector("#edit_reservation_time").value =
                reservationTime;
            editForm.querySelector("#edit_service").value = service;
            editForm.querySelector("#edit_practice_time").value = practiceTime;
            editForm.querySelector("#edit_mr").value = mr;
            editForm.querySelector("#edit_patient_name").value = patientName;
            editForm.querySelector("#edit_phone").value = phone;
            editForm.querySelector("#edit_room").value = room;
            editForm.querySelector("#edit_type").value = type;
            editForm.querySelector("#edit_notes").value = notes;
            editForm.querySelector("#edit_id_patient").value = idpatient;
            // Show the modal
            editModal.style.display = "block";
            editForm.querySelector(`#edit_doctor option[value="${"" + doctor}"]`).selected = true;
        });
    });

    // Close the modal when the close button is clicked
    closeEditModal.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    // Close the modal when clicking outside of the modal content
    window.addEventListener("click", function (e) {
        if (e.target == editModal) {
            editModal.style.display = "none";
        }
    });
});
