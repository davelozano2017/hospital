
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Logs</span></h4>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Control Panel</li>
        <li class="active">Logs</li>
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
                <th>Name</th>
                <th >Content</th>
                <th colspan=4>Day</th>
                
                </tr>
        </thead>
        <tbody>
            <?php foreach($data['logs'] as $row) { ?> 
                <tr>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['content'];?></td>
                    <th><?=date('M d, Y g:i A',strtotime($row['created_at']))?></th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->
