<!-- Core JS files -->
<script type="text/javascript" src="<?=ASSETS?>js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>functions/ajax.js"></script>
<script type="text/javascript" src="<?=ASSETS?>angular/1.4.8.angular.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>angular/1.4.2.angular.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>toastr/js/toastr.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/core/libraries/jquery_ui/core.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/plugins/forms/selects/selectboxit.min.js"></script>
<!-- Theme JS files -->
<script type="text/javascript" src="<?=ASSETS?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/plugins/forms/selects/select2.min.js"></script>

<script type="text/javascript" src="<?=ASSETS?>js/core/app.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/pages/datatables_responsive.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/pages/form_selectbox.js"></script>
<!-- /theme JS files -->
<!-- /theme JS files -->
<script type="text/javascript">
var app = angular.module('app', ['ngMessages']);
app.controller('mainController',function($scope){
    $scope.name     = '<?=$data['user']->name?>',
    $scope.contact  = '<?=$data['user']->contact?>',
    $scope.email    = '<?=$data['user']->email?>',
    $scope.gender   = '<?=$data['user']->gender?>',
    $scope.address  = '<?=$data['user']->address?>',
    $scope.username = '<?=$data['user']->username?>'
});
$('.picture').change( function(event) {
    $("#preview").attr('src',URL.createObjectURL(event.target.files[0]));
});
toastr_option();
</script>
</body>
</html>
