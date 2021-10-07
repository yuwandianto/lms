<?php
$url = $this->uri->segment(1);
$sub1 = $this->uri->segment(2);; ?>
<!-- Awal Navbar -->
<nav class="navbar navbar-light bg-success fixed-top">
    <div class="container">
        <a class="navbar-brand text-white" href="javascript:void(0)">Learning Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-success" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?= ($url == 'pageAdmin' && $sub1 == '') ? 'text-white fw-bold' : ''; ?>" aria-current="page" href="<?= base_url('pageAdmin'); ?>"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                    </li>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= ($sub1 == 'class' || $sub1 == 'student' || $sub1 == 'teacher' || $sub1 == 'subject') ? 'text-white fw-bold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cogs me-2"></i> Pengaturan
                            </a>
                            <ul class="dropdown-menu bg-success noborder <?= ($sub1 == 'class' || $sub1 == 'student' || $sub1 == 'teacher' || $sub1 == 'subject') ? 'show' : ''; ?>">
                                <li><a class="dropdown-item <?= ($sub1 == 'class') ? 'text-white fw-bold' : ''; ?>" href="<?= base_url('pageAdmin/class'); ?>"><i class="far fa-building me-2"></i> Kelas</a></li>
                                <li><a class="dropdown-item <?= ($sub1 == 'student') ? 'text-white fw-bold' : ''; ?>" href="<?= base_url('pageAdmin/student'); ?>"><i class="fas fa-users me-2"></i> Siswa</a></li>
                                <li><a class="dropdown-item <?= ($sub1 == 'teacher') ? 'text-white fw-bold' : ''; ?>" href="<?= base_url('pageAdmin/teacher'); ?>"><i class="fas fa-user-tie me-2"></i> Guru</a></li>
                                <li><a class="dropdown-item <?= ($sub1 == 'subject') ? 'text-white fw-bold' : ''; ?>" href="<?= base_url('pageAdmin/subject'); ?>"><i class="fas fa-book me-2"></i> Mata Pelajaran</a></li>

                            </ul>
                        </li>
                    </ul>

                </ul>
                <form class="d-flex mt-3 pe-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->