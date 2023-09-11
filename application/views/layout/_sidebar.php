<!--**********************************
    Sidebar start
***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <?php if ($this->session->userdata('username')) : ?>
                <!-- Jika ada user/session login -->
                <li><a class="has-arrow" href="<?= base_url('user/dashboard') ?>" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                </li>
                <li class="nav-label">Apps</li>
                <li><a class="has-arrow" href="<?= base_url('pemasukan') ?>" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Pemasukan</span></a>
                </li>
                <li><a class="has-arrow" href="<?= base_url('pengeluaran') ?>" aria-expanded="false"><i
                            class="icon icon-chart-bar-33"></i><span class="nav-text">Pengeluaran</span></a>
                </li>
                <?php if ($_SESSION['level'] == 'Admin'): ?>
                    <li class="nav-label">Components</li>
                    <li><a class="has-arrow" href="<?= base_url('user') ?>" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">User</span></a>
                    </li>
                <?php endif; ?>
            <?php else : ?>
                <!-- Jika tidak ada user/session login -->
                <li><a class="has-arrow" href="<?= base_url('user/dashboard') ?>" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
