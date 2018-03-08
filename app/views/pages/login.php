<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=COMPANY_NAME?></title>
	<link rel="icon" href="<?=ASSETS?>images/icon.png">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>css/core.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>css/components.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS?>toastr/css/toastr.min.css" rel="stylesheet" type="text/css">
    <style>button { border-radius:0 !important }</style>
    <!-- /global stylesheets -->
</head>

<body class="login-container">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">
                <!-- Advanced login -->
                <form ng-app="app" ng-controller="mainController" name="formLogin" id="formLogin" method="POST" novalidate>
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <center><img src="<?=ASSETS?>images/logo.png" class="img-responsive"></center>
                            <h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
                        </div>
                        <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" name="username" id="username" ng-model="username" class="form-control" placeholder="Username" required>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <span ng-messages="formLogin.username.$error" ng-if="formLogin.username.$dirty">
                                <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password"  name="password" id="password" ng-model="password" class="form-control" placeholder="Password" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <span ng-messages="formLogin.password.$error" ng-if="formLogin.password.$dirty">
                                <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>

                        <div class="form-group">
                            <button type="submit" onclick="login()" id="btn-login" name="btn-login" ng-disabled="formLogin.$invalid"  class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>

                    </div>
                </form>
                <!-- /advanced login -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<!-- Core JS files -->
<script type="text/javascript" src="<?=ASSETS?>js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->
<script type="text/javascript" src="<?=ASSETS?>functions/ajax.js"></script>
<script type="text/javascript" src="<?=ASSETS?>angular/1.4.8.angular.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>angular/1.4.2.angular.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>toastr/js/toastr.min.js"></script>

<!-- /theme JS files -->
<script type="text/javascript">
var app = angular.module('app', ['ngMessages']);
app.controller('mainController',function($scope){});
toastr_option();
</script>
</body>
</html>