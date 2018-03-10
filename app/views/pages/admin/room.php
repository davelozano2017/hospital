
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Rooms</span></h4>
    </div>
    <div class="heading-elements">
        <div class="heading-btn-group">
            <button class="btn btn-primary" onclick="room_modal()"><i class="icon-user-plus"></i> </button>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Control Panel</li>
        <li class="active">Rooms</li>
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
                <th style="width:1px" colspan=2>#</th>
                <th>Type</th>
                <th>Floor</th>
                <th>Room Number</th>
                <th></th>
                </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach($data['rooms'] as $row) { ?> 
                <tr>
                    <td style="width:1px"  ><?=++$i?></td>
                    <td  style="width:1px"  class="text-center"></td>
                    <td><?=$row['room_type']?></td>
                    <td><?=$row['floor']?></td>
                    <td><?=$row['room_number']?></td>
                    <td class="text-center"><a onclick="view_rooms('<?=$row['rooms_id']?>')"><i class="icon-eye"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->

<div id="rooms-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Room Details</h6>
            </div>

            <div class="modal-body">
                <form name="formRooms" id="formRooms" method="POST" novalidate>
                <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                <input type="hidden" id="rooms_id" name="rooms_id">
                <div class="form-group ">
                    <label for="">Room Type</label>
                    <select name="room_type" id="room_type" class="form-control" required>
                        <option value="Ward">Ward</option>
                        <option value="Semi Private">Semi Private</option>
                        <option value="Private">Private</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Floor</label>
                    <input type="text" name="floor" id="floor" ng-model="floor" class="form-control" required>
                    <span ng-messages="formRooms.floor.$error" ng-if="formRooms.floor.$dirty">
                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                    </span>
                </div>

                <div class="form-group">
                    <label for="">Room Number</label>
                    <input type="text" name="room_number" id="room_number" ng-model="room_number" class="form-control" required>
                    <span ng-messages="formRooms.room_number.$error" ng-if="formRooms.room_number.$dirty">
                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                    </span>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-delete-rooms" name="btn-delete-rooms" onclick="delete_rooms()"  class="btn btn-primary hidden">Delete Room <i class="icon-arrow-right14 position-right"></i></button>
                <button type="submit" ng-disabled="formRooms.$invalid" id="btn-rooms" name="btn-rooms" onclick="InsertOrUpdateRooms()"  class="btn btn-primary">Add Room <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
