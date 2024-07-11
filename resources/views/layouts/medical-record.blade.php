@section('history-visit')
    <div class="patient-data-header-container">
        <h1>Riwayat Kunjungan</h1>
    </div>
    <div class="history-visit">
        <div class="content-header">
            <div class="show-data-container">
                <span>Tampil</span>
                <select name="" id="">
                    <option value="">10</option>
                </select>
                <span>data </span>
            </div>
            <div class="search-data-container">
                <span>Cari :</span>
                <input type="text">
            </div>
        </div>
        <div class="content-body">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>REGISTRASI</th>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>LAYANAN</th>
                        <th>DOKTER</th>
                        <th>JAMINAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>000002</td>
                        <td>15-23-2023</td>
                        <td>10:22</td>
                        <td>POLI UMUM</td>
                        <td>Dr. Siti Habibah Zein</td>
                        <td>POLITALA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('general-data-test')
    <div class="patient-data-header-container">
        <h1>Pengkajian Data Umum Pasien</h1>
    </div>
    <div class="history-visit">
        <div class="content-header">
            <div class="show-data-container">
                <span>Tampil</span>
                <select name="" id="">
                    <option value="">10</option>
                </select>
                <span>data </span>
            </div>
            <div class="search-data-container">
                <span>Cari :</span>
                <input type="text">
            </div>
            <a href="" class="add-button">
                <span class="material-symbols-outlined">
                    add
                </span>
                Tambah
            </a>
        </div>
        <div class="content-body">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>NAMA PASIEN</th>
                        <th>JENIS KELAMIN</th>
                        <th>NIK</th>
                        <th>USER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>15-23-2023</td>
                        <td>10:22</td>
                        <td>MARRY</td>
                        <td>LAKI-LAKI</td>
                        <td>5683038273729288</td>
                        <td>klinikpolitala</td>
                        <td>
                            <a href="" style="color: black" class="material-symbols-outlined edit-button">
                                edit
                            </a>
                            <a href="" style="color: black" class="material-symbols-outlined edit-button">
                                delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('agreed-general')
    <div class="patient-data-header-container">
        <h1>Persetujuan Umum</h1>
    </div>
    <div class="history-visit">
        <div class="content-header">
            <div class="show-data-container">
                <span>Tampil</span>
                <select name="" id="">
                    <option value="">10</option>
                </select>
                <span>data </span>
            </div>
            <div class="search-data-container">
                <span>Cari :</span>
                <input type="text">
            </div>
            <a href="" class="add-button">
                <span class="material-symbols-outlined">
                    add
                </span>
                Tambah
            </a>
        </div>
        <div class="content-body">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>NAMA PASIEN</th>
                        <th>JENIS KELAMIN</th>
                        <th>NIK</th>
                        <th>USER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>15-23-2023</td>
                        <td>10:22</td>
                        <td>MARRY</td>
                        <td>LAKI-LAKI</td>
                        <td>5683038273729288</td>
                        <td>klinikpolitala</td>
                        <td>
                            <a href="" style="color: black" class="material-symbols-outlined edit-button">
                                edit
                            </a>
                            <a href="" style="color: black" class="material-symbols-outlined edit-button">
                                delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
