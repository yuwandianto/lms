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