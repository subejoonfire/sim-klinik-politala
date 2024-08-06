@include('layouts.app')

<html lang="en">

<head>
    @yield('header')
    <title>SIM Klinik | Pendaftaran</title>
    <link rel="stylesheet" href="{{ url('css/register.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('css/header.css') }}"> --}}
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
                    <div class="search-container">
                        <div class="input-container">
                            <div class="nomr-container">
                                <span>Pencarian :</span>
                                <input type="text" placeholder="Masukkan kata kunci">
                                <button id="add-patient-btn" class="add-button " type="button"><span
                                        class="material-symbols-outlined">
                                        add
                                    </span>
                                    <span>Tambah Pasien</span>
                                </button>
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
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id_patient }}</td>
                                    <td>{{ $row->mr }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tgl_lahir)->format('d M Y') }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->telp }}</td>
                                    <td>{{ $row->nama_ibu }}</td>
                                    <td>{{ $row->nama_ayah }}</td>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->no_bpjs }}</td>
                                    <td>{{ $row->agama }}</td>
                                    <td>
                                        <a href="" class="add-button">
                                            <span class="material-symbols-outlined">
                                                add
                                            </span>Tambah</a>
                                    </td>
                                    <td>
                                        <a id="edit-patient-btn" href="#"
                                            class="material-symbols-outlined edit-button"
                                            data-id="{{ $row->id_patient }}" data-mr="{{ $row->mr }}"
                                            data-tgl_lahir="{{ $row->tgl_lahir }}" data-nama="{{ $row->nama }}"
                                            data-alamat="{{ $row->alamat }}" data-telp="{{ $row->telp }}"
                                            data-nama_ibu="{{ $row->nama_ibu }}"
                                            data-nama_ayah="{{ $row->nama_ayah }}" data-nik="{{ $row->nik }}"
                                            data-no_bpjs="{{ $row->no_bpjs }}" data-agama="{{ $row->agama }}">
                                            edit
                                        </a>
                                        <a href="{{ url('admin/register/delete-patient/' . $row->id_patient) }}"
                                            class="material-symbols-outlined" style="color: green">
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
    @yield('register-modal')
</body>

<footer>
    @yield('footer')
    <script src="{{ url('js/register.js') }}"></script>
</footer>

</html>
