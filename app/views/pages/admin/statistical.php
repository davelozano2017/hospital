
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Reports</span></h4>
        </div>
        
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li class="active">Reports</li>
        </ul>
    </div>
</div>
<!-- /page header -->
<div class="content">
<!-- Simple panel -->

    


    <div class="panel">
        <div class="panel-body">
            <div class="row text-center">
               <form method="POST" action="<?=URL?>admin/reports"> 
                <div class="col-xs-1">
                    <h5 class="text-semibold no-margin pull-right">From :</h5>
                    <span class="text-muted text-size-small"></span>
                </div>
                <div class="col-xs-3">
                    <h5 class="text-semibold no-margin"><input type="date" class="form-control" name="from"></h5>
                    <span class="text-muted text-size-small"></span>
                </div>
                <div class="col-xs-2">
                    <h5 class="text-semibold no-margin pull-right">To :</h5>
                    <span class="text-muted text-size-small"></span>
                </div>


                <div class="col-xs-3">
                    <h5 class="text-semibold no-margin"><input type="date" class="form-control" name="to"></h5>
                    <span class="text-muted text-size-small"></span>
                </div>
                
                <div class="col-xs-3">
                    <h5 class="text-semibold no-margin"><button type="submit" name="filter" class="btn btn-primary">Filter</button></h5>
                    <span class="text-muted text-size-small"></span>
                </div>
                </form>
            </div>
        </div>
    </div>



            <!-- end -->
        </div>
    </div>


