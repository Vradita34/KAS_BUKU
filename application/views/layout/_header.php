<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <!-- <h2>Karang Taruna Mitra Remaja</h2> -->
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <!-- <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form> -->
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                <?php if ($this->session->userdata('username')) : ?>
                <!-- Jika ada user/session login -->
                <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2"><?= $_SESSION['username']; ?> </span>
                                </a>
                                <a  class="dropdown-item" id="logoutButton">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                
            <?php else : ?>
                <!-- Jika tidak ada user/session login -->
                <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="<?= base_url('auth') ?>">
                                <button type="button" class="btn btn-square btn-outline-primary">Login</button>
                            </a>
                        </li>
            <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->