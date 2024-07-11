@include('layouts.app')

<html lang="en">

<head>
    @yield('header')
    <title>SIM Klinik | Pendaftaran</title>
    <link rel="stylesheet" href="{{ url('css/register.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('css/header.css') }}"> --}}
</head>

<body>
    <div class="container">
        @yield('header-container')
        <div class="body-container">
            @yield('sidebar')
            <div class="content-container">
                <div class="header-container">
                    <div class="search-container">
                        <div class="input-container">
                            <div class="nomr-container">
                                <span>No. MR :</span>
                                <input type="text" placeholder="Nomor MR">
                            </div>
                            <div class="name-container">
                                <span>Nama :</span>
                                <input type="text" placeholder="Nomor MR">
                            </div>
                        </div>
                        <div class="button-container">
                            <div class="search-button">
                                <button type="submit"><span class="material-symbols-outlined">
                                        search
                                    </span>
                                    <span>Cari Pasien</span>
                                </button>
                            </div>
                            <div class="add-container">
                                <form action="{{ url('/admin/add-patient') }}" method="get">
                                    <button type="submit"><span class="material-symbols-outlined">
                                            add
                                        </span>
                                        <span>Tambah Pasien</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>MR</th>
                                <th>TGL LAHIR</th>
                                <th>NAMA PASIEN</th>
                                <th>ALAMAT</th>
                                <th>TELP</th>
                                <th>NAMA IBU</th>
                                <th>NAMA AYAH</th>
                                <th>NIK</th>
                                <th>NO BPJS</th>
                                <th>AGAMA</th>
                                <th>REGISTRASI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>000001</td>
                                <td>12-11-1996</td>
                                <td>HAMIM</td>
                                <td>DESA PANJARATAN RT</td>
                                <td>085751231122</td>
                                <td>RIANA</td>
                                <td>HAMIM</td>
                                <td>640292281729984</td>
                                <td>NO BPJS</td>
                                <td>AGAMA</td>
                                <td>
                                    <a href="" class="add-button">
                                        <span class="material-symbols-outlined">
                                            add
                                        </span>Tambah</a>
                                </td>
                                <td>
                                    <a class="material-symbols-outlined edit-button">
                                        edit
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>000001</td>
                                <td>12-11-1996</td>
                                <td>HAMIM</td>
                                <td>DESA PANJARATAN RT</td>
                                <td>085751231122</td>
                                <td>RIANA</td>
                                <td>HAMIM</td>
                                <td>640292281729984</td>
                                <td>NO BPJS</td>
                                <td>AGAMA</td>
                                <td><a href="" class="add-button"><span class="material-symbols-outlined">
                                            add
                                        </span> Tambah</a></td>
                                <td>
                                    <a class="material-symbols-outlined edit-button">
                                        edit
                                    </a>
                                </td>
                            </tr>
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
