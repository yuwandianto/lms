<!-- Awal Halaman -->
<main class="pt-3">

    <div class="container mt-5">
        <h3 class="fw-bold">Template Surat Tugas</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-template1-tab" data-bs-toggle="tab" data-bs-target="#nav-template1" type="button" role="tab" aria-controls="nav-template1" aria-selected="true">Template 1</button>
                    <button class="nav-link" id="nav-template2-tab" data-bs-toggle="tab" data-bs-target="#nav-template2" type="button" role="tab" aria-controls="nav-template2" aria-selected="false">Template 2</button>
                    <button class="nav-link" id="nav-template3-tab" data-bs-toggle="tab" data-bs-target="#nav-template3" type="button" role="tab" aria-controls="nav-template3" aria-selected="false">Template 3</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-template1" role="tabpanel" aria-labelledby="nav-template1-tab">
                    <br>
                    <form action="<?= base_url('insert/templateSTsatu'); ?>" method="post">

                        <h3 class="text-center">Surat Tugas</h3>
                        <input type="text" class="form-control text-center" name="nomor" value="<?= $template1->nomor; ?>">
                        <br>
                        <table style="width: 100%;">
                            <tr>
                                <td>Dasar Surat</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" name="dasarSurat" value="<?= $template1->dasarSurat; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" name="nomorSurat" value="<?= $template1->nomorSurat; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" name="tanggalSurat" value="<?= $template1->tanggalSurat; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" name="perihal" value="<?= $template1->perihal; ?>">
                                </td>
                            </tr>
                        </table>
                        <br>

                        <textarea name="ditugaskan" id="editor">
                            <?= $template1->ditugaskan; ?>
                        </textarea>
                        <br>
                        <table style="width: 100%;">
                            <tr>
                                <td>Hari</td>
                                <td>:</td>
                                <td><input type="text" name="hari" class="form-control" value="<?= $template1->hari; ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><input type="text" name="tanggal" class="form-control" value="<?= $template1->tanggal; ?>"></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>:</td>
                                <td><input type="text" name="waktu" class="form-control" value="<?= $template1->waktu; ?>"></td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td>:</td>
                                <td><input type="text" name="tempat" class="form-control" value="<?= $template1->tempat; ?>"></td>
                            </tr>
                        </table>
                        <br>
                        <p>Demikian surat tugas ini dibuat untuk dilaksanakan dengan penih tanggung jawab</p>
                        <br><br>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="<?= base_url('cetak/stSatu'); ?>" target="_blank" onclick="return confirm('Pastikan sudah klik simpan sebelum mencetak')" class="btn btn-primary bottom-0 end-0">Cetak</a>

                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="nav-template2" role="tabpanel" aria-labelledby="nav-template2-tab">

                </div>
                <div class="tab-pane fade" id="nav-template3" role="tabpanel" aria-labelledby="nav-template3-tab">...</div>
            </div>
        </div>
    </div>


</main>
<!-- Akhir Halaman -->
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {})
        .catch(error => {
            console.error(error);
        });
</script>