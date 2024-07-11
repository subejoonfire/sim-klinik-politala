@section('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('css/template.css') }}">
    <link rel="stylesheet" href="{{ url('css/sidebar.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <a href="{{ url('admin/register/reservation-quota') }}">Kuota Reservasi</a>
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
@section('footer')
    <script>
        const registerButton = document.getElementById('registerButton');
        registerButton.addEventListener('mouseover', () => {
            console.log('halo')
        })
    </script>
@endsection
