<!-- Awal Halaman -->
<main class="pt-3">
    <div class="container mt-5">
        <h3 class="fw-bold">Template Kop Surat</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <table>
                <tr>
                    <td style="width: 20%; text-align: center">
                        <?= form_open_multipart('edit/logoKopSatu'); ?>
                        <img id="output" class="img-thumbnail" src="<?= base_url('assets/images/logo/') . $kop1->logoKop; ?>" style="max-height: 250px;" />
                        <br><br>
                        <input class="form-control" name="file" type="file" accept=".jpg. .png, .gif, .PNG, .JPG" id="formFile" onchange="loadFile(event)" required>
                        <br>
                        <button class="btn btn-success" type="submit">Upload</button>
                        </form>
                    </td>
                    <td style="text-align: center; padding-left: 10px">
                        <form action="<?= base_url('edit/kopSatu'); ?>" method="post">
                            <input type="text" class="form-control mb-1 text-center" name="line1" value="<?= $kop1->line1; ?>">
                            <input type="text" class="form-control mb-1 text-center" name="line2" value="<?= $kop1->line2; ?>">
                            <input type="text" class="form-control mb-1 text-center" name="line3" value="<?= $kop1->line3; ?>">
                            <input type="text" class="form-control mb-1 text-center" name="line4" value="<?= $kop1->line4; ?>">
                            <input type="text" class="form-control mb-1 text-center" name="line5" value="<?= $kop1->line5; ?>">
                            <input type="text" class="form-control mb-1 text-center" name="line6" value="<?= $kop1->line6; ?>">
                            <br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>
<!-- Akhir Halaman -->