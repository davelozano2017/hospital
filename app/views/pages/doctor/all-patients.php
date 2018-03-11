<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">All Patients</span></h4>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li class="active">All Patients</li>
    </ul>
</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

<!-- Basic responsive configuration -->
<div class="panel panel-flat">

<table id="doctor" class="table datatable-responsive">
    <thead>
        <tr>
            <th colspan=5>Name</th>
            <td style="width:1px" class="text-center">Action</td>
            </tr>
    </thead>
    <tbody>
        <?php foreach($data['all_patients'] as $row) { ?> 
            <tr>
                <td><?=$row['firstname']. ' '.$row['middlename']. ' '.$row['surname']?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><a href="<?=URL?>admin/view_patients/<?=$row['admissions_id']?>"><i class="icon-eye"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

    
</div>
<!-- /basic responsive configuration -->
