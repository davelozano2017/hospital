<!-- Page container -->
<div class="page-container">

<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-main">
<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
        <div class="category-content">
            <div class="media">
                <a href="#" class="media-left"><img src="<?= empty($data['user']->image) ? 'https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png' : ASSETS.'/uploads/profile/'.$data['user']->image; ?>" class="img-circle img-sm" alt=""></a>
                <div class="media-body">
                    <span class="media-heading text-semibold"><?=$data['user']->name?></span>
                    <div class="text-size-mini text-muted">
                        <?= $data['user']->role == 0 ? '<label class="label label-danger">Administrator</label>' : ($data['user']->role == 1 ? '<label class="label label-info">Doctor</label>' : ($data['user']->role == 2 ? '<label class="label label-success">Staff</label>' : null));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <!-- Main -->
                <li class="navigation-header"><span>MAIN NAVIGATION</span> <i class="icon-menu" title="MAIN NAVIGATION"></i></li>
                <?php if($data['user']->role == 0) { ?> 
                    <li class="<?= $data['title'] == 'Dashboard' ? 'active':'';?>"><a href="<?=URL?>admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#"><i class="icon-users"></i> <span>Accounts</span></a>
                    <ul>
                        <li class="<?= $data['title'] == 'Doctor' ? 'active':'';?>"><a href="<?=URL?>admin/doctor">Doctor</a></li>
                        <li class="<?= $data['title'] == 'Staff' ? 'active':'';?>"><a href="<?=URL?>admin/staff">Staff</a></li>
                    </ul>
                </li>
                <li class="navigation-header"><span>PATIENT ADMISSION MODULE</span> <i class="icon-menu" title="PATIENT ADMISSION MODULE"></i></li>
                <li>
                    <a href="#"><i class="icon-users"></i> <span>Admissions & Discharge</span></a>
                    <ul>
                        <li class="<?= $data['title'] == 'In Patients' ? 'active':'';?>"><a href="<?=URL?>admin/admissions_in_patients">In Patients</a></li>
                        <li class="<?= $data['title'] == 'Out Patients' ? 'active':'';?>"><a href="<?=URL?>admin/admissions_out_patients">Out Patients</a></li>
                    </ul>
                </li>
                <li class="navigation-header"><span>miscellaneous</span> <i class="icon-menu" title="MISCELLANEOUS"></i></li>
                <li>
                    <a href="#"><i class="icon-cog3"></i> <span>Control Panel</span></a>
                    <ul>
                        <li class="<?= $data['title'] == 'Logs' ? 'active':'';?>"><a href="<?=URL?>admin/logs">Logs</a></li>
                        <li class="<?= $data['title'] == 'Room' ? 'active':'';?>"><a href="<?=URL?>admin/rooms">Rooms</a></li>
                    </ul>
                </li>
                <?php } elseif($data['user']->role == 1) { ?>
                    <li class="<?= $data['title'] == 'Dashboard' ? 'active':'';?>"><a href="<?=URL?>doctor/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                <?php } else { ?> 
                    <li class="<?= $data['title'] == 'Dashboard' ? 'active':'';?>"><a href="<?=URL?>staff/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                <?php } ?>
                
                <!-- /main -->
            </ul>
        </div>
    </div>
    <!-- /main navigation -->

</div>
</div>
<!-- /main sidebar -->