var addDataButton = document.getElementById("show-add-data");
var modal = document.getElementById("add-data-modal");
var closeModal = document.getElementById("close-modal");
var saveData = document.getElementById("save-data");

addDataButton.addEventListener("click", function () {
    modal.style.display = "block";
});

closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

saveData.addEventListener("click", function () {
    modal.style.display = "none";
});

window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
// Menangani tombol modal untuk mengedit data
var editButtons = document.querySelectorAll(".edit-button"); // Gunakan querySelectorAll untuk mendapatkan koleksi elemen
var editModal = document.getElementById("edit-doctor-modal");
var closeEditModal = document.getElementById("close-edit-modal");
var editForm = editModal.querySelector("form");

editButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
        e.preventDefault();

        const id = button.getAttribute("data-id");
        const serviceName = button.getAttribute("data-service_name");
        const doctorName = button.getAttribute("data-doctor_name");
        const practiceTime = button.getAttribute("data-practice_time");
        const mondayStart = button.getAttribute("data-monday_start_time");
        const mondayEnd = button.getAttribute("data-monday_end_time");
        const tuesdayStart = button.getAttribute("data-tuesday_start_time");
        const tuesdayEnd = button.getAttribute("data-tuesday_end_time");
        const wednesdayStart = button.getAttribute("data-wednesday_start_time");
        const wednesdayEnd = button.getAttribute("data-wednesday_end_time");
        const thursdayStart = button.getAttribute("data-thursday_start_time");
        const thursdayEnd = button.getAttribute("data-thursday_end_time");
        const fridayStart = button.getAttribute("data-friday_start_time");
        const fridayEnd = button.getAttribute("data-friday_end_time");
        const saturdayStart = button.getAttribute("data-saturday_start_time");
        const saturdayEnd = button.getAttribute("data-saturday_end_time");
        const sundayStart = button.getAttribute("data-sunday_start_time");
        const sundayEnd = button.getAttribute("data-sunday_end_time");

        editForm.querySelector("#edit_schedule_id").value = id;
        editForm.querySelector("#edit_service_name").value = serviceName;
        editForm.querySelector("#edit_doctor_name").value = doctorName;
        editForm.querySelector("#edit_practice_time").value = practiceTime;
        editForm.querySelector("#edit_monday_start_time").value = mondayStart;
        editForm.querySelector("#edit_monday_end_time").value = mondayEnd;
        editForm.querySelector("#edit_tuesday_start_time").value = tuesdayStart;
        editForm.querySelector("#edit_tuesday_end_time").value = tuesdayEnd;
        editForm.querySelector("#edit_wednesday_start_time").value =
            wednesdayStart;
        editForm.querySelector("#edit_wednesday_end_time").value = wednesdayEnd;
        editForm.querySelector("#edit_thursday_start_time").value =
            thursdayStart;
        editForm.querySelector("#edit_thursday_end_time").value = thursdayEnd;
        editForm.querySelector("#edit_friday_start_time").value = fridayStart;
        editForm.querySelector("#edit_friday_end_time").value = fridayEnd;
        editForm.querySelector("#edit_saturday_start_time").value =
            saturdayStart;
        editForm.querySelector("#edit_saturday_end_time").value = saturdayEnd;
        editForm.querySelector("#edit_sunday_start_time").value = sundayStart;
        editForm.querySelector("#edit_sunday_end_time").value = sundayEnd;

        editModal.style.display = "block";
    });
});

closeEditModal.addEventListener("click", function () {
    editModal.style.display = "none";
});

window.addEventListener("click", function (e) {
    if (e.target == editModal) {
        editModal.style.display = "none";
    }
});
