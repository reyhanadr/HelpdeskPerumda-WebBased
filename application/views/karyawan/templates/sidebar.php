<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%;">
                <img src="<?php echo base_url(); ?>./assets/img/users/<?php echo $users->foto_user?>" alt="User Foto" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="admin-info">
                <div class="font-strong"><?php echo $users->nama?></div><small><?php echo $users->nama_role?></small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="<?= ($active_menu === 'Dashboard') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/karyawan/Dashboard'); ?>"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">Terkait Pengelolaan</li>
            <li class="<?= ($active_menu === 'kelolaRequest') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Karyawan/KelolaRequest'); ?>"><i
                        class="sidebar-item-icon fa-solid fa-code-pull-request"></i>
                    <span class="nav-label">Kelola Request</span>
                </a>
            </li>
            <li class="<?= ($active_menu === 'kelolaPerangkat') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Karyawan/KelolaPerangkat'); ?>"><i
                        class="sidebar-item-icon fa-solid fa-desktop"></i>
                    <span class="nav-label">Kelola Perangkat</span>
                </a>
            </li>

            <li class="heading">Terkait Profil</li>
            <li class="<?= ($active_menu === 'kelolaprofil') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Karyawan/Profil'); ?>"><i class="sidebar-item-icon fa-solid fa-user"></i>
                    <span class="nav-label">Kelola Profil</span>
                </a>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->