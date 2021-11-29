<!-- Awal Halaman -->
<main class="pt-3">

    <div class="container mt-5">
        <h3 class="fw-bold">School</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <div class="col-md-8 mb-5">

                <form action="<?= base_url('edit/instansi'); ?>" method="post">
                    <div class="row mb-3">
                        <label for="namaSekolah" class="col-sm-3 col-form-label">Nama Sekolah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" value="<?= $instansi->namaSekolah; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="npsn" class="col-sm-3 col-form-label">NPSN</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="npsn" name="npsn" value="<?= $instansi->npsn; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $instansi->alamat; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="namaKepsek" class="col-sm-3 col-form-label">Nama Kepala Sekolah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaKepsek" name="namaKepsek" value="<?= $instansi->namaKepsek; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tp" class="col-sm-3 col-form-label">Tahun Pelajaran</label>
                        <div class="col-sm-9">
                            <select name="tp" id="tp" class="form-control">
                                <option value="">-- Pilih Tahun Pelajaran --</option>
                                <option value="2021/2022" <?= ($instansi->tp == '2021/2022') ? 'selected' : ''; ?>>2021 / 2022</option>
                                <option value="2022/2023" <?= ($instansi->tp == '2022/2023') ? 'selected' : ''; ?>>2022 / 2023</option>
                                <option value="2023/2024" <?= ($instansi->tp == '2023/2024') ? 'selected' : ''; ?>>2023 / 2024</option>
                                <option value="2024/2025" <?= ($instansi->tp == '2024/2025') ? 'selected' : ''; ?>>2024 / 2025</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="t_anggaran" class="col-sm-3 col-form-label">Tahun Anggaran</label>
                        <div class="col-sm-9">
                            <select name="t_anggaran" id="t_anggaran" class="form-control">
                                <option value="">-- Pilih Tahun Anggaran --</option>
                                <option value="2021" <?= ($instansi->t_anggaran == '2021') ? 'selected' : ''; ?>>2021</option>
                                <option value="2022" <?= ($instansi->t_anggaran == '2022') ? 'selected' : ''; ?>>2022</option>
                                <option value="2023" <?= ($instansi->t_anggaran == '2023') ? 'selected' : ''; ?>>2023</option>
                                <option value="2024" <?= ($instansi->t_anggaran == '2024') ? 'selected' : ''; ?>>2024</option>
                                <option value="2025" <?= ($instansi->t_anggaran == '2025') ? 'selected' : ''; ?>>2025</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary offset-sm-3">Simpan Data</button>
                </form>
            </div>
            <div class="col-md-4">
                <?= form_open_multipart('edit/logo'); ?>
                <div class="d-flex justify-content-center">
                    <img id="output" class="img-thumbnail" src="<?= base_url('assets/images/logo/') . $instansi->logoSekolah; ?>" style="max-height: 250px;" />
                    <br>

                </div>
                <br>
                <div class="mb-3">
                    <input class="form-control" name="file" type="file" accept=".jpg. .png, .gif, .PNG, .JPG" id="formFile" onchange="loadFile(event)" required>
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>


</main>
<!-- Akhir Halaman -->