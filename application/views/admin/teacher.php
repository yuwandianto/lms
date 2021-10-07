<!-- Awal Halaman -->
<main class="pt-3">
    <div class="container mt-5">
        <h3 class="fw-bold">Teachers</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-2">
                <button class="btn btn-danger semuaDataGuru"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuru"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importGuru"><i class="fas fa-file-upload"></i> Import Guru</button>
            </div>
            <table id="dataTablesSiswa" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Sandi</th>
                        <th>HP / WA</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($teachers as $tc) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tc->namaGuru; ?></td>
                            <td><?= $tc->nip; ?></td>
                            <td><?= $tc->email; ?></td>
                            <td>
                                <?php if (password_verify('password', $tc->password)) {
                                    # code...
                                    echo 'password';
                                } else {
                                    # code...
                                    echo 'default password was edited';
                                }; ?>
                            </td>
                            <td><?= $tc->hp; ?></td>
                            <td>
                                <button class="btn badge bg-warning tombolUbahGuru" data-id="<?= $tc->id; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusGuru" data-id="<?= $tc->id; ?>" tcName="<?= $tc->namaGuru; ?>">Hapus</button>
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
<div class=" modal fade" id="tambahGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaGuru" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaGuru" name="namaGuru">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="password" disabled readonly name="password" value="password">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="hp" class="col-sm-3 col-form-label">hp</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="hp" name="hp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanGuru">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999999">
    <div id="simpanGuruSukses" class="toast bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Data Guru berhasil ditambah
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_teacher'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_teachers'); ?>
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

<div class=" modal fade" id="ubahDataGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ubahDataGuru">
                <input type="hidden" id="idUbahGuru" name="idUbahGuru" value="">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="ubahNamaGuru" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahNamaGuru" name="ubahNamaGuru">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahNipGuru" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ubahNipGuru" name="ubahNipGuru">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahEmailGuru" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled readonly id="ubahEmailGuru" name="ubahEmailGuru">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahPasswordGuru" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Kosongkan jika tidak diubah" class="form-control" id="ubahPasswordGuru" name="ubahPasswordGuru">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ubahHpGuru" class="col-sm-3 col-form-label">HP / WA</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="ubahHpGuru" name="ubahHpGuru">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanUbahGuru">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>