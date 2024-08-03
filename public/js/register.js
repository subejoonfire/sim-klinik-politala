document.addEventListener("DOMContentLoaded", function () {
    // Modal Handling
    var addModal = document.getElementById("add-patient-modal");
    var addBtn = document.getElementById("add-patient-btn");
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

    // Edit Button Handling
    var editButtons = document.querySelectorAll(".edit-button");
    var editModal = document.getElementById("edit-patient-modal");
    var editCloseModal = editModal.querySelector(".close");
    var editForm = editModal.querySelector("form");

    editButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Get data attributes from the button
            const id = button.getAttribute("data-id");
            const mr = button.getAttribute("data-mr");
            const tgl_lahir = button.getAttribute("data-tgl_lahir");
            const nama = button.getAttribute("data-nama");
            const alamat = button.getAttribute("data-alamat");
            const telp = button.getAttribute("data-telp");
            const nama_ibu = button.getAttribute("data-nama_ibu");
            const nama_ayah = button.getAttribute("data-nama_ayah");
            const nik = button.getAttribute("data-nik");
            const no_bpjs = button.getAttribute("data-no_bpjs");
            const agama = button.getAttribute("data-agama");

            // Populate the form fields in the edit modal
            editForm.querySelector("#edit_id_patient").value = id;
            editForm.querySelector("#edit_mr").value = mr;
            editForm.querySelector("#edit_tgl_lahir").value = tgl_lahir;
            editForm.querySelector("#edit_nama").value = nama;
            editForm.querySelector("#edit_alamat").value = alamat;
            editForm.querySelector("#edit_telp").value = telp;
            editForm.querySelector("#edit_nama_ibu").value = nama_ibu;
            editForm.querySelector("#edit_nama_ayah").value = nama_ayah;
            editForm.querySelector("#edit_nik").value = nik;
            editForm.querySelector("#edit_no_bpjs").value = no_bpjs;
            editForm.querySelector(`#edit_agama option[value="${agama}"]`).selected = true;

            editModal.style.display = "block";
        });
    });

    editCloseModal.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    window.addEventListener("click", function (e) {
        if (e.target == editModal) {
            editModal.style.display = "none";
        }
    });

    // Search Functionality
    var searchInput = document.querySelector('input[placeholder="Masukkan kata kunci"]');
    var tableRows = document.querySelectorAll("table tbody tr");

    searchInput.addEventListener("input", function () {
        var searchText = searchInput.value.toLowerCase();

        tableRows.forEach(function (row) {
            var rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchText)) {
                row.style.display = ""; // Show row if text matches
            } else {
                row.style.display = "none"; // Hide row if text does not match
            }
        });
    });
});
