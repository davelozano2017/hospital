
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Change Password</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Dashboard</li>
            <li class="active">Change Password</li>
        </ul>
    </div>
</div>
<!-- /page header -->
<div class="content">
<!-- Simple panel -->

<div class="row">

    <div class="col-sm-4">
        <div class="panel panel-flat">
            <div class="panel-body">
                <form method="POST" enctype="multipart/form-data" name="formProfile" id="formProfile">
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                    <input accept="image/*" type="file" style="display:none" name="files" id="file-2" onchange="profile_picture()" class="forn-control picture logo" />
                    <label for="file-2" style="border:none;cursor: pointer;">
                        <img id='preview' style="width:100%;height:200px" src="<?= empty($data['user']->image) ? 'https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png' : ASSETS.'/uploads/profile/'.$data['user']->image; ?>"  class="img-circle img-responsive">
                    </label>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="panel panel-flat">
            <div class="panel-body">
                <form ng-app="app" ng-controller="mainController" name="formUpdateProfile" id="formUpdateProfile" method="POST" novalidate>
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input disabled type="text" name="name" id="name" ng-model="name" class="form-control" placeholder="Name" required>
                                <span ng-messages="formUpdateProfile.name.$error" ng-if="formUpdateProfile.name.$dirty">
                                    <strong ng-message="required" class="text-danger">This field is required.</strong>
                                </span>
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input disabled type="text" name="contact" id="contact" ng-model="contact" class="form-control" placeholder="Contact #" required>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input disabled type="email" name="email" id="email" ng-model="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <select disabled name="gender" id="gender" ng-model="gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea disabled class="form-control" name="address" id="address" name="address" placeholder="Address" ng-model="address" style="resize:none;height:70px" required></textarea>
                                <span ng-messages="formUpdateProfile.address.$error" ng-if="formUpdateProfile.address.$dirty">
                                    <strong ng-message="required" class="text-danger">This field is required.</strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="password" ng-minlength=6 ng-model="password" name="password" required password-verify="{{confirm_password}}">
                                <span ng-messages="formUpdateProfile.password.$error" ng-if="formUpdateProfile.password.$dirty">
                                    <strong ng-message="required" class="text-danger">This field is required.</strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" ng-model="confirm_password" name="confirm_password" id="confirm_password" required password-verify="{{password}}">
                            <span ng-messages="formUpdateProfile.confirm_password.$error" ng-if="formUpdateProfile.confirm_password.$dirty">
                                <strong ng-message="required" class="text-danger">This field is required.</strong>
                                <strong ng-show="confirm_password != password" class="text-danger">Password not matched.</strong>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" onclick="update_password()" id="btn-upload-profile" name="btn-upload-profile" ng-disabled="formUpdateProfile.$invalid"  class="btn-block btn bg-blue">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>