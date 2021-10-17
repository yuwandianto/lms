<!-- Awal Halaman -->
<main class="pt-3">

    <div class="container mt-5">
        <h3 class="fw-bold">Subjects</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-3">
                <button class="btn btn-danger semuaDataMapel"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMapel"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importMapel"><i class="fas fa-file-upload"></i> Import Mapel</button>
            </div>
            <table id="dataTables" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Kode</th>
                        <th>Kelompok</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="dataClasses">
                    <?php $no = 1;
                    foreach ($subjects as $sub) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sub->namaMapel; ?></td>
                            <td><?= $sub->kodeMapel; ?></td>
                            <td><?= $sub->kelompok; ?></td>
                            <td nowrap>
                                <button class="btn badge bg-warning tombolUbahMapel" data-id="<?= $sub->id; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusMapel" data-id="<?= $sub->id; ?>" subName="<?= $sub->namaMapel; ?>">Hapus</button>
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
<div class=" modal fade" id="tambahMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaMapel" class="col-sm-3 col-form-label">Nama Mapel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaMapel" name="namaMapel">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kodeMapel" class="col-sm-3 col-form-label">Kode Mapel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kodeMapel" name="kodeMapel">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kelompok" class="col-sm-3 col-form-label">Kelompok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kelompok" name="kelompok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanMapel">Simpan</button>
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
            Data mata pelajaran berhasil ditambah
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_subject'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_subjects'); ?>
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

<div class=" modal fade" id="ubahMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ubahDataMapel">
                <input type="hidden" id="idUbahMapel" name="idUbahMapel" value="">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaMapel" class="col-sm-3 col-form-label">Nama Mapel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahNamaMapel" name="ubahNamaMapel">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kodeMapel" class="col-sm-3 col-form-label">Kode Mapel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahKodeMapel" name="ubahKodeMapel">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahKelompok" class="col-sm-3 col-form-label">Kelompok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahKelompok" name="ubahKelompok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanUbahMapel">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>