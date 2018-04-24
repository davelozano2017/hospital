
<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Dashboard</span></h4>
        </div>
        
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
<!-- /page header -->
<div class="content">
<!-- Simple panel -->

    


    <div class="panel">
        <div class="panel-body">
            <div class="row text-center">
                
                <div class="col-xs-6">
                    <h5 class="text-semibold no-margin"><?=number_format($data['total_doctor'],0)?></h5>
                    <span class="text-muted text-size-small">Total Doctors</span>
                </div>

                <div class="col-xs-6">
                    <h5 class="text-semibold no-margin"><?=number_format($data['total_staff'],0)?></h5>
                    <span class="text-muted text-size-small">Total Staffs</span>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row text-center">
                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin"><?=number_format($data['total_admitted'],0)?></h5>
                    <span class="text-muted text-size-small">Total Admitted Patients</span>
                </div>

                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin"><?=number_format($data['total_discharged'],0)?></h5>
                    <span class="text-muted text-size-small">Total Discharged Patients</span>
                </div>

                <div class="col-xs-4">
                    <h5 class="text-semibold no-margin"><?=number_format($data['total_out_patients'],0)?></h5>
                    <span class="text-muted text-size-small">Total Out Patients</span>
                </div>

            </div>
        </div>
    </div>

    

    <div class="panel panel-flat">
        <div class="panel-body">
            <!-- start  -->
            <div class="row">
                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#basic-tab1" data-toggle="tab">Admission</a></li>
                            <li><a href="#basic-tab2" data-toggle="tab">Discharged</a></li>
                            <li><a href="#basic-tab3" data-toggle="tab">Out Patients</a></li>
                            <li><a href="#basic-tab4" data-toggle="tab">Diagnosis for in-patients</a></li>
                            <li><a href="#basic-tab5" data-toggle="tab">Diagnosis for out-patients</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="basic-tab1">
                            <div id="chart-container"></div>
                            </div>

                            <div class="tab-pane" id="basic-tab2">
                                <div id="chart-container-discharged"></div>
                            </div>

                            <div class="tab-pane" id="basic-tab3">
                                <div id="chart-container-out"></div>
                            </div>

                            <div class="tab-pane" id="basic-tab4" style="width:100%;position:relative">
                                <div class="row">
                                    <div id="chartContainer1" style="height:400px;width:100%;position:relative"></div>
                                </div>
                            </div>

                             <div class="tab-pane" id="basic-tab5" style="width:100%;position:relative">
                                <div class="row">
                                    <div id="chartContainer2" style="height:400px;width:100%;position:relative"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- end -->
        </div>
    </div>
    <?php
 
foreach($data['bar_in'] as $bars) {
    $final_diagnosis = $bars['final_diagnosis'];
    $dataPoints1[] = array("label" => $final_diagnosis, "y" => count_diseases($final_diagnosis)
   );
}

foreach($data['bar_out'] as $barss) {
    $impression = $barss['impression'];
    $dataPoints2[] = array("label" => $impression, "y" => count_diseases_out($impression)
   );
}

     
 ?>
 <script>
 window.onload = function () {
  
 var chart1 = new CanvasJS.Chart("chartContainer1", {
     animationEnabled: true, theme: "light2",  title: { text: "" }, axisY: { includeZero: true },
     data: [{ type: "column", dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?> }]
 });
 chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
     animationEnabled: true, theme: "light2",  title: { text: "" }, axisY: { includeZero: true },
     data: [{ type: "column", dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?> }]
 });
 chart2.render();
  
 }
 </script>