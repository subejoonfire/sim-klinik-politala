@include('layouts.reservation')
<html lang="en">

<head>
    @yield('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/patient/patient-reservation.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Jadwal Dokter</title>
</head>

<body>
    <div class="container">
        @yield('header-container')
        <div class="body-container">
            @yield('sidebar')
            <div class="content-container">
                @if (session('success'))
                    @yield('success')
                @endif

                @if (session('error'))
                    @yield('error')
                @endif
                <div class="header-container">
                    <div class="input-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>Pencarian</span>
                                    </td>
                                    <td>
                                        <input class="input" type="text" placeholder="Masukkan kata kunci">
                                    </td>
                                    <td>
                                        <a class="button" id="show-add-data"> + Tambah Data</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="body-container">
                    <table id="patient-reservation-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Reservasi</th>
                                <th>MR</th>
                                <th>Nama Pasien</th>
                                <th>Telpon/HP</th>
                                <th>Layanan</th>
                                <th>Tanggal Reservasi</th>
                                <th>Jam Reservasi</th>
                                <th>Dokter</th>
                                <th>Praktek</th>
                                <th>Ruangan</th>
                                <th>Status</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>*</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $reservation)
                                <tr>
                                    <td>{{ $reservation->id_reservation }}</td>
                                    <td>{{ $reservation->reservation_number }}</td>
                                    <td>{{ $reservation->mr }}</td>
                                    <td>{{ $reservation->nama }}</td>
                                    <td>{{ $reservation->telp }}</td>
                                    <td>{{ $reservation->service }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}
                                    </td>
                                    <td>{{ $reservation->reservation_time }}</td>
                                    <td>{{ $reservation->doctor_username }}</td>
                                    <td>{{ $reservation->practice_time }}</td>
                                    <td>{{ $reservation->room }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->type }}</td>
                                    <td>{{ $reservation->notes }}</td>
                                    <td>
                                        <a class="conf-button"
                                            href="{{ url('admin/register/patient-reservation/confirm/' . $reservation->id_reservation) }}"
                                            style="{{ $reservation->status == 'KONFIRMASI' ? 'border: 4px solid black;' : '' }}">KONFIRMASI</a>
                                        /
                                        <a class="skip-button"
                                            href="{{ url('admin/register/patient-reservation/skip/' . $reservation->id_reservation) }}"
                                            style="{{ $reservation->status == 'LEWATI' ? 'border: 4px solid black;' : '' }}">LEWATI</a>
                                        /
                                        <a class="cancel-button"
                                            href="{{ url('admin/register/patient-reservation/cancel/' . $reservation->id_reservation) }}"
                                            style="{{ $reservation->status == 'BATAL' ? 'border: 4px solid black;' : '' }}">BATAL</a>
                                    </td>
                                    <td>
                                        <a href="#" id="reservation-edit-btn" class="edit-button"
                                            data-id="{{ $reservation->id_reservation }}"
                                            data-reservation-number="{{ $reservation->reservation_number }}"
                                            data-reservation-date="{{ $reservation->reservation_date }}"
                                            data-reservation-time="{{ $reservation->reservation_time }}"
                                            data-service="{{ $reservation->service }}"
                                            data-doctor="{{ $reservation->id_doctor }}"
                                            data-practice-time="{{ $reservation->practice_time }}"
                                            data-mr="{{ $reservation->mr }}"
                                            data-patient-name="{{ $reservation->nama }}"
                                            data-patient-idpatient="{{ $reservation->id_patient }}"
                                            data-phone="{{ $reservation->telp }}" data-room="{{ $reservation->room }}"
                                            data-status="{{ $reservation->status }}"
                                            data-type="{{ $reservation->type }}"
                                            data-notes="{{ $reservation->notes }}">
                                            <span class="material-symbols-outlined edit-button">edit</span>
                                        </a>
                                        <a href="{{ url('admin/register/patient-reservation/delete/' . $reservation->id_reservation) }}"
                                            class="material-symbols-outlined">
                                            delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @yield('patient-reservation')

</body>
@php
    use App\Models\Patients;
    $patients = Patients::get();
@endphp
<footer>
    <script src="{{ url('js/patient-reservation.js') }}"></script>
    @yield('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[placeholder="Masukkan kata kunci"]');
            const tableRows = document.querySelectorAll('#patient-reservation-table tbody tr');
            searchInput.addEventListener('input', function() {
                const searchText = searchInput.value.toLowerCase();

                // Loop through each table row
                tableRows.forEach(function(row) {
                    const rowText = row.textContent.toLowerCase();

                    if (rowText.includes(searchText)) {
                        row.style.display = ''; // Show row if text matches
                    } else {
                        row.style.display = 'none'; // Hide row if text does not match
                    }
                });
            });
            const patients = @json($patients); // Pass the patients data from Laravel to JavaScript

            function showSuggestions(input, suggestionsContainer, mrInput, id_patientt, phoneInput) {
                // Show all suggestions when the input is focused
                input.addEventListener('focus', function() {
                    suggestionsContainer.style.display = 'block';
                    renderSuggestions(patients, suggestionsContainer, input, mrInput, id_patientt,
                        phoneInput);
                });
                input.addEventListener('blur', function() {
                    setTimeout(function() {
                        suggestionsContainer.style.display = 'none';
                    }, 200);
                });
                // Filter suggestions based on the input value
                input.addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    const filteredPatients = patients.filter(patient => patient.nama.toLowerCase().includes(
                        query));
                    renderSuggestions(filteredPatients, suggestionsContainer, input, mrInput, id_patientt,
                        phoneInput);
                });
            }

            function renderSuggestions(patients, suggestionsContainer, input, mrInput, id_patientt, phoneInput) {
                if (patients.length > 0) {
                    suggestionsContainer.style.display = 'block';
                    suggestionsContainer.innerHTML = patients.map(patient =>
                        `<div class="suggestion-item" data-id_patient="${patient.id_patient}" data-name="${patient.nama}" data-mr="${patient.mr}" data-phone="${patient.telp}">${patient.nama} | ${patient.mr}</div>`
                    ).join('');

                    const suggestionItems = suggestionsContainer.querySelectorAll('.suggestion-item');
                    suggestionItems.forEach(item => {
                        item.addEventListener('click', function() {
                            id_patientt.value = this.dataset.id_patient;
                            input.value = this.dataset.name;
                            mrInput.value = this.dataset.mr;
                            if (phoneInput) {
                                phoneInput.value = this.dataset.phone;
                            }
                            suggestionsContainer.innerHTML = '';
                            suggestionsContainer.style.display = 'none';
                        });
                    });
                } else {
                    suggestionsContainer.style.display = 'none';
                    suggestionsContainer.innerHTML = '';
                }
            }

            // Initialize suggestions for the patient name input
            const patientNameInput = document.getElementById('patient_name');
            const patientSuggestions = document.getElementById('patient-suggestions');
            const patientMRInput = document.getElementById('mr');
            const id_patientt = document.getElementById('id_patient');
            const phoneInput = document.getElementById('phone');
            showSuggestions(patientNameInput, patientSuggestions, patientMRInput, id_patientt, phoneInput);

            // Initialize suggestions for the edit patient name input
            const patientNameInput2 = document.getElementById('edit_patient_name');
            const patientSuggestions2 = document.getElementById('edit_patient-suggestions');
            const patientMRInput2 = document.getElementById('edit_mr');
            const id_patientt2 = document.getElementById('edit_id_patient');
            showSuggestions(patientNameInput2, patientSuggestions2, patientMRInput2, id_patientt2);
            patientSuggestions.style.display = 'none'
            patientSuggestions2.style.display = 'none'
        });
    </script>

</footer>

</html>
