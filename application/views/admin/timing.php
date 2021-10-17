<!-- Awal Halaman -->
<main class="pt-3">

    <div class="container mt-5">
        <h3 class="fw-bold">Timing</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-3">
                <button class="btn btn-danger semuaDataJampel"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJampel"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importJampel"><i class="fas fa-file-upload"></i> Import Jampel</button>
            </div>
            <table id="dataTablesSiswa" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jam Ke</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="dataClasses">
                    <?php $no = 1;
                    foreach ($timing as $time) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $time->jamKe; ?></td>
                            <td><?= $time->waktuMulai; ?></td>
                            <td><?= $time->waktuSelesai; ?></td>
                            <td>
                                <button class="btn badge bg-warning tombolUbahKelas" data-id="<?= $time->id; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusJampel" data-id="<?= $time->id; ?>" timeName="<?= $time->jamKe; ?>">Hapus</button>
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
<div class=" modal fade" id="tambahJampel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="jamKe" class="col-sm-4 col-form-label">Jam Ke</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jamKe" name="jamKe">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="waktuMulai" class="col-sm-4 col-form-label">Waktu Mulai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="waktuSelesai" class="col-sm-4 col-form-label">Waktu Selesai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanJampel">Simpan</button>
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
            Data kelas berhasil ditambah
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importJampel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_timing'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_timing'); ?>
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

<div class=" modal fade" id="ubahJampel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ubahDataTiming">
                <input type="hidden" id="idUbahJampel" name="idUbahJampel" value="">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="ubahjamKe" class="col-sm-4 col-form-label">Jam Ke</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ubahjamKe" name="ubahjamKe">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahWaktuMulai" class="col-sm-4 col-form-label">Waktu Mulai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="ubahWaktuMulai" name="ubahWaktuMulai">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahWaktuSelesai" class="col-sm-4 col-form-label">Waktu Selesai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="ubahWaktuSelesai" name="ubahWaktuSelesai">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanUbahJampel">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>