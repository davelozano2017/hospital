
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Staff</span></h4>
    </div>
    <div class="heading-elements">
        <div class="heading-btn-group">
            <button class="btn btn-primary" onclick="staff_modal()"><i class="icon-user-plus"></i> </button>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Accounts</li>
        <li class="active">Staff</li>
    </ul>
</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

<!-- Basic responsive configuration -->
<div class="panel panel-flat">
    <table class="table datatable-responsive">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Status</th>
                <th class="text-center">Action</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach($data['staffs'] as $row) { ?> 
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['contact']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['gender']?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['status'] == 0 ? 'Active' : 'Not Active';?></td>
                    <td class="text-center"><a class="btn btn-primary" onclick="view_staff('<?=$row['accounts_id']?>')">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->

<div id="staff-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Staff's Information</h6>
            </div>

            <div class="modal-body">
                <form name="formStaff" id="formStaff" method="POST" novalidate>
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                    <input type="hidden" id="staff_accounts_id" name="staff_accounts_id">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="staff_name" id="staff_name" ng-model="staff_name" class="form-control" required>
                        <span ng-messages="formStaff.staff_name.$error" ng-if="formStaff.staff_name.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" ng-pattern="/^[0-9]*$/" name="staff_contact" id="staff_contact" ng-model="staff_contact" class="form-control" required>
                        <span ng-messages="formStaff.staff_contact.$error" ng-if="formStaff.staff_contact.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please type valid number..</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" name="staff_email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="staff_email" ng-model="staff_email" class="form-control" required>
                        <span ng-messages="formStaff.staff_email.$error" ng-if="formStaff.staff_email.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group ">
                        <label for="">Gender</label>
                        <select name="staff_gender" id="staff_gender" class="form-control" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="staff_address" id="staff_address" ng-model="staff_address" style="resize:none;height:70px" required></textarea>
                        <span ng-messages="formStaff.staff_address.$error" ng-if="formStaff.staff_address.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="0">Active</option>
                            <option value="1">Not Active</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="staff_username" id="staff_username" ng-model="staff_username" class="form-control" required>
                        <span ng-messages="formStaff.staff_username.$error" ng-if="formStaff.staff_username.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" ng-disabled="formStaff.$invalid" id="btn-staff" name="btn-staff" onclick="InsertOrUpdateStaff()"  class="btn btn-primary">Add Staff <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
