<!-- ========== Left Sidebar Start ========== -->
<style>
.slimScrollBar {
    background: black !important;
    width: 20px !important;
}
</style>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?= base_url() .
                    'assets/' ?>images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url() .
                            'auth/logout' ?>"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="text-muted m-0">Admin</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= base_url() .
                        'bo/dashboard' ?>" class="waves-effect <?= $page ==
'dashboard'
    ? 'active'
    : null ?>">
                        <i class="md md-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li class="has_sub">
                    <?php
                    $side_menu = null;
                    $side_menu = [
                        '0',
                        'informasi',
                        'program',
                        'jurusan',
                        'organisasi',
                        'fasilitas',
                    ];
                    ?>
                    <a href="#" class="waves-effect <?= array_search(
                        $page,
                        $side_menu
                    )
                        ? 'active'
                        : null ?>">
                        <i class="fa fa-globe"></i><span>Master Data</span><span class="pull-right"><i
                                class="md md-add"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <?php
                        unset($side_menu[0]);
                        foreach ($side_menu as $val): ?>
                        <li class="<?= $val == $page
                            ? 'active'
                            : null ?>"><a href="<?= base_url() .
    'bo/' .
    $val ?>"><?= $val ?></a>
                        </li>
                        <?php endforeach;
                        ?>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->