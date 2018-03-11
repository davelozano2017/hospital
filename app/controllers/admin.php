<?php 
class admin extends Controller {
    public function __construct() {
        if(!isset($_SESSION['id'])) {
            redirect('login');
        }
        $_SESSION['token'] = TOKEN;
        $this->input = $this->model('account');
    }

    public function index() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Dashboard';
        $data['user'] = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/dashboard',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function profile() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Profile';
        $data['user'] = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/profile',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function password() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Profile';
        $data['user'] = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/change-password',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function staff() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Staff';
        $data['staffs'] = $this->model('account')->get_all_users(2);
        $data['user'] = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/staff',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function doctor() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Doctor';
        $data['doctors'] = $this->model('account')->get_all_users(1);
        $data['user'] = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/doctor',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function all_patients() {
        $data['token']        = $_SESSION['token'];
        $data['title']        = 'All Patients';
        $data['all_patients'] = $this->model('account')->get_all_patients();
        $data['rooms']        = $this->model('account')->get_all_rooms();
        $data['physicians']   = $this->model('account')->get_all_physicians();
        $data['user']         = $this->model('account')->get_user_information($_SESSION['id']);
        $data['nationality']  = $this->model('account')->countries();
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/all-patients',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function view_patients($id) {
        $data['token']        = $_SESSION['token'];
        $data['title']        = 'All Patients';
        $data['row']          = $this->model('account')->get_patient($id);
        $data['admissions']   = $this->model('account')->view_patients_by_lastname($data['row']->surname,$data['row']->firstname,0);
        $data['discharged']   = $this->model('account')->view_patients_by_lastname($data['row']->surname,$data['row']->firstname,1);
        $data['outpatients']  = $this->model('account')->get_out_patients_by_lastname($data['row']->surname,$data['row']->firstname);
        $data['rooms']        = $this->model('account')->get_all_rooms();
        $data['physicians']   = $this->model('account')->get_all_physicians();
        $data['user']         = $this->model('account')->get_user_information($_SESSION['id']);
        $data['nationality']  = $this->model('account')->countries();
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/view-patients',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function admissions_in_patients() {
        $data['token']       = $_SESSION['token'];
        $data['title']       = 'In Patients';
        $data['admissions']  = $this->model('account')->get_all_admissions(0);
        $data['discharged']  = $this->model('account')->get_all_admissions(1);
        $data['rooms']       = $this->model('account')->get_all_rooms();
        $data['physicians']  = $this->model('account')->get_all_physicians();
        $data['user']        = $this->model('account')->get_user_information($_SESSION['id']);
        $data['nationality'] = $this->model('account')->countries();
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/admission-in-patients',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function appointment_in_patients() {
        $data['token']       = $_SESSION['token'];
        $data['title']       = 'Appointment In Patients';
        $data['admissions']  = $this->model('account')->get_all_admissions(0);
        $data['discharged']  = $this->model('account')->get_all_admissions(1);
        $data['outpatients'] = $this->model('account')->get_all_out_patients();
        $data['rooms']       = $this->model('account')->get_all_rooms();
        $data['physicians']  = $this->model('account')->get_all_physicians();
        $data['user']        = $this->model('account')->get_user_information($_SESSION['id']);
        $data['nationality'] = $this->model('account')->countries();
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/doctor-appointment-in-patients',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }
    
    public function appointment_out_patients() {
        $data['token']       = $_SESSION['token'];
        $data['title']       = 'Appointment Out Patients';
        $data['physicians']  = $this->model('account')->get_all_physicians();
        $data['outpatients'] = $this->model('account')->get_all_out_patients();
        $data['user']        = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/doctor-appointment-out-patients',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function logs() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Logs';
        $data['logs']  = $this->model('account')->get_all_logs();
        $data['user']  = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/logs',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function rooms() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Room';
        $data['rooms'] = $this->model('account')->get_all_rooms();
        $data['user']  = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/room',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);
    }

    public function update_profile() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'accounts_id' => $_SESSION['id'],
                'name'        => $this->input->post('name'),
                'contact'     => $this->input->post('contact'),
                'email'       => $this->input->post('email'),
                'gender'      => $this->input->post('gender'),
                'address'     => $this->input->post('address'),
                'username'    => $this->input->post('username')
            );
            $this->model('account')->update_profile($data);
        }
    }

    public function InsertOrUpdateDoctor() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'accounts_id' => $this->input->post('doctor_accounts_id'),
                'name'        => $this->input->post('doctor_name'),
                'contact'     => $this->input->post('doctor_contact'),
                'email'       => $this->input->post('doctor_email'),
                'gender'      => $this->input->post('doctor_gender'),
                'address'     => $this->input->post('doctor_address'),
                'role'        => 1,
                'username'    => $this->input->post('doctor_username'),
                'password'    => hashing('12345123')
            );
            $this->model('account')->accounts($data);
        }
    }

    public function InsertOrUpdateOutPatients() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'outpatients_id'   => $this->input->post('outpatients_id'),
                'surname'          => $this->input->post('surname'),
                'firstname'        => $this->input->post('firstname'),
                'middlename'       => $this->input->post('middlename'),
                'birthday'         => $this->input->post('birthday'),
                'age'              => $this->input->post('age'),
                'gender'           => $this->input->post('gender'),
                'address'          => $this->input->post('patient_address'),
                'opd_case_number'  => $this->input->post('opd_case_number'),
                'chief_complaints' => $this->input->post('chief_complaints'),
                'physicians_id'    => $this->input->post('physicians_id'),
                'hp'               => $this->input->post('hp'),
                'pulse_rate'       => $this->input->post('pulse_rate'),
                'respiratory_rate' => $this->input->post('respiratory_rate'),
                'temperature'      => $this->input->post('temperature'),
                'weight'           => $this->input->post('weight'),
                'impression'       => $this->input->post('impression'),
                'treatment'        => $this->input->post('treatment')
            );
            $this->model('account')->medical_record_out_patients($data);
        }
    }

    

    public function InsertOrUpdateAdmissions() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'admissions_id' => $this->input->post('admissions_id'),
                'surname' => $this->input->post('surname'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'birthday' => $this->input->post('birthday'),
                'patient_address' => $this->input->post('patient_address'),
                'birthplace' => $this->input->post('birthplace'),
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'civil_status' => $this->input->post('civil_status'),
                'nationality' => $this->input->post('nationality'),
                'religion' => $this->input->post('religion'),
                'occupation' => $this->input->post('occupation'),
                'name1' => $this->input->post('name1'),
                'address1' => $this->input->post('address1'),
                'contact1' => $this->input->post('contact1'),
                'name2' => $this->input->post('name2'),
                'address2' => $this->input->post('address2'),
                'contact2' => $this->input->post('contact2'),
                'name3' => $this->input->post('name3'),
                'address3' => $this->input->post('address3'),
                'contact3' => $this->input->post('contact3'),
                'hospital_code' => $this->input->post('hospital_code'),
                'medical_record_number' => $this->input->post('medical_record_number'),
                'room' => $this->input->post('room'),
                'admission_date_time' => $this->input->post('admission_date_time'),
                'discharged_date_time' => $this->input->post('discharged_date_time'),
                'days' => $this->input->post('days'),
                'admitting_personnel' => $this->input->post('admitting_personnel'),
                'attending_physicians' => $this->input->post('attending_physicians'),
                'referred_by' => $this->input->post('referred_by'),
                'alert' => $this->input->post('alert'),
                'allergic' => $this->input->post('allergic'),
                'admission_type' => $this->input->post('admission_type'),
                'health_insurance' => $this->input->post('health_insurance'),
                'philhealth' => $this->input->post('philhealth'),
                'data_furnished' => $this->input->post('data_furnished'),
                'informant' => $this->input->post('informant'),
                'patient_relation' => $this->input->post('patient_relation'),
                'admission_diagnosis' => $this->input->post('admission_diagnosis'),
                'final_diagnosis' => $this->input->post('final_diagnosis'),
                'icd' => $this->input->post('icd'),
                'principal_operation' => $this->input->post('principal_operation'),
                'disposition' => $this->input->post('disposition'),
                'outcome' => $this->input->post('outcome')
            );
            $this->model('account')->admissions_in_patients($data);
        }
    }

    public function InsertOrUpdateStaff() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'accounts_id' => $this->input->post('staff_accounts_id'),
                'name'        => $this->input->post('staff_name'),
                'contact'     => $this->input->post('staff_contact'),
                'email'       => $this->input->post('staff_email'),
                'gender'      => $this->input->post('staff_gender'),
                'address'     => $this->input->post('staff_address'),
                'role'        => 2,
                'username'    => $this->input->post('staff_username'),
                'password'    => hashing('12345123')
            );
            $this->model('account')->accounts($data);
        }
    }

    public function get_information_by_id() {
        $accounts_id = $this->input->post('accounts_id');
        $this->model('account')->get_information_by_id($accounts_id);
    }

    public function get_out_patient_by_id() {
        $outpatients_id = $this->input->post('outpatients_id');
        $this->model('account')->get_out_patient_by_id($outpatients_id);
    }

    public function get_admissions_by_id() {
        $admissions_id = $this->input->post('admissions_id');
        $this->model('account')->get_admissions_by_id($admissions_id);
    }

    public function get_rooms_by_id() {
        $rooms_id = $this->input->post('rooms_id');
        $this->model('account')->get_rooms_by_id($rooms_id);
    }

    public function InsertOrUpdateRooms() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'rooms_id'    => $this->input->post('rooms_id'),
                'room_type'   => $this->input->post('room_type'),
                'floor'       => $this->input->post('floor'),
                'room_number' => $this->input->post('room_number')
            );
            $this->model('account')->rooms($data);
        }
    }

    public function delete_rooms_by_id() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $rooms_id = $this->input->post('rooms_id');
            $this->model('account')->delete_rooms_by_id($rooms_id);
        }
    }

    
    
    public function update_password() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'accounts_id' => $_SESSION['id'],
                'password'     => hashing($this->input->post('password'))
            );
            $this->model('account')->update_password($data);
        }
    }

    public function update_picture() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $this->model('account')->update_picture();
        }
    }

    public function logout() {
        session_destroy();
        redirect('login');
    }
}