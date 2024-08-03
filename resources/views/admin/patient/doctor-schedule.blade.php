@include('layouts.app')
@include('layouts.reservation')
<html lang="en">

<head>
    @yield('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/patient/doctor-schedule.css') }}">
    <link rel="stylesheet" href="{{ url('css/patient/modal.css') }}">
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
                    <table id="doctor-schedule-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Dokter</th>
                                <th>Praktek</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $schedule)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $schedule->service_name }}</td>
                                    <td>{{ $schedule->doctor_username }}</td>
                                    <td>{{ $schedule->practice_time }}</td>
                                    <td>{{ $schedule->monday_start_time ? $schedule->monday_start_time . ' - ' . $schedule->monday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->tuesday_start_time ? $schedule->tuesday_start_time . ' - ' . $schedule->tuesday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->wednesday_start_time ? $schedule->wednesday_start_time . ' - ' . $schedule->wednesday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->thursday_start_time ? $schedule->thursday_start_time . ' - ' . $schedule->thursday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->friday_start_time ? $schedule->friday_start_time . ' - ' . $schedule->friday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->saturday_start_time ? $schedule->saturday_start_time . ' - ' . $schedule->saturday_end_time : '-' }}
                                    </td>
                                    <td>{{ $schedule->sunday_start_time ? $schedule->sunday_start_time . ' - ' . $schedule->sunday_end_time : '-' }}
                                    </td>
                                    <td>
                                        <a id="edit-patient-btn" href="#"
                                            class="material-symbols-outlined edit-button"
                                            data-id="{{ $schedule->id_schedule }}"
                                            data-service_name="{{ $schedule->service_name }}"
                                            data-doctor_name="{{ $schedule->doctor_name }}"
                                            data-practice_time="{{ $schedule->practice_time }}"
                                            data-monday_start_time="{{ $schedule->monday_start_time }}"
                                            data-monday_end_time="{{ $schedule->monday_end_time }}"
                                            data-tuesday_start_time="{{ $schedule->tuesday_start_time }}"
                                            data-tuesday_end_time="{{ $schedule->tuesday_end_time }}"
                                            data-wednesday_start_time="{{ $schedule->wednesday_start_time }}"
                                            data-wednesday_end_time="{{ $schedule->wednesday_end_time }}"
                                            data-thursday_start_time="{{ $schedule->thursday_start_time }}"
                                            data-thursday_end_time="{{ $schedule->thursday_end_time }}"
                                            data-friday_start_time="{{ $schedule->friday_start_time }}"
                                            data-friday_end_time="{{ $schedule->friday_end_time }}"
                                            data-saturday_start_time="{{ $schedule->saturday_start_time }}"
                                            data-saturday_end_time="{{ $schedule->saturday_end_time }}"
                                            data-sunday_start_time="{{ $schedule->sunday_start_time }}"
                                            data-sunday_end_time="{{ $schedule->sunday_end_time }}">
                                            edit
                                        </a>
                                        <a href="{{ url('admin/register/doctor-schedule/delete/' . $schedule->id_schedule) }}"
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

    @yield('doctor-schedule')

</body>

<footer>
    @yield('footer')
    <script src="{{ url('js/schedule.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[placeholder="Masukkan kata kunci"]');
            const tableRows = document.querySelectorAll('#doctor-schedule-table tbody tr');
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
        });
    </script>

</footer>

</html>
