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
                        22
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
                        600
                    </div>
                    <a href="#" class="text-white">Detail &raquo;</a>
                </div>
            </div>
            <div class="card m-1 bg-warning bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="card-title fw-bold">Guru</h5>
                    <div class="display-5 fw-bold">
                        40
                    </div>
                    <a href="#" class="text-white">Detail &raquo;</a>
                </div>
            </div>
            <div class="card m-1 bg-danger bg-gradient" style="width: 19.5rem;">
                <div class="card-body">
                    <div class="my-icon display-1 text-white">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5 class="card-title fw-bold">Mata Pelajaran</h5>
                    <div class="display-5 fw-bold">
                        19
                    </div>
                    <a href="#" class="text-white">Detail &raquo;</a>
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
                    <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                        <div class="row m-1 border-bottom chat-not-me">
                            <h5 class="fw-bold">Administrator</h5>
                            <p class="text-muted">
                                Assalamualaikum,,
                            </p>
                        </div>

                        <div class="row m-1 border-bottom chat-me">
                            <h5 class="fw-bold">Saya</h5>
                            <p class="text-muted">
                                Waalaikumsalam
                            </p>
                        </div>

                        <div class="row m-1 border-bottom chat-not-me">
                            <h5 class="fw-bold">Administrator</h5>
                            <p class="text-muted">
                                Apa kabar hari ini?
                            </p>
                        </div>

                        <div class="row m-1 border-bottom chat-me">
                            <h5 class="fw-bold">Saya</h5>
                            <p class="text-muted">
                                Alhamdulillah sehat
                            </p>
                        </div>

                        <div class="row m-1 border-bottom chat-me">
                            <h5 class="fw-bold">Saya</h5>
                            <p class="text-muted">
                                Waalaikumsalam
                            </p>
                        </div>

                        <div class="row m-1 border-bottom chat-not-me">
                            <h5 class="fw-bold">Administrator</h5>
                            <p class="text-muted">
                                Apa kabar hari ini?
                            </p>
                        </div>


                    </div>

                    <div class="card-footer">
                        <form action="">
                            <div class="input-group">

                                <textarea name="text-chat" id="text-chat" class="form-control" rows="2"></textarea>
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