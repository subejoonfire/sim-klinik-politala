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
@section('footer')
    <script>
        const registerButton = document.getElementById('registerButton');
        registerButton.addEventListener('mouseover', () => {
            console.log('halo')
        })
    </script>
@endsection
