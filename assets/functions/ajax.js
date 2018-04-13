var url = getAbsolutePath();

function login() {
    var data = $('#formLogin').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'login/auth',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-login').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? location.href = data.url : notify(data.type,data.message);
            $('#btn-login').html('Login <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function filter_patient() {
    var search = $('#patient_code').val();
    $.ajax({
        type: 'POST',
        url : url + 'filter_patient',
        data : { search : search },
        dataType : 'json',
        success:function(data) {
            if(data.success == true) {
                $('#surname').val(data.data.surname);
                $('#firstname').val(data.data.firstname);
                $('#middlename').val(data.data.middlename);
                $('#birthday').val(data.data.birthday);
                $('#patient_address').val(data.data.address);
                $('#birthplace').val(data.data.birthplace);
                $('#age').val(data.data.age);
                $('#gender').val(data.data.gender);
                $('#civil_status').val(data.data.civil_status);
                $('#nationality').val(data.data.nationality);
                $('#religion').val(data.data.religion);
                $('#occupation').val(data.data.occupation);
                $('#name1').val(data.data.name1);
                $('#address1').val(data.data.address1);
                $('#contact1').val(data.data.contact1);
                $('#name2').val(data.data.name2);
                $('#address2').val(data.data.address2);
                $('#contact2').val(data.data.contact2);
                $('#name3').val(data.data.name3);
                $('#address3').val(data.data.address3);
                $('#contact3').val(data.data.contact3);
                $('#btn-admissions').attr('disabled',false)
            } else {
                $('#formAdmission')[0].reset();
            }
           
        }
    })
}

function filter_out_patient() {
    var search = $('#patient_code').val();
    $.ajax({
        type: 'POST',
        url : url + 'filter_out_patient',
        data : { search : search },
        dataType : 'json',
        success:function(data) {
            if(data.success == true) {
                $('#outpatients_id').val(data.data.outpatients_id);
                $('#surname').val(data.data.surname);
                $('#firstname').val(data.data.firstname);
                $('#middlename').val(data.data.middlename);
                $('#birthday').val(data.data.birthday);
                $('#age').val(data.data.age);
                $('#gender').val(data.data.gender);
                $('#patient_address').val(data.data.address);
                $("#btn-out-patients").attr('disabled',false);
            } else {
                $('#formOutPatients')[0].reset();
                $("#btn-out-patients").attr('disabled',true);
            }
           
        }
    })
}




function graph() {
    $.ajax({
        url: url+'chart',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "2",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}

function graph_discharged() {
    $.ajax({
        url: url+'chart_discharged',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "2",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container-discharged',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}


function graph_out() {
    $.ajax({
        url: url+'chart_out_patients',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container-out',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}

function graph_doctor() {
    $.ajax({
        url: url+'chart_by_doctor',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "2",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container-doctor',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}

function graph_doctor_discharged() {
    $.ajax({
        url: url+'chart_by_doctor_discharged',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "2",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container-doctor-discharged',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}


function graph_out_doctor() {
    $.ajax({
        url: url+'chart_out_patients_by_doctor',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "",
                "xAxisName": "Days",
                "yAxisName": "Number of patients",
                "rotatevalues": "",
                "theme": "fint"
            };

            apiChart = new FusionCharts({
                type: 'column3d',
                renderAt: 'chart-container-out-doctor',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}

function update_profile() {
    var data = $('#formUpdateProfile').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'update_profile',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-upload-profile').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-upload-profile').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function update_password() {
    var data = $('#formUpdateProfile').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'update_password',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-upload-profile').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-upload-profile').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function profile_picture() {
    var data = new FormData($('#formProfile')[0]);
    $.ajax({  
        type: 'POST',
        url: url + 'update_picture',
        data: data,  
        contentType: false, 
        processData:false, 
        cache:false,
        dataType: 'json',
        mimeType: "multipart/form-data",
        success: function(data) {  
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
        }  
    });  
}

function doctor_modal() {
    var modal = $('#doctor-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formDoctor')[0].reset();
    
    modal.find($('#btn-doctor')).html('Add Doctor <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function admission_modal() {
    var modal = $('#admission-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formAdmission')[0].reset();
    modal.find($('#btn-admissions')).html('Add In Patient <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
    $('#btn-admissions').removeClass('hidden');
}

function out_patient_modal() {
    var modal = $('#out-patient-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formOutPatients')[0].reset();
    modal.find($('#btn-out-patients')).html('Add Out Patient <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}



function room_modal() {
    var modal = $('#rooms-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formRoom')[0].reset();
    modal.find($('#btn-rooms')).html('Add Room <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function staff_modal() {
    var modal = $('#staff-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formStaff')[0].reset();
    modal.find($('#btn-staff')).html('Add Staff <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function InsertOrUpdateRooms() {
    var data = $('#formRooms').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateRooms',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-rooms').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Room';
            $('#btn-rooms').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            $('#rooms-modal').modal('hide');
        }
    })
}

function InsertOrUpdateAdmission() {
    var data = $('#formAdmission').serialize();
    if( $('#principal_operation').val() == '') {
        $('#btn-admissions').html('Add In Patients <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        notify('error','Please fill up all fields');
    } else {
        $.ajax({
            type : 'POST',
            url : url + 'InsertOrUpdateAdmissions',
            data : data,
            dataType : 'json',
            beforeSend:function() {
                $('#btn-admissions').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
            },
            success:function(data) {
                data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
                var content = data.type == 'info' ? 'Save Changes' : 'Add In Patients';
                $('#btn-admissions').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            }
        })
    }
    
}

function InsertOrUpdateOutPatients() {
    var data = $('#formOutPatients').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateOutPatients',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-out-patients').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Out Patients';
            $('#btn-out-patients').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}



function InsertOrUpdateDoctor() {
    var data = $('#formDoctor').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateDoctor',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-doctor').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Doctor';
            $('#btn-doctor').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function InsertOrUpdateStaff() {
    var data = $('#formStaff').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateStaff',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-staff').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Staff';
            $('#btn-staff').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function view_doctor(accounts_id) {
    var modal = $('#doctor-modal');
    $.ajax({
        type : 'POST',
        url : url + 'get_information_by_id',
        data : {
            accounts_id : accounts_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#doctor_accounts_id')).val(data.accounts_id);
            modal.find($('#doctor_name')).val(data.name);
            modal.find($('#doctor_contact')).val(data.contact);
            modal.find($('#doctor_email')).val(data.email);
            modal.find($('#doctor_gender')).val(data.gender);
            modal.find($('#doctor_username')).val(data.username);
            modal.find($('#doctor_address')).val(data.address);
            modal.find($('#status')).val(data.status);
            $('#btn-doctor').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function view_out_patients_by_surname(outpatients_id) {
    var modal = $('#out-patient-modal');
    $.ajax({
        type : 'POST',
        url : url + '../get_out_patient_by_id',
        data : {
            outpatients_id : outpatients_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#outpatients_id')).val(data.outpatients_id);
            modal.find($('#ssurname')).val(data.surname);
            modal.find($('#sfirstname')).val(data.firstname);
            modal.find($('#smiddlename')).val(data.middlename);
            modal.find($('#birthday')).val(data.birthday);
            modal.find($('#sage')).val(data.age);
            modal.find($('#sgender')).val(data.gender);
            modal.find($('#spatient_address')).val(data.address);
            modal.find($('#opd_case_number')).val(data.opd_case_number);
            modal.find($('#chief_complaints')).val(data.chief_complaints);
            modal.find($('#physicians_id')).val(data.physicians_id);
            modal.find($('#hp')).val(data.hp);
            modal.find($('#pulse_rate')).val(data.pulse_rate);
            modal.find($('#respiratory_rate')).val(data.respiratory_rate);
            modal.find($('#temperature')).val(data.temperature);
            modal.find($('#weight')).val(data.weight);
            modal.find($('#date')).val(data.date);
            modal.find($('#time')).val(data.time);
            modal.find($('#impression')).val(data.impression);
            modal.find($('#treatment')).val(data.treatment);
            $('#btn-out-patients').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function view_out_patients(outpatients_id) {
    var modal = $('#out-patient-modal');
    $.ajax({
        type : 'POST',
        url : url + 'get_out_patient_by_id',
        data : {
            outpatients_id : outpatients_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#outpatients_id')).val(data.outpatients_id);
            modal.find($('#surname')).val(data.surname);
            modal.find($('#firstname')).val(data.firstname);
            modal.find($('#middlename')).val(data.middlename);
            modal.find($('#birthday')).val(data.birthday);
            modal.find($('#age')).val(data.age);
            modal.find($('#gender')).val(data.gender);
            modal.find($('#patient_address')).val(data.address);
            modal.find($('#opd_case_number')).val(data.opd_case_number);
            modal.find($('#chief_complaints')).val(data.chief_complaints);
            modal.find($('#physicians_id')).val(data.physicians_id);
            modal.find($('#hp')).val(data.hp);
            modal.find($('#pulse_rate')).val(data.pulse_rate);
            modal.find($('#respiratory_rate')).val(data.respiratory_rate);
            modal.find($('#temperature')).val(data.temperature);
            modal.find($('#weight')).val(data.weight);
            modal.find($('#date')).val(data.date);
            modal.find($('#time')).val(data.time);
            modal.find($('#type')).val(data.type);
            modal.find($('#impression')).val(data.impression);
            modal.find($('#treatment')).val(data.treatment);
            $('#btn-out-patients').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function print_selected() {
    var admissions_id = $('#admissions_id').val();
    location.href= '../print/'+admissions_id;
}

function view_admissions(admissions_id) {
    var modal = $('#admission-modal');
    $.ajax({
        type : 'POST',
        url : url + 'get_admissions_by_id',
        data : {
            admissions_id : admissions_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#admissions_id')).val(data.admissions_id);
            modal.find($('#patient_code')).val(data.patient_code);
            modal.find($('#surname')).val(data.surname);
            modal.find($('#firstname')).val(data.firstname);
            modal.find($('#middlename')).val(data.middlename);
            modal.find($('#birthday')).val(data.birthday);
            modal.find($('#patient_address')).val(data.address);
            modal.find($('#birthplace')).val(data.birthplace);
            modal.find($('#age')).val(data.age);
            modal.find($('#gender')).val(data.gender);
            modal.find($('#civil_status')).val(data.civil_status);
            modal.find($('#nationality')).val(data.nationality);
            modal.find($('#religion')).val(data.religion);
            modal.find($('#occupation')).val(data.occupation);
            modal.find($('#name1')).val(data.name1);
            modal.find($('#address1')).val(data.address1);
            modal.find($('#contact1')).val(data.contact1);
            modal.find($('#name2')).val(data.name2);
            modal.find($('#address2')).val(data.address2);
            modal.find($('#contact2')).val(data.contact2);
            modal.find($('#name3')).val(data.name3);
            modal.find($('#address3')).val(data.address3);
            modal.find($('#contact3')).val(data.contact3);

            modal.find($('#hospital_code')).val(data.hospital_code);
            modal.find($('#medical_record_number')).val(data.medical_record_number);
            modal.find($('#room')).val(data.room);
            modal.find($('#admission_date')).val(data.admission_date);
            modal.find($('#admission_time')).val(data.admission_time);
            modal.find($('#discharged_date')).val(data.discharged_date);
            modal.find($('#discharged_time')).val(data.discharged_time);
            modal.find($('#days')).val(data.days);
            modal.find($('#admitting_personnel')).val(data.admitting_personnel);
            modal.find($('#attending_physicians')).val(data.attending_physicians);
            modal.find($('#referred_by')).val(data.referred_by);
            modal.find($('#alert')).val(data.alert);
            modal.find($('#allergic')).val(data.allergic);
            modal.find($('#admission_type')).val(data.admission_type);
            modal.find($('#health_insurance')).val(data.health_insurance);
            modal.find($('#philhealth')).val(data.philhealth);
            modal.find($('#data_furnished')).val(data.data_furnished);
            modal.find($('#informant')).val(data.informant);
            modal.find($('#patient_relation')).val(data.patient_relation);
            modal.find($('#admission_diagnosis')).val(data.admission_diagnosis);
            modal.find($('#final_diagnosis')).val(data.final_diagnosis);
            modal.find($('#icd')).val(data.icd);
            modal.find($('#principal_operation')).val(data.principal_operation);
            modal.find($('#disposition')).val(data.disposition);
            modal.find($('#outcome')).val(data.outcome);
            if(data.status == 1) {
                $('#btn-admissions').addClass('hidden');
            } else {
                $('#btn-admissions').removeClass('hidden');
            }
            modal.find($('#btn-admissions')).html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function view_patients(admissions_id) {
    var modal = $('#admission-modal');
    $.ajax({
        type : 'POST',
        url : url + '../get_admissions_by_id',
        data : {
            admissions_id : admissions_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#admissions_id')).val(data.admissions_id);
            modal.find($('#surname')).val(data.surname);
            modal.find($('#firstname')).val(data.firstname);
            modal.find($('#middlename')).val(data.middlename);
            modal.find($('#birthday')).val(data.birthday);
            modal.find($('#patient_address')).val(data.address);
            modal.find($('#birthplace')).val(data.birthplace);
            modal.find($('#age')).val(data.age);
            modal.find($('#gender')).val(data.gender);
            modal.find($('#civil_status')).val(data.civil_status);
            modal.find($('#nationality')).val(data.nationality);
            modal.find($('#religion')).val(data.religion);
            modal.find($('#occupation')).val(data.occupation);
            modal.find($('#name1')).val(data.name1);
            modal.find($('#address1')).val(data.address1);
            modal.find($('#contact1')).val(data.contact1);
            modal.find($('#name2')).val(data.name2);
            modal.find($('#address2')).val(data.address2);
            modal.find($('#contact2')).val(data.contact2);
            modal.find($('#name3')).val(data.name3);
            modal.find($('#address3')).val(data.address3);
            modal.find($('#contact3')).val(data.contact3);

            modal.find($('#hospital_code')).val(data.hospital_code);
            modal.find($('#medical_record_number')).val(data.medical_record_number);
            modal.find($('#room')).val(data.room);
            modal.find($('#admission_date')).val(data.admission_date);
            modal.find($('#admission_time')).val(data.admission_time);
            modal.find($('#discharged_date')).val(data.discharged_date);
            modal.find($('#discharged_time')).val(data.discharged_time);
            modal.find($('#days')).val(data.days);
            modal.find($('#admitting_personnel')).val(data.admitting_personnel);
            modal.find($('#attending_physicians')).val(data.attending_physicians);
            modal.find($('#referred_by')).val(data.referred_by);
            modal.find($('#alert')).val(data.alert);
            modal.find($('#allergic')).val(data.allergic);
            modal.find($('#admission_type')).val(data.admission_type);
            modal.find($('#health_insurance')).val(data.health_insurance);
            modal.find($('#philhealth')).val(data.philhealth);
            modal.find($('#data_furnished')).val(data.data_furnished);
            modal.find($('#informant')).val(data.informant);
            modal.find($('#patient_relation')).val(data.patient_relation);
            modal.find($('#admission_diagnosis')).val(data.admission_diagnosis);
            modal.find($('#final_diagnosis')).val(data.final_diagnosis);
            modal.find($('#icd')).val(data.icd);
            modal.find($('#principal_operation')).val(data.principal_operation);
            modal.find($('#disposition')).val(data.disposition);
            modal.find($('#outcome')).val(data.outcome);
            if(data.status == 1) {
                $('#btn-admissions').addClass('hidden');
            } else {
                $('#btn-admissions').removeClass('hidden');
            }
            modal.find($('#btn-admissions')).html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function view_rooms(rooms_id) {
    var modal = $('#rooms-modal');
    $.ajax({
        type : 'POST',
        url : url + 'get_rooms_by_id',
        data : {
            rooms_id : rooms_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#rooms_id')).val(rooms_id);
            modal.find($('#room_type')).val(data.room_type);
            modal.find($('#floor')).val(data.floor);
            modal.find($('#room_number')).val(data.room_number);
            $('#btn-rooms').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function delete_rooms() {
    var data = $('#formRooms').serialize();
    var modal = $('#rooms-modal');
    $.ajax({
        type : 'POST',
        url : url + 'delete_rooms_by_id',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete-rooms').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            modal.modal('hide');
            notify(data.type,data.message);
        }
    })
}

function view_staff(accounts_id) {
    var modal = $('#staff-modal');
    $.ajax({
        type : 'POST',
        url : url + 'get_information_by_id',
        data : {
            accounts_id : accounts_id
        },
        dataType : 'json',
        success:function(data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#staff_accounts_id')).val(data.accounts_id);
            modal.find($('#staff_name')).val(data.name);
            modal.find($('#staff_contact')).val(data.contact);
            modal.find($('#staff_email')).val(data.email);
            modal.find($('#staff_gender')).val(data.gender);
            modal.find($('#staff_username')).val(data.username);
            modal.find($('#staff_address')).val(data.address);
            modal.find($('#status')).val(data.status);
            $('#btn-staff').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function notify(type,message) {
    Command: toastr[type](message)
}

function toastr_option() {
    toastr.options = {
        "newestOnTop": true, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": 300, "hideDuration": 1000, "timeOut": 5000, "extendedTimeOut": 1000, "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"
    }
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}