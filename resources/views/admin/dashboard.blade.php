@include('layouts.app')

<html lang="en">

<head>
    @yield('header')
    <title>SIM Klinik | Dashboard</title>
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
</head>

<body>
    <div class="container">
        @yield('header-container')
        <div class="body-container">
            @yield('sidebar')
            <div class="content-container">
                {{-- <div class="header-container"></div> --}}
                <div class="body-container">
                    <div class="visit-container">
                        <div class="header-container">
                            <h1>Kunjungan Hari Ini</h1>
                            <h1>10 Kunjungan</h1>
                        </div>
                        <div class="body-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Prodi/Jabatan</th>
                                        <th>Keluhan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Hamim</td>
                                        <td>Akuntansi</td>
                                        <td>Sakit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="income-container">
                        <div class="header-container">
                            <h1>Pendapatan Hari ini</h1>
                            <h1>Rp5,000,000.00</h1>
                        </div>
                        <div class="body-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keluhan</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Hamim</td>
                                        <td>Sakit</td>
                                        <td>Rp10,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="patient-container">
                        <div class="header-container">
                            <h1>Pasien Hari ini</h1>
                            <h1>10 Pasien</h1>
                        </div>
                        <div class="body-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Hamim</td>
                                        <td>Atit ati</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
