
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Profile</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>Dashboard</li>
            <li class="active">Profile</li>
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
                        <img id='preview' style="width:100%;height:100%" src="<?= empty($data['user']->image) ? 'https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png' : ASSETS.'/uploads/profile/'.$data['user']->image; ?>"  class="img-circle img-responsive">
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
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" name="name" id="name" ng-model="name" class="form-control" placeholder="Name" required>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        <span ng-messages="formUpdateProfile.name.$error" ng-if="formUpdateProfile.name.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" name="contact" id="contact" ng-model="contact" class="form-control" placeholder="Contact #" required>
                        <div class="form-control-feedback">
                            <i class="icon-phone2 text-muted"></i>
                        </div>
                        <span ng-messages="formUpdateProfile.contact.$error" ng-if="formUpdateProfile.contact.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" name="email" id="email" ng-model="email" class="form-control" placeholder="Email Address" required>
                        <div class="form-control-feedback">
                            <i class="icon-envelope text-muted"></i>
                        </div>
                        <span ng-messages="formUpdateProfile.email.$error" ng-if="formUpdateProfile.email.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="input-group form-group ">
                        
                        <select name="gender" id="gender" ng-model="gender" class="selectbox" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="input-group-addon ">
                            <i class="icon-people text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="address" id="address" name="address" placeholder="Address" ng-model="address" style="resize:none;height:70px" required></textarea>
                        <span ng-messages="formUpdateProfile.address.$error" ng-if="formUpdateProfile.address.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" name="username" id="username" ng-model="username" class="form-control" placeholder="Username" required>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        <span ng-messages="formUpdateProfile.username.$error" ng-if="formUpdateProfile.username.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" onclick="update_profile()" id="btn-upload-profile" name="btn-upload-profile" ng-disabled="formUpdateProfile.$invalid"  class="btn-block btn bg-blue">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


