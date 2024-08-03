@extends('layouts.app')
@php
    use App\Models\Doctors;
    use App\Models\Patients;
    $patients = Patients::get();
    $doctors = Doctors::get();
@endphp
@section('patient-reservation')
    <!-- Modal untuk menambah data -->
    <div class="modal" id="add-data-modal">
        <form action="{{ url('admin/register/patient-reservation/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-modal">&times;</span>
                    <h2>Tambah Data Reservasi Pasien</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reservation_number">No Reservasi</label>
                        <input type="text" name="reservation_number" disabled placeholder="AUTO" id="reservation_number"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="mr">MR</label>
                        <input type="text" name="mr" readonly value="" placeholder="AUTO" id="mr"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="id_patient">ID PASIEN</label>
                        <input type="text" name="id_patient" value="" readonly placeholder="AUTO" id="id_patient"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telpon/HP</label>
                        <input type="text" name="phone" readonly id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="patient_name">Nama Pasien</label>
                        <input type="text" name="patient_name" value="" id="patient_name" autocomplete="off"
                            required>
                        <div id="patient-suggestions" class="suggestions"></div>
                    </div>
                    <div class="form-group">
                        <label for="reservation_date">Tanggal Reservasi</label>
                        <input type="date" name="reservation_date" id="reservation_date" required>
                    </div>
                    <div class="form-group">
                        <label for="reservation_time">Jam Reservasi</label>
                        <input type="time" name="reservation_time" id="reservation_time" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan</label>
                        <select name="service" id="service" required>
                            <option value="">Pilih Layanan</option>
                            <option value="POLI UMUM">POLI UMUM</option>
                            <option value="POLI GIGI">POLI GIGI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="doctor">Dokter</label>
                        <select name="doctor" id="doctor" required>
                            <option value="">Pilih Dokter</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id_doctor }}">{{ $doctor->doctor_username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="practice_time">Praktek</label>
                        <select name="practice_time" id="practice_time" required>
                            <option value="">Pilih Waktu Praktek</option>
                            <option value="PAGI">PAGI</option>
                            <option value="SIANG">SIANG</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Ruangan</label>
                        <input type="text" name="room" id="room" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <input type="text" name="type" id="type" required>
                    </div>
                    <div class="form-group">
                        <label for="notes">Keterangan</label>
                        <input type="text" name="notes" id="notes" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save-data" class="button" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal untuk edit data -->
    <div class="modal" id="edit-doctor-modal">
        <form action="{{ url('admin/register/patient-reservation/update') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-edit-modal">&times;</span>
                    <h2>Edit Data Reservasi Pasien</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_id_reservation">ID Reservasi</label>
                        <input type="text" name="id_reservation" value="" id="edit_id_reservation" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_mr">MR</label>
                        <input type="text" name="mr" id="edit_mr" disabled>
                    </div>
                    <div class="form-group">
                        <label for="edit_reservation_number">No Reservasi</label>
                        <input type="text" name="reservation_number" id="edit_reservation_number" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_id_patient">ID PASIEN</label>
                        <input type="text" name="id_patient" value="" readonly placeholder="AUTO"
                            id="edit_id_patient" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_patient_name">Nama Pasien</label>
                        <input type="text" name="patient_name" id="edit_patient_name" autocomplete="off" required>
                        <div class="suggestions" id="edit_patient-suggestions"></div>
                    </div>
                    <div class="form-group">
                        <label for="edit_reservation_date">Tanggal Reservasi</label>
                        <input type="date" name="reservation_date" id="edit_reservation_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_reservation_time">Jam Reservasi</label>
                        <input type="time" name="reservation_time" id="edit_reservation_time" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_service">Layanan</label>
                        <select name="service" id="edit_service" required>
                            <option value="">Pilih Layanan</option>
                            <option value="POLI UMUM">POLI UMUM</option>
                            <option value="POLI GIGI">POLI GIGI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_doctor">Dokter</label>
                        <select name="doctor" id="edit_doctor" required>
                            <option value="">Pilih Dokter</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id_doctor }}">{{ $doctor->doctor_username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_practice_time">Praktek</label>
                        <select name="practice_time" id="edit_practice_time" required>
                            <option value="">Pilih Waktu Praktek</option>
                            <option value="PAGI">PAGI</option>
                            <option value="SIANG">SIANG</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_phone">Telpon/HP</label>
                        <input type="text" name="phone" readonly id="edit_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_room">Ruangan</label>
                        <input type="text" name="room" id="edit_room" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_type">Tipe</label>
                        <input type="text" name="type" id="edit_type" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_notes">Keterangan</label>
                        <input type="text" name="edit_notes" id="edit_notes" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('doctor-schedule')
    <div class="modal" id="add-data-modal">
        <form action="{{ url('admin/register/doctor-schedule/store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-modal">&times;</span>
                    <h2>Tambah Data Jadwal Dokter</h2>
                </div>
                <div class="modal-body">
                    <div class="doctor-service-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Layanan</td>
                                    <td>
                                        <select name="service_name" id="service_name">
                                            <option value="POLI GIGI">POLI GIGI</option>
                                            <option value="POLI BADAN">POLI BADAN</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dokter</td>
                                    <td>
                                        <select name="doctor_name" id="doctor_name">
                                            <option value="">Pilih Dokter</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id_doctor }}">{{ $doctor->doctor_username }}
                                                </option>
                                            @endforeach
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Praktek</td>
                                    <td>
                                        <select name="practice_time" id="practice_time">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="schedule-container">
                        <div class="day-container">
                            <input type="checkbox" name="days[monday]" id="monday">
                            <label for="monday">Senin</label>
                            <div class="time-container">
                                <label for="monday_start_time">Jam Mulai:</label>
                                <input type="time" name="monday_start_time" id="monday_start_time">
                                <label for="monday_end_time">Jam Selesai:</label>
                                <input type="time" name="monday_end_time" id="monday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[tuesday]" id="tuesday">
                            <label for="tuesday">Selasa</label>
                            <div class="time-container">
                                <label for="tuesday_start_time">Jam Mulai:</label>
                                <input type="time" name="tuesday_start_time" id="tuesday_start_time">
                                <label for="tuesday_end_time">Jam Selesai:</label>
                                <input type="time" name="tuesday_end_time" id="tuesday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[wednesday]" id="wednesday">
                            <label for="wednesday">Rabu</label>
                            <div class="time-container">
                                <label for="wednesday_start_time">Jam Mulai:</label>
                                <input type="time" name="wednesday_start_time" id="wednesday_start_time">
                                <label for="wednesday_end_time">Jam Selesai:</label>
                                <input type="time" name="wednesday_end_time" id="wednesday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[thursday]" id="thursday">
                            <label for="thursday">Kamis</label>
                            <div class="time-container">
                                <label for="thursday_start_time">Jam Mulai:</label>
                                <input type="time" name="thursday_start_time" id="thursday_start_time">
                                <label for="thursday_end_time">Jam Selesai:</label>
                                <input type="time" name="thursday_end_time" id="thursday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[friday]" id="friday">
                            <label for="friday">Jumat</label>
                            <div class="time-container">
                                <label for="friday_start_time">Jam Mulai:</label>
                                <input type="time" name="friday_start_time" id="friday_start_time">
                                <label for="friday_end_time">Jam Selesai:</label>
                                <input type="time" name="friday_end_time" id="friday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[saturday]" id="saturday">
                            <label for="saturday">Sabtu</label>
                            <div class="time-container">
                                <label for="saturday_start_time">Jam Mulai:</label>
                                <input type="time" name="saturday_start_time" id="saturday_start_time">
                                <label for="saturday_end_time">Jam Selesai:</label>
                                <input type="time" name="saturday_end_time" id="saturday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[sunday]" id="sunday">
                            <label for="sunday">Minggu</label>
                            <div class="time-container">
                                <label for="sunday_start_time">Jam Mulai:</label>
                                <input type="time" name="sunday_start_time" id="sunday_start_time">
                                <label for="sunday_end_time">Jam Selesai:</label>
                                <input type="time" name="sunday_end_time" id="sunday_end_time">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" id="save-data">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal" id="edit-doctor-modal">
        <form action="{{ url('admin/register/doctor-schedule/update') }}" method="post">
            @csrf
            <input type="hidden" name="id_schedule" id="edit_schedule_id">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-edit-modal">&times;</span>
                    <h2>Edit Data Jadwal Dokter</h2>
                </div>
                <div class="modal-body">
                    <div class="doctor-service-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Layanan</td>
                                    <td>
                                        <select name="service_name" id="edit_service_name">
                                            <option value="POLI GIGI">POLI GIGI</option>
                                            <option value="POLI BADAN">POLI BADAN</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dokter</td>
                                    <td>
                                        <select name="doctor_name" id="edit_doctor_name">
                                            <option value="">Pilih Dokter</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id_doctor }}">{{ $doctor->doctor_username }}
                                                </option>
                                            @endforeach
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Praktek</td>
                                    <td>
                                        <select name="practice_time" id="edit_practice_time">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="schedule-container">
                        <div class="day-container">
                            <input type="checkbox" name="days[monday]" id="edit_monday">
                            <label for="edit_monday">Senin</label>
                            <div class="time-container">
                                <label for="edit_monday_start_time">Jam Mulai:</label>
                                <input type="time" name="monday_start_time" id="edit_monday_start_time">
                                <label for="edit_monday_end_time">Jam Selesai:</label>
                                <input type="time" name="monday_end_time" id="edit_monday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[tuesday]" id="edit_tuesday">
                            <label for="edit_tuesday">Selasa</label>
                            <div class="time-container">
                                <label for="edit_tuesday_start_time">Jam Mulai:</label>
                                <input type="time" name="tuesday_start_time" id="edit_tuesday_start_time">
                                <label for="edit_tuesday_end_time">Jam Selesai:</label>
                                <input type="time" name="tuesday_end_time" id="edit_tuesday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[wednesday]" id="edit_wednesday">
                            <label for="edit_wednesday">Rabu</label>
                            <div class="time-container">
                                <label for="edit_wednesday_start_time">Jam Mulai:</label>
                                <input type="time" name="wednesday_start_time" id="edit_wednesday_start_time">
                                <label for="edit_wednesday_end_time">Jam Selesai:</label>
                                <input type="time" name="wednesday_end_time" id="edit_wednesday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[thursday]" id="edit_thursday">
                            <label for="edit_thursday">Kamis</label>
                            <div class="time-container">
                                <label for="edit_thursday_start_time">Jam Mulai:</label>
                                <input type="time" name="thursday_start_time" id="edit_thursday_start_time">
                                <label for="edit_thursday_end_time">Jam Selesai:</label>
                                <input type="time" name="thursday_end_time" id="edit_thursday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[friday]" id="edit_friday">
                            <label for="edit_friday">Jumat</label>
                            <div class="time-container">
                                <label for="edit_friday_start_time">Jam Mulai:</label>
                                <input type="time" name="friday_start_time" id="edit_friday_start_time">
                                <label for="edit_friday_end_time">Jam Selesai:</label>
                                <input type="time" name="friday_end_time" id="edit_friday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[saturday]" id="edit_saturday">
                            <label for="edit_saturday">Sabtu</label>
                            <div class="time-container">
                                <label for="edit_saturday_start_time">Jam Mulai:</label>
                                <input type="time" name="saturday_start_time" id="edit_saturday_start_time">
                                <label for="edit_saturday_end_time">Jam Selesai:</label>
                                <input type="time" name="saturday_end_time" id="edit_saturday_end_time">
                            </div>
                        </div>
                        <div class="day-container">
                            <input type="checkbox" name="days[sunday]" id="edit_sunday">
                            <label for="edit_sunday">Minggu</label>
                            <div class="time-container">
                                <label for="edit_sunday_start_time">Jam Mulai:</label>
                                <input type="time" name="sunday_start_time" id="edit_sunday_start_time">
                                <label for="edit_sunday_end_time">Jam Selesai:</label>
                                <input type="time" name="sunday_end_time" id="edit_sunday_end_time">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" id="save-edit-data">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
