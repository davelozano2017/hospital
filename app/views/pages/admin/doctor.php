
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Doctor</span></h4>
    </div>
    <div class="heading-elements">
        <div class="heading-btn-group">
            <button class="btn btn-primary" onclick="doctor_modal()"><i class="icon-user-plus"></i> </button>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Accounts</li>
        <li class="active">Doctor</li>
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
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Username</th>
                <th class="text-center">Action</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach($data['doctors'] as $row) { ?> 
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['contact']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['gender']?></td>
                    <td><?=$row['username']?></td>
                    <td class="text-center"><a class="btn btn-primary" onclick="view_doctor('<?=$row['accounts_id']?>')">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->

<div id="doctor-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Doctor's Information</h6>
            </div>

            <div class="modal-body">
                <form name="formDoctor" id="formDoctor" method="POST" novalidate>
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                    <input type="hidden" id="doctor_accounts_id" name="doctor_accounts_id">
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="doctor_name" id="doctor_name" ng-model="doctor_name" class="form-control" required>
                        <span ng-messages="formDoctor.doctor_name.$error" ng-if="formDoctor.doctor_name.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group ">
                        <label for="">Contact</label>
                        <input type="text" ng-pattern="/^[0-9]*$/" name="doctor_contact" id="doctor_contact" ng-model="doctor_contact" class="form-control" required>
                        <span ng-messages="formDoctor.doctor_contact.$error" ng-if="formDoctor.doctor_contact.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please type valid number..</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group ">
                        <label for="">Email Address</label>
                        <input type="email" name="doctor_email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="doctor_email" ng-model="doctor_email" class="form-control" required>
                        <span ng-messages="formDoctor.doctor_email.$error" ng-if="formDoctor.doctor_email.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group ">
                        <label for="">Gender</label>
                        <select name="doctor_gender" id="doctor_gender"  class="form-control" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="">Username</label>
                        <input type="text" name="doctor_username" id="doctor_username" ng-model="doctor_username" class="form-control" required>
                        <span ng-messages="formDoctor.doctor_username.$error" ng-if="formDoctor.doctor_username.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="doctor_address" id="doctor_address" ng-model="doctor_address" style="resize:none;height:70px" required></textarea>
                        <span ng-messages="formDoctor.doctor_address.$error" ng-if="formDoctor.doctor_address.$dirty">
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

            </div>

            <div class="modal-footer">
                <button type="submit" ng-disabled="formDoctor.$invalid" id="btn-doctor" name="btn-doctor" onclick="InsertOrUpdateDoctor()"  class="btn btn-primary">Add Doctor <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
