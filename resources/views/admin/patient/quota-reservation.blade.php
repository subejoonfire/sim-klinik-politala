@include('layouts.app')
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    @yield('footer')
</footer>

</html>
