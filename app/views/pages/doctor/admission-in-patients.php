<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
    <div class="page-title">
        <h4><span class="text-semibold">Admissions</span></h4>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Admissions</li>
        <li class="active">In Patients</li>
    </ul>
</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

<!-- Basic responsive configuration -->
<div class="panel panel-flat">

<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#Admission" data-toggle="tab">Admission</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="Admission">
            <table id="doctor" class="table datatable-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Hospital Code</th>
                        <th>Physicians</th>
                        <th>Room</th>
                        <th>Date</th>
                        <th style="width:1px" class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($data['admissions'] as $row) { ?> 
                        <tr>
                            <td><?=$row['firstname']. ' '.$row['middlename']. ' '.$row['surname']?></td>
                            <td><?=$row['hospital_code']?></td>
                            <td>Dr. <?=$row['name']?></td>
                            <td><?=$row['room_type'].' - '.$row['floor'].' - '.$row['room_number']?></td>
                            <td><?=date('M d,Y',strtotime($row['admission_date']))?></td>
                            <td class="text-center"><a class="btn btn-primary" onclick="view_admissions('<?=$row['admissions_id']?>')">view</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

        
    
</div>
<!-- /basic responsive configuration -->

<div id="admission-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Admission & Discharge Record</h6>
            </div>

            <div class="modal-body">
                <form name="formAdmission" id="formAdmission" method="POST" novalidate>
                    <input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
                    <input type="hidden" id="admissions_id" name="admissions_id">
                    <input type="hidden" name="patient_code" id="patient_code" class="form-control">
                    <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic-tab1" data-toggle="tab">Patient Details</a></li>
                        <li><a href="#basic-tab2" data-toggle="tab">Admission / Discharge Details</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="basic-tab1">
                            
                        <div class="row">
                        <!-- 1st -->
                                <div class="col-sm-4">
                                    <label for="">Surname</label>
                                    <div class="form-group ">
                                    <input readonly type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="surname" id="surname" ng-model="surname" class="form-control" required>
                                        <span ng-messages="formAdmission.surname.$error" ng-if="formAdmission.surname.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">First Name</label>
                                    <div class="form-group ">
                                        <input readonly type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="firstname" id="firstname" ng-model="firstname" class="form-control" required>
                                        <span ng-messages="formAdmission.firstname.$error" ng-if="formAdmission.firstname.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Middle Name</label>
                                    <div class="form-group ">
                                        <input readonly type="text" ng-pattern ="/^[a-zA-Z\s]*$/"  name="middlename" id="middlename" ng-model="middlename" class="form-control">
                                        <span ng-messages="formAdmission.middlename.$error" ng-if="formAdmission.middlename.$dirty">
                                            <strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- 2nd  -->
                                <div class="col-sm-4">
                                    <label for="">Birthday</label>
                                    <div class="form-group ">
                                        <input readonly type="date" name="birthday" id="birthday" ng-model="birthday" class="form-control" required>
                                        <span ng-messages="formAdmission.birthday.$error" ng-if="formAdmission.birthday.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                 <div class="col-sm-8">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="patient_address" id="patient_address" ng-model="patient_address" class="form-control" required>
                                    </div>
                                </div>
                               <!-- 3rd  -->
                                
                                <div class="col-sm-4">
                                    <label for="">Birth Place</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="birthplace" id="birthplace" ng-model="birthplace" class="form-control" required>
                                        <span ng-messages="formAdmission.birthplace.$error" ng-if="formAdmission.birthplace.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                 <div class="col-sm-2">
                                    <label for="">Age</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="age" id="age" ng-model="age" class="form-control" required>
                                        <span ng-messages="formAdmission.age.$error" ng-if="formAdmission.age.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Gender</label>
                                    <div class="form-group">
                                        <select readonly name="gender" id="gender"  class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Civil Status</label>
                                    <div class="form-group">
                                        <select readonly name="civil_status" id="civil_status"  class="form-control" required>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Widower">Widower</option>
                                            <option value="Seperated">Seperated</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- 4th -->

                                <div class="col-sm-4">
                                    <label for="">Nationality</label>
                                    <div class="form-group">
                                        <select readonly name="nationality" id="nationality"  class="form-control" required>
                                            <?php foreach($data['nationality'] as $list) { ?>
                                                <option value="<?=$list['nationality']?>"><?=$list['nationality']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Religion</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="religion" id="religion" ng-model="religion" class="form-control" required>
                                        <span ng-messages="formAdmission.religion.$error" ng-if="formAdmission.religion.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Occupation</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="occupation" id="occupation" ng-model="occupation" class="form-control">
                                    </div>
                                </div>
                                <!-- 5th -->

                                <div class="col-sm-3">
                                    <label for="">Employer</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="name1" id="name1" ng-model="name1" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="address1" id="address1" ng-model="address1" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Tel. No.</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="contact1" id="contact1" ng-model="contact1" class="form-control">
                                    </div>
                                </div>

                                <!-- 6th  -->

                                <div class="col-sm-3">
                                    <label for="">Father's Name</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="name2" id="name2" ng-model="name2" class="form-control" required>
                                        <span ng-messages="formAdmission.name2.$error" ng-if="formAdmission.name2.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="address2" id="address2" ng-model="address2" class="form-control" required>
                                        <span ng-messages="formAdmission.address2.$error" ng-if="formAdmission.address2.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Tel. No.</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="contact2" id="contact2" ng-model="contact2" class="form-control" required>
                                        <span ng-messages="formAdmission.contact2.$error" ng-if="formAdmission.contact2.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <!-- 7th -->

                                <div class="col-sm-3">
                                    <label for="">Monther's Name</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="name3" id="name3" ng-model="name3" class="form-control" required>
                                        <span ng-messages="formAdmission.name3.$error" ng-if="formAdmission.name3.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="address3" id="address3" ng-model="address3" class="form-control" required>
                                    </div>
                                        <span ng-messages="formAdmission.address3.$error" ng-if="formAdmission.address3.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Tel. No.</label>
                                    <div class="form-group">
                                        <input readonly type="text" name="contact3" id="contact3" ng-model="contact3" class="form-control" required>
                                        <span ng-messages="formAdmission.contact3.$error" ng-if="formAdmission.contact3.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            
                        </div>

                        <div class="tab-pane" id="basic-tab2">

                            <div class="row">
                                <!-- 1st -->
                                <div class="col-sm-4">
                                    <label for="">Hospital Code.</label>
                                    <div class="form-group">
                                        <input type="text" name="hospital_code" id="hospital_code" ng-model="hospital_code" class="form-control" required>
                                        <span ng-messages="formAdmission.hospital_code.$error" ng-if="formAdmission.hospital_code.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Medical Record No.</label>
                                    <div class="form-group">
                                        <input type="text" name="medical_record_number" id="medical_record_number" ng-model="medical_record_number" class="form-control" required>
                                        <span ng-messages="formAdmission.medical_record_number.$error" ng-if="formAdmission.medical_record_number.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Room</label>
                                    <select name="room" id="room" class="form-control">
                                        <?php foreach($data['rooms'] as $room_list) { ?>
                                            <option value="<?=$room_list['rooms_id']?>"><?=$room_list['room_type'].' - '.$room_list['floor'].' - '.$room_list['room_number']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                            </div>

                                <!-- 2nd -->
                            <div class="row">
                            <div class="col-sm-6">
                                    <label for="">Admission ( Date ) *</label>
                                    <div class="form-group">
                                        <input  type="date" max="<?=date('Y-m-d')?>" name="admission_date" id="admission_date" ng-model="admission_date_time" class="form-control" required>
                                        <span ng-messages="formAdmission.admission_date.$error" ng-if="formAdmission.admission_date.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Admission ( Time ) *</label>
                                    <div class="form-group">
                                        <input type="time" name="admission_time" id="admission_time" ng-model="admission_time" class="form-control" required>
                                        <span ng-messages="formAdmission.admission_time.$error" ng-if="formAdmission.admission_time.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Discharged ( Date )</label>
                                    <div class="form-group">
                                        <input type="date" name="discharged_date" id="discharged_date" ng-model="discharged_date" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Discharged ( Time )</label>
                                    <div class="form-group">
                                        <input type="time" name="discharged_time" id="discharged_time" ng-model="discharged_time" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>

                                <!-- 3rd -->
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">No of Days.</label>
                                    <div class="form-group">
                                        <input type="text" name="days" id="days" ng-model="days" class="form-control" required>
                                        <span ng-messages="formAdmission.days.$error" ng-if="formAdmission.days.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Admitting Personel</label>
                                    <div class="form-group">
                                        <input type="text" name="admitting_personnel" id="admitting_personnel" ng-model="admitting_personnel" class="form-control" required>
                                        <span ng-messages="formAdmission.admitting_personnel.$error" ng-if="formAdmission.admitting_personnel.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Attending Physician</label>
                                    <div class="form-group">
                                        <select name="attending_physicians[]" id="attending_physicians"  class="form-control" required>
                                            <?php foreach($data['physicians'] as $physicians_list) { ?>
                                                <option value="<?=$physicians_list['accounts_id']?>" selected><?=$physicians_list['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <!-- 3rd  -->
                            <div class="row">

                                <div class="col-sm-6">
                                    <label for="">Referred By ( Physician / Agency )</label>
                                    <div class="form-group">
                                        <input type="text" name="referred_by" id="referred_by" ng-model="referred_by" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Alert</label>
                                    <div class="form-group">
                                        <input type="text" name="alert" id="alert" ng-model="alert" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Allergic to</label>
                                    <div class="form-group">
                                        <input type="text" name="allergic" id="allergic" ng-model="allergic" class="form-control">
                                    </div>
                                </div>

                            </div>
                            

                            <!-- 4th -->
                            <div class="row">

                                <div class="col-sm-4">
                                    <label for="">Type Of Admissions</label>
                                    <select name="admission_type" id="admission_type" class="form-control" required>
                                        <option value="New">New</option>
                                        <option value="Old">Old</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Health Insurance / Benefits</label>
                                    <select name="health_insurance" id="health_insurance" class="form-control">
                                        <option value="Indigent">Indigent</option>
                                        <option value="Non-Indigent">Non-Indigent</option>
                                        <option value="PWD">PWD</option>
                                        <option value="Pink Card Holder">Pink Card Holder</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Philhealth</label>
                                    <select name="philhealth" id="philhealth" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Formal (GSIS/PS)">Formal (GSIS/PS)</option>
                                        <option value="Informal/IPP">Informal/IPP</option>
                                        <option value="Lifetime">Lifetime</option>
                                        <option value="Sponsored">Sponsored</option>
                                        <option value="Indigent">Indigent</option>
                                        <option value="Senior Citizen">Senior Citizen</option>
                                        <option value="OFW/OWP">OFW/OWP</option>
                                    </select>
                                </div>

                            
                            </div>
                            <br>

                            <!-- 5th -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Data Furnished By</label>
                                    <div class="form-group">
                                        <input type="text" name="data_furnished" id="data_furnished" ng-model="data_furnished" class="form-control" required>
                                        <span ng-messages="formAdmission.data_furnished.$error" ng-if="formAdmission.data_furnished.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Address And Contact No. Of Informant</label>
                                    <div class="form-group">
                                        <input type="text" name="informant" id="informant" ng-model="informant" class="form-control" required>
                                        <span ng-messages="formAdmission.informant.$error" ng-if="formAdmission.informant.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Relation To Patient</label>
                                    <div class="form-group">
                                        <input type="text" name="patient_relation" id="patient_relation" ng-model="patient_relation" class="form-control" required>
                                        <span ng-messages="formAdmission.patient_relation.$error" ng-if="formAdmission.patient_relation.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- 6th -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Admission Diagnosis</label>
                                    <div class="form-group">
                                        <input type="text" name="admission_diagnosis" id="admission_diagnosis" ng-model="admission_diagnosis" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <label for="">Final Diagnosis</label>
                                    <div class="form-group">
                                        <select class="form-control select2" name="final_diagnosis" id="final_diagnosis">
                                                <option value="" selected>Select Diagnosis</option>
                                            <?php foreach($data['diseases'] as $dis) { ?>
                                                <option value="<?=$dis['diseases']?>"><?=$dis['diseases']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="">ICD Code No.</label>
                                    <div class="form-group">
                                        <input type="text" name="icd" id="icd" ng-model="icd" class="form-control" required>
                                        <span ng-messages="formAdmission.icd.$error" ng-if="formAdmission.icd.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <!-- 7th -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Principal operation / Procedure other operation(s) Procedure(s) Accidents / Injuries / Poisoning (E CODE) / Place of occurrence</label>
                                    <div class="form-group">
                                        <input type="text" name="principal_operation" id="principal_operation" ng-model="principal_operation" class="form-control" required>
                                        <span ng-messages="formAdmission.principal_operation.$error" ng-if="formAdmission.principal_operation.$dirty">
                                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Disposition</label>
                                    <select name="disposition" id="disposition" class="form-control">
                                    <option value="Unknown">Unknown</option>
                                        <option value="Discharged">Discharged</option>
                                        <option value="Transferred">Transferred</option>
                                        <option value="Absconded">Absconded</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="">Outcome</label>
                                    <select name="outcome" id="outcome" class="form-control">
                                        <option value="Unknown">Unknown</option>
                                        <option value="Recovered">Recovered</option>
                                        <option value="Died">Died</option>
                                        <option value="48 Hours">48 Hours</option>
                                        <option value="More Than 48 Hours">More Than 48 Hours</option>
                                        <option value="Improved">Improved</option>
                                        <option value="Unimproved">Unimproved</option>
                                        <option value="Autopsy">Autopsy</option>
                                        <option value="No Autopsy">No Autopsy</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                    
                    

            </div>

            <div class="modal-footer">
                <button type="submit" ng-disabled="formAdmission.$invalid" id="btn-admissions" name="btn-admissions" onclick="InsertOrUpdateAdmission()"  class="btn btn-primary"> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
