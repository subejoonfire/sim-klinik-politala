@include('layouts.app')
<html lang="en">

<head>
    @yield('header')
    <title>SIM Klinik | e-Rekam Medis</title>
    <link rel="stylesheet" href="{{ url('css/medical-record/index.css') }}">
</head>

<body>
    <div class="container">
        @yield('header-container')
        <div class="body-container">
            @yield('sidebar')
            <div class="medical-content-container">
                <div class="search-container">
                    <div class="search-container-head">
                        <h1>Daftar Pasien</h1>
                    </div>
                    <div class="search-container-body">
                        <div class="input-search-container">
                            <span>Pencarian :</span>
                            <input type="text">
                        </div>
                        <div class="patient-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No. MR</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>020023</td>
                                        <td>Hamim</td>
                                        <td>Panjaratan Banjarmasin</td>
                                        <td>2 Januari 2004</td>
                                        <td>
                                            <button type="button">
                                                <span class="material-symbols-outlined">
                                                    visibility
                                                </span>Tampilkan</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>020023</td>
                                        <td>Hamim</td>
                                        <td>Panjaratan Banjarmasin</td>
                                        <td>2 Januari 2004</td>
                                        <td>
                                            <button type="button">
                                                <span class="material-symbols-outlined">
                                                    visibility
                                                </span>Tampilkan</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="identity-container">
                    <div class="identity-patient-container">
                        <div class="identity-patient-head-container">
                            <h1>Identitas Pasien</h1>
                        </div>
                        <div class="identity-patient-body-container">
                            <div class="profile-container">
                                <img src="{{ url('/img/female-icon.png') }}" alt="" width="200px" height="200px">
                                <br>
                                <span>MR : 0001</span>
                                <br>
                                <span>HAMIM</span>
                                <br>
                                <span>BANJAR</span>
                            </div>
                            <div class="content-container">
                                <table border="1">
                                    <tbody>
                                        <tr>
                                            <th class="table-header">NIK</th>
                                            <td class="table-body">6301923982939172</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Nama</th>
                                            <td class="table-body">Meriyani</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Jenis Kelamin</th>
                                            <td class="table-body">Perempuan</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Nomor BPJS</th>
                                            <td class="table-body">0000888212542</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Agama</th>
                                            <td class="table-body">Islam</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Kabupaten/Kota</th>
                                            <td class="table-body">Kabupaten Tanah Laut</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Alamat</th>
                                            <td class="table-body">Desa Panjaratan RT/RW 02/01</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Nomor Telepon</th>
                                            <td class="table-body">085251383439</td>
                                        </tr>
                                        <tr>
                                            <th class="table-header">Email</th>
                                            <td class="table-body">meriyani@politala.ac.id</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="data-patient-container">
                        <div class="data-patient-head-container">
                            <h1>Data Pasien</h1>
                        </div>
                        <div class="data-patient-body-container">
                            <h1>halo</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    @yield('footer')
</footer>
