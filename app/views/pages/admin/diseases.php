
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Diseases</span></h4>
    </div>
    <div class="heading-elements">
        <div class="heading-btn-group">
            <button class="btn btn-primary" onclick="diseases_modal()"><i class="icon-user-plus"></i> </button>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Control Panel</li>
        <li class="active">Diseases</li>
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
                <th style="width:1px">#</th>
                <th colspan=4 >Diseases</th>
                <th>Action</th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach($data['diseases'] as $row) { ?> 
                <tr>
                    <td style="width:1px"><?=++$i?></td>
                    <td><?=$row['diseases']?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><a class="btn btn-primary" onclick="view_diseases('<?=$row['diseases_id']?>')">View</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->

<div id="diseases-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Diseases Details</h6>
            </div>

            <div class="modal-body">
                <form name="formDiseases" id="formDiseases" method="POST" novalidate>
                <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                <input type="hidden" id="diseases_id" name="diseases_id">
                <div class="form-group ">
                    <label for="">Diseases</label>
                    <input type="text" name="diseases" id="diseases" ng-model="diseases" class="form-control" required>
                    <span ng-messages="formDiseases.diseases.$error" ng-if="formDiseases.diseases.$dirty">
                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                    </span>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-delete-diseases" name="btn-delete-diseases" onclick="delete_diseases()"  class="btn btn-primary hidden">Delete Diseases <i class="icon-arrow-right14 position-right"></i></button>
                <button type="submit" ng-disabled="formDiseases.$invalid" id="btn-diseases" name="btn-diseases" onclick="InsertOrUpdateDiseases()"  class="btn btn-primary">Add Diseases <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
