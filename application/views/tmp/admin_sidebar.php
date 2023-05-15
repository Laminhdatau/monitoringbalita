<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion " style="background: linear-gradient(to top left, #3399ff 42%, #9966ff 100%);" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Monitoring Tumbuh Kembang Balita
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id_menu, menu 
                    FROM user_menu 
                    JOIN user_access_menu ON user_menu.id_menu = user_access_menu.id_menu 
                   WHERE user_access_menu.role_id = $role_id 
                ORDER BY user_access_menu.id_menu ASC
                 ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- MEMBUAT SUB MENU -->
        <?php
        $menuId = $m['id_menu'];
        $querySubMenu = "SELECT * 
                    FROM user_sub_menu 
                    JOIN user_menu ON user_sub_menu.id_menu = user_menu.id_menu 
                   WHERE user_sub_menu.id_menu = $menuId 
                     AND user_sub_menu.is_active = 1
                 ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) :  ?>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
        <?php endforeach; ?>

        <hr class="sidebar-divider mt-3">

    <?php endforeach; ?>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/auth/logout'); ?>">
            <i class="fas fa-fw  fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->