<!-- Awal Halaman -->
<main class="pt-3">

    <div class="container mt-5">
        <h3 class="fw-bold">Scedules</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-3">
                <button class="btn btn-danger semuaDataJadwal"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importJadwal"><i class="fas fa-file-upload"></i> Import Jadwal</button>
            </div>
            <table id="dataTablesSiswa" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Hari</th>
                        <th>Jam Ke</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="dataClasses">
                    <?php $no = 1;
                    foreach ($scedule as $sced) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sced->namaGuru; ?></td>
                            <td><?= $sced->namaMapel; ?></td>
                            <td><?= $sced->dayName; ?></td>
                            <td><?php
                                if ($sced->j1 == $sced->j2) {
                                    echo $sced->j1;
                                } elseif ($sced->j1 != $sced->j2) {
                                    echo $sced->j1 . ' - ' . $sced->j2;
                                }

                                ?></td>
                            <td nowrap>
                                <button class="btn badge bg-warning tombolUbahJadwal" data-id="<?= $sced->idScedule; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusJadwal" data-id="<?= $sced->idScedule; ?>" scedName="<?= $sced->namaGuru . ' - ' . $sced->namaMapel; ?>">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>


</main>
<!-- Akhir Halaman -->

<!-- Modal -->
<div class=" modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaGuruSc" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                            <select name="namaGuruSc" id="namaGuruSc" class="form-control select2">
                                <option value="">-- Pilih Guru --</option>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <option value="<?= $teacher->id; ?>"><?= $teacher->namaGuru; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="namaMapelSc" class="col-sm-3 col-form-label">Nama Mapel</label>
                        <div class="col-sm-9">
                            <select name="namaMapelSc" id="namaMapelSc" class="form-control select2">
                                <option value="">-- Pilih Mapel --</option>
                                <?php foreach ($subjects as $subject) : ?>
                                    <option value="<?= $subject->id; ?>"><?= $subject->namaMapel; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="hariSc" class="col-sm-3 col-form-label">Hari</label>
                        <div class="col-sm-9">
                            <select name="hariSc" id="hariSc" class="form-control select2">
                                <option value="">-- Pilih Hari --</option>
                                <?php foreach ($days as $day) : ?>
                                    <option value="<?= $day->id; ?>"><?= $day->dayName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kelasSc" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="kelasSc" id="kelasSc" class="form-control select2">
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id; ?>"><?= $class->namaKelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="jamMulaiSc" class="col-sm-3 col-form-label">Jam Mulai</label>
                        <div class="col-sm-9">
                            <select name="jamMulaiSc" id="jamMulaiSc" class="form-control select2">
                                <option value="">-- Pilih Jam Mulai --</option>
                                <?php foreach ($timing as $time1) : ?>
                                    <option value="<?= $time1->id; ?>">Jam Ke - <?= $time1->jamKe . ' ==> ' . $time1->waktuMulai . ' - ' . $time1->waktuSelesai; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="jamSelesaiSc" class="col-sm-3 col-form-label">Jam Selesai</label>
                        <div class="col-sm-9">
                            <select name="jamSelesaiSc" id="jamSelesaiSc" class="form-control select2">
                                <option value="">-- Pilih Jam Selesai --</option>
                                <?php foreach ($timing as $time2) : ?>
                                    <option value="<?= $time2->id; ?>">Jam Ke - <?= $time2->jamKe . ' ==> ' . $time2->waktuMulai . ' - ' . $time2->waktuSelesai; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanJadwal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999999">
    <div id="liveToast" class="toast bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Data jadwal pelajaran berhasil ditambah
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Jadwal Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_scedule'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_scedules'); ?>
                    <input type="file" name="file" id="file">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<div class=" modal fade" id="ubahJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Jadwal Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ubahDataJadwal">
                <input type="hidden" id="idUbahJadwal" name="idUbahJadwal" value="">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="ubahnamaGuruSc" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                            <select name="ubahnamaGuruSc" id="ubahnamaGuruSc" class="form-control">
                                <option value="">-- Pilih Guru --</option>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <option value="<?= $teacher->id; ?>"><?= $teacher->namaGuru; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahnamaMapelSc" class="col-sm-3 col-form-label">Nama Mapel</label>
                        <div class="col-sm-9">
                            <select name="ubahnamaMapelSc" id="ubahnamaMapelSc" class="form-control">
                                <option value="">-- Pilih Mapel --</option>
                                <?php foreach ($subjects as $subject) : ?>
                                    <option value="<?= $subject->id; ?>"><?= $subject->namaMapel; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahhariSc" class="col-sm-3 col-form-label">Hari</label>
                        <div class="col-sm-9">
                            <select name="ubahhariSc" id="ubahhariSc" class="form-control">
                                <option value="">-- Pilih Hari --</option>
                                <?php foreach ($days as $day) : ?>
                                    <option value="<?= $day->id; ?>"><?= $day->dayName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahkelasSc" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="ubahkelasSc" id="ubahkelasSc" class="form-control">
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id; ?>"><?= $class->namaKelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="ubahjamMulaiSc" class="col-sm-3 col-form-label">Jam Mulai</label>
                        <div class="col-sm-9">
                            <select name="ubahjamMulaiSc" id="ubahjamMulaiSc" class="form-control">
                                <option value="">-- Pilih Jam Mulai --</option>
                                <?php foreach ($timing as $time1) : ?>
                                    <option value="<?= $time1->id; ?>">Jam Ke - <?= $time1->jamKe . ' ==> ' . $time1->waktuMulai . ' - ' . $time1->waktuSelesai; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="ubahjamSelesaiSc" class="col-sm-3 col-form-label">Jam Selesai</label>
                        <div class="col-sm-9">
                            <select name="ubahjamSelesaiSc" id="ubahjamSelesaiSc" class="form-control">
                                <option value="">-- Pilih Jam Selesai --</option>
                                <?php foreach ($timing as $time2) : ?>
                                    <option value="<?= $time2->id; ?>">Jam Ke - <?= $time2->jamKe . ' ==> ' . $time2->waktuMulai . ' - ' . $time2->waktuSelesai; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanUbahJadwal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>