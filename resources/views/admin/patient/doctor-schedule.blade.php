@include('layouts.app')
<html lang="en">

<head>
    @yield('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/patient/doctor-schedule.css') }}">
    <title>Jadwal Dokter</title>
</head>

<body>
    <div class="container">
        @yield('header-container')
        <div class="body-container">
            @yield('sidebar')
            <div class="content-container">
                <div class="header-container">
                    <div class="input-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Dokter</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">tes</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a class="button" id="show-add-data"> + Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">tes</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="body-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Dokter</th>
                                <th>Praktek</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>POLI GIGI</td>
                                <td>Dr.Totat</td>
                                <td>Pagi</td>
                                <td>05:00 - 12:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="material-symbols-outlined">
                                        edit
                                    </a>
                                    <a class="material-symbols-outlined">
                                        delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>POLI BADAN</td>
                                <td>Dr.Cean</td>
                                <td>Siang</td>
                                <td></td>
                                <td>12:00 - 17:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="material-symbols-outlined">
                                        edit
                                    </a>
                                    <a class="material-symbols-outlined">
                                        delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="add-data-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Data Jadwal Dokter</h2>
            </div>
            <div class="modal-body">
                <div class="doctor-service-container">
                    <table>
                        <tbody>
                            <tr>
                                <td>Layanan</td>
                                <td>
                                    <select name="" id="">
                                        <option value="">tes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Dokter</td>
                                <td>
                                    <select name="" id="">
                                        <option value="">tes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Praktek</td>
                                <td>
                                    <select name="" id="">
                                        <option value="">tes</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="schedule-container">
                    <div class="day-container">
                        <input type="checkbox" id="monday">
                        <label for="monday">Senin</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="tuesday">
                        <label for="tuesday">Selasa</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="wednesday">
                        <label for="wednesday">Rabu</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="thursday">
                        <label for="thursday">Kamis</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="friday">
                        <label for="friday">Jumat</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="saturday">
                        <label for="saturday">Sabtu</label>
                    </div>
                    <div class="day-container">
                        <input type="checkbox" id="sunday">
                        <label for="sunday">Minggu</label>
                    </div>
                    <div class="time-container">
                        <label for="start-time">Jam Mulai:</label>
                        <input type="time" id="start-time">
                        <label for="end-time">Jam Selesai:</label>
                        <input type="time" id="end-time">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button" id="save-data">Simpan</button>
                <button class="button" id="close-modal">Batal</button>
            </div>
        </div>
    </div>

    <script>
        var addDataButton = document.getElementById('show-add-data');
        var modal = document.getElementById('add-data-modal');
        var closeModal = document.getElementById('close-modal');
        var saveData = document.getElementById('save-data');
        var cancelData = document.getElementById('cancel-data');

        addDataButton.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        cancelData.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        saveData.addEventListener('click', function() {
            // save data to database
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>

</body>
<footer>
</footer>

</html>
