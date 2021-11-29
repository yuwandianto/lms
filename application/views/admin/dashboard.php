<!-- Awal Halaman -->

<main class="pt-3">
    <div class="container mt-5">
        <h3 class="fw-bold">Dashboard</h3>
        <hr>
        <!-- Awal Konten Halaman -->
        <div class="row m-1 d-flex justify-content">
            <div class="card m-1 bg-primary bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="far fa-building"></i>
                    </div>
                    <h5 class="card-title fw-bold">Kelas</h5>
                    <div class="display-5 fw-bold">
                        <?= $kelas; ?>
                    </div>
                    <a href="<?= base_url('pageAdmin/class'); ?>" class="text-white">Detail &raquo;</a>
                </div>
            </div>
            <div class="card m-1 bg-success bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="card-title fw-bold">Siswa</h5>
                    <div class="display-5 fw-bold">
                        <?= $siswa; ?>
                    </div>
                    <a href="<?= base_url('pageAdmin/student'); ?>" class="text-white">Detail &raquo;</a>
                </div>
            </div>
            <div class="card m-1 bg-warning bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="card-title fw-bold">Guru</h5>
                    <div class="display-5 fw-bold">
                        <?= $guru; ?>
                    </div>
                    <a href="<?= base_url('pageAdmin/teacher'); ?>" class="text-white">Detail &raquo;</a>
                </div>
            </div>
            <div class="card m-1 bg-danger bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5 class="card-title fw-bold">Mata Pelajaran</h5>
                    <div class="display-5 fw-bold">
                        <?= $mapel; ?>
                    </div>
                    <a href="<?= base_url('pageAdmin/subject'); ?>" class="text-white">Detail &raquo;</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Kelengkapan Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span <?= ($kelas < 1) ? 'class="text-danger"' : 'class="text-success"'; ?>>Data Kelas</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($kelas > 0) {
                                            echo 'Saat ini terdapat ' . $kelas . ' data kelas yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/class') . '">di sini</a> untuk melihat detail data kelas';
                                        } else {
                                            echo '<span class="text-danger">Data kelas belum dimasukkan.</span>';
                                        }; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <span <?= ($siswa < 1) ? 'class="text-danger"' : 'class="text-success"'; ?>> Data Peserta Didik</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($siswa > 0) {
                                            echo 'Saat ini terdapat ' . $siswa . ' data peserta didik yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/student') . '">di sini</a> untuk melihat detail data peserta didik.';
                                        } else {
                                            echo '<span class="text-danger">Data peserta didik belum dimasukkan.</span>';
                                        };
                                        if ($kelas_data_siswa < $kelas) {
                                            echo '<br><span class="text-danger"> Ada perbedaan jumlah data kelas dan data siswa, hal ini kemungkinan terjadi ada kelas yang belum terisi data peserta didik.</span>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        <span <?= ($guru < 1) ? 'class="text-danger"' : 'class="text-success"'; ?>>Data Guru</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($guru > 0) {
                                            echo 'Saat ini terdapat ' . $guru . ' data guru yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/teacher') . '">di sini</a> untuk melihat detail data guru';
                                        } else {
                                            echo '<span class="text-danger">Data guru belum dimasukkan.</span>';
                                        }; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        <span <?= ($mapel < 1) ? 'class="text-danger"' : 'class="text-success"'; ?>>Data Mata Pelajaran</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($mapel > 0) {
                                            echo 'Saat ini terdapat ' . $mapel . ' data mata pelajaran yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/subject') . '">di sini</a> untuk melihat detail data mata pelajaran';
                                        } else {
                                            echo '<span class="text-danger">Data mata pelajaran belum dimasukkan.</span>';
                                        }; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        <span <?= ($jampel < 1) ? 'class="text-danger"' : 'class="text-success"'; ?>>Data Jam Pelajaran</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($jampel > 0) {
                                            echo 'Saat ini terdapat ' . $jampel . ' data jam pelajaran yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/timing') . '">di sini</a> untuk melihat detail data jam pelajaran';
                                        } else {
                                            echo '<span class="text-danger">Data jam pelajaran belum dimasukkan.</span>';
                                        }; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                        <span <?= ($jadwal < 1 || $jadwal_bentrok == 1) ? 'class="text-danger"' : 'class="text-success"'; ?>>Data Jadwal Pelajaran</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body ms-4">
                                        <?php if ($jadwal > 0) {
                                            echo 'Saat ini terdapat ' . $jadwal . ' data jadwal pelajaran yang telah dimasukkan. Klik <a href="' . base_url('pageAdmin/scedule') . '">di sini</a> untuk melihat detail data jadwal pelajaran';
                                        } else {
                                            echo '<span class="text-danger">Data jadwal pelajaran belum dimasukkan.</span>';
                                        };

                                        if ($jadwal_bentrok == 1) {
                                            echo '<br><span class="text-danger">Terdapat jadwal pelajaran bentrok. <br>Jadwal bentrok pada guru atas nama ' . $guru_bentrok->namaGuru . '</span>';
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 ">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Aktivitas</h5>
                    </div>
                    <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                        <div class="list-group">
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Administrator</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Login</p>
                                <small class="text-muted">Ip Address</small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Administrator</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Login</p>
                                <small class="text-muted">Ip Address</small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Administrator</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Login</p>
                                <small class="text-muted">Ip Address</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Live Chat</h5>
                    </div>
                    <div class="card-body" id="div_chats" style="overflow-y: auto; max-height: 400px;">
                        <?php foreach ($chats as $chat) : ?>
                            <div class="row m-1 border-bottom <?= ($chat->email != $this->session->userdata('user')) ? 'chat-not-me' : 'chat-me'; ?> ">
                                <h5 class="fw-bold"><?= $chat->user; ?></h5>
                                <p class="text-muted">
                                    <?= $chat->text_chat; ?>
                                </p>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="card-footer">
                        <form action="<?= base_url('insert/chat'); ?>" method="post">
                            <div class="input-group">

                                <textarea name="text-chat" id="text-chat" class="form-control" rows="2" required></textarea>
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Akhir Halaman -->