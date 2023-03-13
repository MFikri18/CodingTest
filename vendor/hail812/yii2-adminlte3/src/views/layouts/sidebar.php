<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">M Fikri</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Beranda',
                        'icon' => 'home',
                        'url' => ['/site/index']
                    ],
                    ['label' => 'Pasien', 'icon' => 'user', 'url' => ['trpasien/index'],],
                    ['label' => 'Registrasi', 'icon' => 'id-card', 'url' => ['trregistrasi/index'],],
                    ['label' => 'Rekam Medis',  'icon' => 'book', 'url' => ['trrekammedis/index']],
                    ['label' => 'Pembayaran',  'icon' => 'wallet', 'url' => ['masterpembayaran/index']],
                    ['label' => 'Petugas', 'icon' => 'user-nurse', 'url' => ['masterpetugas/index'],],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>