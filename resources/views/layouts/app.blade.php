@section('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('css/template.css') }}">
    <link rel="stylesheet" href="{{ url('css/sidebar.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('header-container')
    <div class="header-bar-container">
        <div class="content-container">
            <div class="left-container">
                <div class="title-container">
                    <h1>KLINIK KESEHATAN POLITALA</h1>
                </div>
            </div>
        </div>
        {{-- <div class="right-container"></div> --}}
    </div>
@endsection
@section('sidebar')
    <div class="sidebar-container">
        <div class="header-container">
            <div class="icon-container">
                <img src="{{ url('img/LogoKlinik.png') }}" width="100px" alt="">
            </div>
            {{-- <div class="title-container">
                <span>Sistem Informasi Manajemen Klinik</span>
            </div> --}}
        </div>
        <div class="body-container">
            <a href="{{ url('admin/dashboard') }}">
                <div class="dashboard-container">
                    <div class="icon-container">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    </div>
                    <div class="title-container">
                        <span>Dashboard</span>
                    </div>
                </div>
            </a>
            <a href="{{ url('admin/register') }}" id="registerButton" class="register-button">
                <div class="register-container">
                    <div class="icon-container">
                        <span class="material-symbols-outlined">
                            computer
                        </span>
                    </div>
                    <div class="title-container">
                        <span>Pendaftaran</span>
                    </div>
                </div>
                <div class="register-item-container">
                    {{-- <a href="{{ url('admin/register') }}">Dashboard</a> --}}
                    <a href="{{ url('admin/register/doctor-schedule') }}">Jadwal Dokter</a>
                    <a href="{{ url('admin/register/queue') }}">Antrian Pendaftaran</a>
                    <a href="{{ url('admin/register/patient-reservation') }}">Reservasi Pasien</a>
                    <a href="{{ url('admin/register/quota-reservation') }}">Kuota Reservasi</a>
                    <a href="{{ url('admin/register/register-new-patient') }}">Registrasi Pasien</a>
                    <a href="{{ url('admin/register/register-external-patient') }}">Registrasi Pasien Luar</a>
                    <a href="{{ url('admin/register/medical-record-tracer') }}">Tracer Rekam Medis</a>
                </div>
            </a>
            <a href="{{ url('admin/medical-record') }}" class="medical-button">
                <div class="medical-container">
                    <div class="icon-container">
                        <span class="material-symbols-outlined">
                            medical_services
                        </span>
                    </div>
                    <div class="title-container">
                        <span>e-Rekam Medis</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
@section('medical-record-sidebar')
    <div class="sidebar-data-container">
        <div class="history-visit">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/history-visit') }}">Riwayat Kunjungan</a>
        </div>
        <div class="general-data-test">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/general-data-test') }}">Pengkajian Data Umum</a>
        </div>
        <div class="agreed-general">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/agreed-general') }}">Persetujuan Umum</a>
        </div>
        <div class="risk-test">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/risk-test') }}">Pengkajian Risiko Jatuh</a>
        </div>
        <div class="informed-consent">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/informed-consent') }}">Persetujuan Informasi</a>
        </div>
        <div class="agreed-satu-sehat">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/agreed-satu-sehat') }}">Persetujuan Satu Sehat</a>
        </div>
        <div class="general-signs">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/general-signs') }}">Tanda-Tanda Umum</a>
        </div>
        <div class="action-need">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/action-need') }}">Tindakan</a>
        </div>
        <div class="SOAP">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/SOAP') }}">SOAP</a>
        </div>
        <div class="CPPT">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/CPPT') }}">CPPT</a>
        </div>
        <div class="patient-status">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/patient-status') }}">Status Pasien</a>
        </div>
        <div class="surgical-safety-checklist">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/surgical-safety-checklist') }}">Daftar Periksa Keselamatan Operasi</a>
        </div>
        <div class="odontogram">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/odontogram') }}">Odontogram</a>
        </div>
        <div class="medical-support">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/medical-support') }}">Penunjang Medis</a>
        </div>
        <div class="MCU">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/MCU') }}">MCU</a>
        </div>
        <div class="medition-recipe">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/medition-recipe') }}">Resep dan Obat</a>
        </div>
        <div class="bill-total">
            <span class="material-symbols-outlined">
                person
            </span>
            <a href="{{ url('admin/medical-record/bill-total') }}">Total Pembayaran</a>
        </div>
    </div>
@endsection
@section('register-modal')
    <!-- Modal Tambah Pasien -->
    <div id="add-patient-modal" class="modal">
        <form action="{{ url('admin/register/add-patient') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Tambah Pasien</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mr" class="form-label">No. MR :</label>
                        <input type="text" id="mr" readonly class="form-input" placeholder="AUTO">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="form-label">TGL LAHIR :</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-input"
                            placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">NAMA PASIEN :</label>
                        <input type="text" id="nama" name="nama" class="form-input"
                            placeholder="Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">ALAMAT :</label>
                        <input type="text" id="alamat" name="alamat" class="form-input" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="telp" class="form-label">TELP :</label>
                        <input type="text" id="telp" name="telp" class="form-input" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu" class="form-label">NAMA IBU :</label>
                        <input type="text" id="nama_ibu" name="nama_ibu" class="form-input" placeholder="Nama Ibu">
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah" class="form-label">NAMA AYAH :</label>
                        <input type="text" id="nama_ayah" name="nama_ayah" class="form-input"
                            placeholder="Nama Ayah">
                    </div>
                    <div class="form-group">
                        <label for="nik" class="form-label">NIK :</label>
                        <input type="text" id="nik" name="nik" class="form-input" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label for="no_bpjs" class="form-label">NO BPJS :</label>
                        <input type="text" id="no_bpjs" name="no_bpjs" class="form-input" placeholder="No BPJS">
                    </div>
                    <div class="form-group">
                        <label for="agama" class="form-label">AGAMA :</label>
                        <select id="agama" name="agama" class="form-input">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="add-button" type="submit">Tambah Pasien</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Edit Pasien -->
    <div id="edit-patient-modal" class="modal">
        <form action="{{ url('admin/register/edit-patient') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Edit Pasien</h2>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id_patient" name="id_patient">
                    <div class="form-group">
                        <label for="edit_mr" class="form-label">No. MR :</label>
                        <input type="text" id="edit_mr" readonly class="form-input" placeholder="Nomor MR">
                    </div>
                    <div class="form-group">
                        <label for="edit_tgl_lahir" class="form-label">TGL LAHIR :</label>
                        <input type="date" id="edit_tgl_lahir" name="tgl_lahir" class="form-input"
                            placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama" class="form-label">NAMA PASIEN :</label>
                        <input type="text" id="edit_nama" name="nama" class="form-input"
                            placeholder="Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat" class="form-label">ALAMAT :</label>
                        <input type="text" id="edit_alamat" name="alamat" class="form-input" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="edit_telp" class="form-label">TELP :</label>
                        <input type="text" id="edit_telp" name="telp" class="form-input" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_ibu" class="form-label">NAMA IBU :</label>
                        <input type="text" id="edit_nama_ibu" name="nama_ibu" class="form-input"
                            placeholder="Nama Ibu">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_ayah" class="form-label">NAMA AYAH :</label>
                        <input type="text" id="edit_nama_ayah" name="nama_ayah" class="form-input"
                            placeholder="Nama Ayah">
                    </div>
                    <div class="form-group">
                        <label for="edit_nik" class="form-label">NIK :</label>
                        <input type="text" id="edit_nik" name="nik" class="form-input" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label for="edit_no_bpjs" class="form-label">NO BPJS :</label>
                        <input type="text" id="edit_no_bpjs" name="no_bpjs" class="form-input"
                            placeholder="No BPJS">
                    </div>
                    <div class="form-group">
                        <label for="edit_agama" class="form-label">AGAMA :</label>
                        <select id="edit_agama" name="agama" data-default-value="" class="form-input">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="add-button" type="submit">Edit Pasien</button>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('success')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: '{{ session('success') }}',
        })
    </script>
@endsection
@section('error')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })
    </script>
@endsection
@section('queue-modal')
    <div class="modal" id="add-data-modal">
        <form action="{{ url('admin/register/queue/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-modal">&times;</span>
                    <h2>Tambah Data Antrian Pasien</h2>
                </div>
                <div class="modal-body">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama Calon Pasien</td>
                                <td><input type="text" name="nama_calon_pasien" id="nama_calon_pasien" required></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><input type="date" name="tanggal" id="tanggal" required></td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td><input type="time" name="jam" id="jam" required></td>
                            </tr>
                            <tr>
                                <td>BPJS/NO BPJS</td>
                                <td>
                                    <select name="bpjs_no_bpjs" id="bpjs_no_bpjs" required>
                                        <option value="BPJS">BPJS</option>
                                        <option value="Non BPJS">Non BPJS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Antrian</td>
                                <td><input type="number" name="antrian" id="antrian" required></td>
                            </tr>
                            <tr>
                                <td>Panggil</td>
                                <td>
                                    <select name="panggil" id="panggil" required>
                                        <option value="Menunggu">Menunggu</option>
                                        <option value="Dipanggil">Dipanggil</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Durasi (Menit)</td>
                                <td><input type="text" name="durasi" id="durasi" required></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status" id="status" required>
                                        <option value="Menunggu">Menunggu</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" id="save-data">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
