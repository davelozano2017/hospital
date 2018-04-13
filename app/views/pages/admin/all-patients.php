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


<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#Admission" data-toggle="tab">Admissions & Discharged Records</a></li>
        <li><a href="#OutPatients" data-toggle="tab">Out Patient Records</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="Admission">
            <table id="doctor" class="table datatable-responsive">
                <thead>
                    <tr>
                        <th colspan=5>Name</th>
                        <th style="width:1px" class="text-center">Action</th>
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
                            <td class="text-cexnter"><a  class="btn btn-primary"  href="<?=URL?>admin/view_patients/<?=$row['admissions_id']?>">view</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

        <div class="tab-pane" id="OutPatients">
            <table id="doctor" class="table datatable-responsive">
                <thead>
                    <tr>
                        <th colspan=5>Name</th>
                        <th style="width:1px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['outpatients'] as $rows) { ?> 
                        <tr>
                            <td><?=$rows['firstname']. ' '.$rows['middlename']. ' '.$rows['surname']?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-cexnter"><a  class="btn btn-primary" href="<?=URL?>admin/view_patient/<?=$rows['outpatients_id']?>">view</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>





    
</div>


<!-- /basic responsive configuration -->
