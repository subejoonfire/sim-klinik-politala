@include('layouts.app')

<html lang="en">

<head>
    @yield('header')
    <title>SIM Klinik | Pendaftaran</title>
    <link rel="stylesheet" href="{{ url('css/patient/queue.css') }}">
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
                                <button id="add-patient-btn" type="button"><span class="material-symbols-outlined">
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
                                <th>Nama Calon Pasien</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>BPJS/NO BPJS</th>
                                <th>Antrian</th>
                                <th>Panggil</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $queue)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $queue->nama_calon_pasien }}</td>
                                    <td>{{ \Carbon\Carbon::parse($queue->tanggal)->format('d F Y') }}</td>
                                    <td>{{ $queue->jam }}</td>
                                    <td>{{ $queue->bpjs_no_bpjs }}</td>
                                    <td>{{ $queue->antrian }}</td>
                                    <td>
                                        <a class="called-button"
                                            href="{{ url('admin/register/queue/panggil/called/' . $queue->id_queue) }}"
                                            style="{{ $queue->panggil == 'Dipanggil' ? 'border: 4px solid black;' : '' }}">Dipanggil</a>
                                        /
                                        <a class="waiting-button"
                                            href="{{ url('admin/register/queue/panggil/waiting/' . $queue->id_queue) }}"
                                            style="{{ $queue->panggil == 'Menunggu' ? 'border: 4px solid black;' : '' }}">Menunggu</a>
                                    </td>
                                    <td>{{ $queue->durasi }}</td>
                                    <td>
                                        <a class="done-button"
                                            href="{{ url('admin/register/queue/status/done/' . $queue->id_queue) }}"
                                            style="{{ $queue->status == 'Selesai' ? 'border: 4px solid black;' : '' }}">Selesai</a>
                                        /
                                        <a class="waiting-button"
                                            href="{{ url('admin/register/queue/status/waiting/' . $queue->id_queue) }}"
                                            style="{{ $queue->status == 'Menunggu' ? 'border: 4px solid black;' : '' }}">Menunggu</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/register/queue/delete/' . $queue->id_queue) }}"
                                            class="material-symbols-outlined edit-button">
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
    @yield('queue-modal')
</body>

<footer>
    @yield('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addPatientBtn = document.getElementById('add-patient-btn');
            var modal = document.getElementById('add-data-modal');
            var closeModal = document.getElementById('close-modal');

            addPatientBtn.addEventListener('click', function() {
                modal.style.display = 'block';
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</footer>

</html>
