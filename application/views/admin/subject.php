<!-- Awal Halaman -->
<main class="pt-3">
    <div class="container mt-5">
        <h3 class="fw-bold">Subjects</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-2">
                <button class="btn btn-danger semuaDataKelas"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKelas"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importKelas"><i class="fas fa-file-upload"></i> Import Mapel</button>
            </div>
            <table id="dataTables" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Kode Kelas</th>
                        <th>Tingkat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="dataClasses">
                    <?php $no = 1;
                    foreach ($classes as $cls) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $cls->namaKelas; ?></td>
                            <td><?= $cls->kodeKelas; ?></td>
                            <td><?= $cls->tingkat; ?></td>
                            <td>
                                <button class="btn badge bg-warning tombolUbahKelas" data-id="<?= $cls->id; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusKelas" data-id="<?= $cls->id; ?>" clsName="<?= $cls->namaKelas; ?>">Hapus</button>
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
<div class=" modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaKelas" name="namaKelas">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kodeKelas" class="col-sm-3 col-form-label">Kode Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kodeKelas" name="kodeKelas">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="tingkat" name="tingkat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanKelas">Simpan</button>
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
<div class="modal fade" id="importKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_class'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_classes'); ?>
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

<div class=" modal fade" id="ubahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ubahDataKls">
                <input type="hidden" id="idUbahKelas" name="idUbahKelas" value="">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahNamaKelas" name="ubahNamaKelas">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kodeKelas" class="col-sm-3 col-form-label">Kode Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahKodeKelas" name="ubahKodeKelas">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="ubahTingkat" name="ubahTingkat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanUbahKelas">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>