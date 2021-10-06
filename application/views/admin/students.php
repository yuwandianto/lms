<!-- Awal Halaman -->
<main class="pt-3">
    <div class="container mt-5">
        <h3 class="fw-bold">Students</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col mb-2">
                <button class="btn btn-danger semuaDataSiswa"><i class="fas fa-trash-alt"></i> Hapus Semua Data</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importSiswa"><i class="fas fa-file-upload"></i> Import Siswa</button>
            </div>
            <table id="dataTablesSiswa" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Tingkat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="dataClasses">
                    <?php $no = 1;
                    foreach ($students as $std) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $std->namaSiswa; ?></td>
                            <td><?= $std->nisn; ?></td>
                            <td><?= $std->namaKelas; ?></td>
                            <td><?= $std->tingkat; ?></td>
                            <td>
                                <button class="btn badge bg-warning tombolUbahSiswa" data-id="<?= $std->ids; ?>">Ubah</button>
                                <button class="btn badge bg-danger tombolHapusSiswa" data-id="<?= $std->ids; ?>" namaSiswa="<?= $std->namaSiswa; ?>">Hapus</button>
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
<div class=" modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="namaSiswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaSiswa" name="namaSiswa">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kodeKelas" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="kodeKelas" id="kodeKelas" class="form-control select2" style="width: 100%; height: 100px">
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($classes as $cls) : ?>
                                    <option value="<?= $cls->kodeKelas; ?>"><?= $cls->namaKelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="nisn" name="nisn">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombolSimpanSiswa">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="importSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <a target="_blank" href="<?= base_url('pageAdmin/df_students'); ?>">Unduh Format</a>
                    <hr>
                    <?= form_open_multipart('insert/import_students'); ?>
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

<div class="position-fixed top-0 end-0 p-3 " style="z-index: 99999">
  <div id="simpanSiswaSukses" class="toast bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Success</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Data berhasil disimpan
    </div>
  </div>
</div>