@include('layouts.app')
@include('layouts.reservation')

<html lang="en">

<head>
    @yield('header')
    <meta charset="UTF-8">
    <title>SIM Klinik | Kuota Reservasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/patient/quota-reservation.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                                        <a class="button" id="add-quota-btn">+ Tambah Data</a>
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
                                <th>Layanan</th>
                                <th>Dokter</th>
                                <th>Hari</th>
                                <th>Praktek</th>
                                <th>Jenis</th>
                                <th>Maksimal Reservasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $quota)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $quota->service_name }}</td>
                                    <td>{{ $quota->id_doctor }}</td>
                                    <td>{{ $quota->day }}</td>
                                    <td>{{ $quota->practice_time }}</td>
                                    <td>{{ $quota->type }}</td>
                                    <td>{{ $quota->quota }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a id="edit-quota-btn" href="#"
                                            class="material-symbols-outlined edit-button"
                                            data-id-quota="{{ $quota->id_quota }}"
                                            data-service_name="{{ $quota->service_name }}"
                                            data-doctor_name="{{ $quota->id_doctor }}" data-day="{{ $quota->day }}"
                                            data-practice_time="{{ $quota->practice_time }}"
                                            data-type="{{ $quota->type }}"
                                            data-max_reservation="{{ $quota->quota }}">
                                            edit
                                        </a>
                                        <!-- Delete Button -->
                                        <a href="{{ url('admin/register/quota-reservation/delete/' . $quota->id_quota) }}"
                                            class="material-symbols-outlined delete-button">
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
    @yield('quota-reservation')
</body>

<footer>
    @yield('footer')
    <script src="{{ url('js/quota-reservation.js') }}"></script>
</footer>

</html>
