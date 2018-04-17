<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Doctor's Appointment</span></h4>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Doctor's Appointment</li>
        <li class="active">Out Patients</li>
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
                <th>OPD Case NUmber</th>
                <th colspan=4>Date</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach($data['outpatients'] as $row) { ?> 
                <tr>
                    <td><?=$row['firstname']. ' '.$row['middlename']. ' '.$row['surname']?></td>
                    <td><?=$row['opd_case_number']?></td>
                    <td><?=date('M d, Y',strtotime($row['date']))?></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><a class="btn btn-primary" onclick="view_out_patients('<?=$row['outpatients_id']?>')">View</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /basic responsive configuration -->

<div id="out-patient-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Medical Record Out-Patient-Department</h6>
            </div>

            <div class="modal-body">
                <form name="formOutPatients" id="formOutPatients" method="POST" novalidate>
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                    <input type="hidden" id="outpatients_id" name="outpatients_id">
                    <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic-tab1" data-toggle="tab">Patient Details</a></li>
                        <li><a href="#basic-tab2" data-toggle="tab">Medical Record</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="basic-tab1">
                            
                        <div class="row">
                        <!-- 1st -->
                                <div class="col-sm-4">
                                    <label for="">Surname</label>
                                    <div class="form-group ">
                                        <input type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="surname" id="surname" ng-model="surname" class="form-control" required>
                                        <span ng-messages="formOutPatients.surname.$error" ng-if="formOutPatients.surname.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">First Name</label>
                                    <div class="form-group ">
                                        <input type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="firstname" id="firstname" ng-model="firstname" class="form-control" required>
                                        <span ng-messages="formOutPatients.firstname.$error" ng-if="formOutPatients.firstname.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Middle Name</label>
                                    <div class="form-group ">
                                        <input type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="middlename" id="middlename" ng-model="middlename" class="form-control">
                                        <span ng-messages="formOutPatients.middlename.$error" ng-if="formOutPatients.middlename.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                    <div class="clearfix"></div>
                                
                                <!-- 2nd  -->
                                <div class="col-sm-4">
                                    <label for="">Birthday</label>
                                    <div class="form-group ">
                                        <input type="date" name="birthday" id="birthday" ng-model="birthday" class="form-control" required>
                                        <span ng-messages="formOutPatients.birthday.$error" ng-if="formOutPatients.birthday.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Age</label>
                                    <div class="form-group">
                                        <input type="text" name="age" id="age" ng-model="age" class="form-control" required>
                                        <span ng-messages="formOutPatients.age.$error" ng-if="formOutPatients.age.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Gender</label>
                                    <div class="form-group">
                                        <select name="gender" id="gender"  class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                 <div class="col-sm-12">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input type="text" name="patient_address" id="patient_address" ng-model="patient_address" class="form-control" required>
                                    </div>
                                </div>
                               <!-- 3rd  -->
                            </div>
                            
                        </div>

                        <div class="tab-pane" id="basic-tab2">

                            <div class="row">
                                <!-- 1st -->

                                <div class="col-sm-3">
                                    <label for="">OPD Case Number</label>
                                    <div class="form-group">
                                        <input type="text" name="opd_case_number" id="opd_case_number" ng-model="opd_case_number" class="form-control" required>
                                        <span ng-messages="formOutPatients.opd_case_number.$error" ng-if="formOutPatients.opd_case_number.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Chief Complaints</label>
                                    <div class="form-group">
                                        <input type="text" name="chief_complaints" id="chief_complaints" ng-model="chief_complaints" class="form-control" required>
                                        <span ng-messages="formOutPatients.chief_complaints.$error" ng-if="formOutPatients.chief_complaints.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                
                                <div class="col-sm-5">
                                    <label for="">Physicians</label>
                                    <div class="form-group">
                                        <select name="physicians_id" id="physicians_id"  class="form-control" required>
                                            <?php foreach($data['physicians'] as $physicians_list) { ?>
                                                <option value="<?=$physicians_list['accounts_id']?>"><?=$physicians_list['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-sm-2">
                                    <label for="">HP</label>
                                    <div class="form-group">
                                        <input type="text" name="hp" id="hp" ng-model="hp" class="form-control" required>
                                        <span ng-messages="formOutPatients.hp.$error" ng-if="formOutPatients.hp.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="">Pulse Rate</label>
                                    <div class="form-group">
                                        <input type="text" name="pulse_rate" id="pulse_rate" ng-model="pulse_rate" class="form-control" required>
                                        <span ng-messages="formOutPatients.pulse_rate.$error" ng-if="formOutPatients.pulse_rate.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Respiratory Rate</label>
                                    <div class="form-group">
                                        <input type="text" name="respiratory_rate" id="respiratory_rate" ng-model="respiratory_rate" class="form-control" required>
                                        <span ng-messages="formOutPatients.respiratory_rate.$error" ng-if="formOutPatients.respiratory_rate.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Temperature</label>
                                    <div class="form-group">
                                        <input type="text" name="temperature" id="temperature" ng-model="temperature" class="form-control" required>
                                        <span ng-messages="formOutPatients.temperature.$error" ng-if="formOutPatients.temperature.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="">Weight</label>
                                    <div class="form-group">
                                        <input type="text" name="weight" id="weight" ng-model="weight" class="form-control" required>
                                        <span ng-messages="formOutPatients.weight.$error" ng-if="formOutPatients.weight.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>

                                 <div class="col-sm-4">
                                    <label for="">Type</label>
                                    <div class="form-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="New Patient">New Patient</option>
                                            <option value="Revisit">Revisit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Date</label>
                                    <div class="form-group">
                                        <input type="date" max="<?=date('Y-m-d')?>" name="date" id="date" ng-model="date" class="form-control" required>
                                        <span ng-messages="formOutPatients.date.$error" ng-if="formOutPatients.date.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Time</label>
                                    <div class="form-group">
                                        <input type="time" name="time" id="time" ng-model="time" class="form-control" required>
                                        <span ng-messages="formOutPatients.time.$error" ng-if="formOutPatients.time.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="">Impression / Diagnosis</label>
                                    <div class="form-group">
                                        <input type="text" name="impression" id="impression" ng-model="impression" class="form-control" required>
                                        <span ng-messages="formOutPatients.impression.$error" ng-if="formOutPatients.impression.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="">Treatment / Medicine</label>
                                    <div class="form-group">
                                        <input type="text" name="treatment" id="treatment" ng-model="treatment" class="form-control" required>
                                        <span ng-messages="formOutPatients.treatment.$error" ng-if="formOutPatients.treatment.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </div>
                </div>
                    
                    

            </div>

            <div class="modal-footer">
                <button type="submit" ng-disabled="formOutPatients.$invalid" id="btn-out-patients" name="btn-out-patients" onclick="InsertOrUpdateOutPatients()"  class="btn btn-primary"> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
