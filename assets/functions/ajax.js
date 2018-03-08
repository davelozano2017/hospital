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
    modal.modal();
    modal.find($('#doctor_accounts_id')).val('');
    modal.find($('#doctor_name')).val('');
    modal.find($('#doctor_contact')).val('');
    modal.find($('#doctor_email')).val('');
    modal.find($('#doctor_gender')).val('');
    modal.find($('#doctor_username')).val('');
    modal.find($('#doctor_address')).val('');
    modal.find($('#btn-doctor')).html('Add Doctor <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function staff_modal() {
    var modal = $('#staff-modal');
    modal.modal();
    modal.find($('#staff_accounts_id')).val('');
    modal.find($('#staff_name')).val('');
    modal.find($('#staff_contact')).val('');
    modal.find($('#staff_email')).val('');
    modal.find($('#staff_gender')).val('');
    modal.find($('#staff_username')).val('');
    modal.find($('#staff_address')).val('');
    modal.find($('#btn-staff')).html('Add Staff <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
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
            modal.modal();
            modal.find($('#doctor_accounts_id')).val(data.accounts_id);
            modal.find($('#doctor_name')).val(data.name);
            modal.find($('#doctor_contact')).val(data.contact);
            modal.find($('#doctor_email')).val(data.email);
            modal.find($('#doctor_gender')).val(data.gender);
            modal.find($('#doctor_username')).val(data.username);
            modal.find($('#doctor_address')).val(data.address);
            $('#btn-doctor').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
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
            modal.modal();
            modal.find($('#staff_accounts_id')).val(data.accounts_id);
            modal.find($('#staff_name')).val(data.name);
            modal.find($('#staff_contact')).val(data.contact);
            modal.find($('#staff_email')).val(data.email);
            modal.find($('#staff_gender')).val(data.gender);
            modal.find($('#staff_username')).val(data.username);
            modal.find($('#staff_address')).val(data.address);
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