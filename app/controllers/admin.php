<?php 
class admin extends Controller {
    public function __construct() {
        if(!isset($_SESSION['id'])) {
            redirect('login');
        }
        $_SESSION['token'] = TOKEN;
        $this->input = $this->model('account');
    }

    public function chart() {
        $this->model('account')->chart();
    }

    public function chart_discharged() {
        $this->model('account')->chart_discharged();
    }

    public function chart_out_patients() {
        $this->model('account')->chart_out_patients();
    }

    public function index() {
        $data['token'] = $_SESSION['token'];
        $data['title'] = 'Dashboard';
        $data['total_admitted'] = $this->model('account')->total_patients(0);
        $data['total_discharged'] = $this->model('account')->total_patients(1);
        $data['total_out_patients'] = $this->model('account')->total_out_patients();
        $data['total_doctor'] = $this->model('account')->total_users(1);
        $data['total_staff'] = $this->model('account')->total_users(2);
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

    public function statistical(){
        $data['token']       = $_SESSION['token'];
        $data['user']        = $this->model('account')->get_user_information($_SESSION['id']);
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/statistical',$data);
        $this->view('components/footer',$data);
        $this->view('components/scripts',$data);

    }

    public function all_patients() {
        $data['token']        = $_SESSION['token'];
        $data['title']        = 'All Patients';
        $data['outpatients']  = $this->model('account')->get_all_out_patients();
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

    public function filter_patient() {
        $search = $this->input->post('search');
        $this->model('account')->filter_patient_code($search);
    }

    public function filter_out_patient() {
        $search = $this->input->post('search');
        $this->model('account')->filter_out_patient($search);
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

    public function view_patient($id) {
        $data['token']        = $_SESSION['token'];
        $data['title']        = 'All Patients';
        $data['row']          = $this->model('account')->get_patients($id);
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

    public function reports() {
        $from = $_POST['from'];
        $to = $_POST['to'];

        $inpatients = array( 'from' => $from, 'to' => $to );
        $total_inpatients = $this->model('account')->get_all_inpatients($inpatients);

        $all_pateints = array('from' => $from,'to'=>$to);
        $total_all_pateints = $this->model('account')->all_patients($all_pateints);

        $out_patients = array('from' => $from,'to'=>$to);
        $all_out_patients = $this->model('account')->all_out_patients($out_patients);
        
        
        $transferred = array( 'from' => $from, 'to' => $to, 'disposition' => 'Transferred' );
        $transferred_patients = $this->model('account')->filter_disposition($transferred);

        $admission_type_new = array( 'from' => $from, 'to' => $to, 'admission_type' => 'Old');
        $total_admission_type_new = $this->model('account')->filter_admission($admission_type_new);

        $admission_type_old = array( 'from' => $from, 'to' => $to, 'admission_type' => 'New');
        $total_admission_type_old = $this->model('account')->filter_admission($admission_type_old);

        $deaths = array( 'from' => $from, 'to' => $to, 'disposition' => 'Deaths' );
        $deaths_patients = $this->model('account')->filter_disposition($deaths);

        $discharged = array( 'from' => $from, 'to' => $to);
        $discharged_patients = $this->model('account')->get_all_discharged_patients($discharged);

        $admitted_discharged = array( 'from' => $from);
        $total_admitted_discharged = $this->model('account')->get_all_admitted_discharged_patients($admitted_discharged);

        $jan_in = $this->model('account')->jan_in();
        $feb_in = $this->model('account')->feb_in();
        $mar_in = $this->model('account')->mar_in();
        $apr_in = $this->model('account')->apr_in();
        $may_in = $this->model('account')->may_in();
        $jun_in = $this->model('account')->jun_in();
        $jul_in = $this->model('account')->jul_in();
        $aug_in = $this->model('account')->aug_in();
        $sep_in = $this->model('account')->sep_in();
        $oct_in = $this->model('account')->oct_in();
        $nov_in = $this->model('account')->nov_in();
        $dec_in = $this->model('account')->dec_in();

        $jan_out = $this->model('account')->jan_out();
        $feb_out = $this->model('account')->feb_out();
        $mar_out = $this->model('account')->mar_out();
        $apr_out = $this->model('account')->apr_out();
        $may_out = $this->model('account')->may_out();
        $jun_out = $this->model('account')->jun_out();
        $jul_out = $this->model('account')->jul_out();
        $aug_out = $this->model('account')->aug_out();
        $sep_out = $this->model('account')->sep_out();
        $oct_out = $this->model('account')->oct_out();
        $nov_out = $this->model('account')->nov_out();
        $dec_out = $this->model('account')->dec_out();

        $jan_total = $jan_in + $jan_out;
        $feb_total = $feb_in + $feb_out;
        $mar_total = $mar_in + $mar_out;
        $apr_total = $apr_in + $apr_out;
        $may_total = $may_in + $may_out;
        $jun_total = $jun_in + $jun_out;
        $jul_total = $jul_in + $jul_out;
        $aug_total = $aug_in + $aug_out;
        $sep_total = $sep_in + $sep_out;
        $oct_total = $oct_in + $oct_out;
        $nov_total = $nov_in + $nov_out;
        $dec_total = $dec_in + $dec_out;

        $grand_total = $jan_total + $feb_total + $mar_total + $apr_total + $may_total + $jun_total + $jul_total + $aug_total + $sep_total + $oct_total + $nov_total + $dec_total;
        

        $from1 = date('F d, Y',strtotime($from));
        $to1  = date('F d, Y',strtotime($to));
        
        $pdf = new TCPDF('P','mm','Legal');
        $pdf->AddPage();

        // 0 = first line
        // 1 = end line
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(190,5,'Republic of the Philippines',0,1,'C');
        $pdf->SetFont('helvetica','B',13);
        $pdf->cell(190,5,'OSPITAL NG TAGAYTAY',0,1,'C');
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(190,5,'Bacolod St., Kaybagal South, Tagaytay City',0,1,'C');
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(190,5,'Telephone No. (045)-4832-160',0,1,'C');
        $pdf->cell(190,5,'',0,1,'C');
        $pdf->cell(190,5,'',0,1,'C');
        $pdf->SetFont('helvetica','B',15);
        $pdf->cell(190,5,'PATIENT STATISTICAL REPORT',0,1,'C');
        $pdf->cell(190,5,'',0,1,'C');
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(190,5,'Date : From '.$from1.' To '.$to1.'',0,1,'C');
        $pdf->cell(190,5,'',0,1,'C');

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,8,' A. Summary of Patients in the hospital',0,1);

        $pdf->cell(175,7,'Inpatient Care',1,0);
        $pdf->cell(20,7,'Number',1,1);

        $pdf->cell(175,7,'Total number of inpatients',1,0);
        $pdf->cell(20,7,$total_inpatients,1,1,'C');

        $pdf->cell(175,7,'Total number of discharged',1,0);
        $pdf->cell(20,7,$discharged_patients,1,1,'C');

        $pdf->cell(175,7,'Total number of admitted and discharged on the same day',1,0);
        $pdf->cell(20,7,$total_admitted_discharged,1,1,'C');

        $pdf->cell(175,7,'Total number of transferred patients',1,0);
        $pdf->cell(20,7,$transferred_patients,1,1,'C');

        $pdf->cell(175,7,'Total number of out patient visit (new patient)',1,0);
        $pdf->cell(20,7,$total_admission_type_new,1,1,'C');

        $pdf->cell(175,7,'Total number of out patient visit (revisit)',1,0);
        $pdf->cell(20,7,$total_admission_type_old,1,1,'C');

        $pdf->cell(175,7,'Total number of all outpatients',1,0);
        $pdf->cell(20,7,$all_out_patients,1,1,'C');

        $pdf->cell(175,7,'Total number of deaths',1,0);
        $pdf->cell(20,7,$deaths_patients,1,1,'C');

        $pdf->cell(175,7,'Total number of all patients',1,0);
        $pdf->cell(20,7,$total_all_pateints,1,1,'C');

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,10,'B. Graph',0,1);

        $pdf->SetFont('helvetica','',8);
        
        $graph = new SVGGraph(500, 400);
        $graph->Values(1, 4, 8, 9, 16, 25, 27); 

        
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,12,'C. Table',0,1);
        $pdf->SetFont('helvetica','',8);

        $pdf->cell(48.7,7,'Month',1,0);
        $pdf->cell(48.7,7,'Inpatients',1,0);
        $pdf->cell(48.7,7,'Outpatients',1,0);
        $pdf->cell(48.7,7,'Total',1,1);

        $pdf->cell(48.7,7,'January',1,0);
        $pdf->cell(48.7,7,$jan_in,1,0);
        $pdf->cell(48.7,7,$jan_out,1,0);
        $pdf->cell(48.7,7,$jan_total,1,1);

        $pdf->cell(48.7,7,'February',1,0);
        $pdf->cell(48.7,7,$feb_in,1,0);
        $pdf->cell(48.7,7,$feb_out,1,0);
        $pdf->cell(48.7,7,$feb_total,1,1);

        $pdf->cell(48.7,7,'March',1,0);
        $pdf->cell(48.7,7,$mar_in,1,0);
        $pdf->cell(48.7,7,$mar_out,1,0);
        $pdf->cell(48.7,7,$mar_total,1,1);

        $pdf->cell(48.7,7,'April',1,0);
        $pdf->cell(48.7,7,$apr_in,1,0);
        $pdf->cell(48.7,7,$apr_out,1,0);
        $pdf->cell(48.7,7,$apr_total,1,1);

        $pdf->cell(48.7,7,'May',1,0);
        $pdf->cell(48.7,7,$may_in,1,0);
        $pdf->cell(48.7,7,$may_out,1,0);
        $pdf->cell(48.7,7,$may_total,1,1);

        $pdf->cell(48.7,7,'June',1,0);
        $pdf->cell(48.7,7,$jun_in,1,0);
        $pdf->cell(48.7,7,$jun_out,1,0);
        $pdf->cell(48.7,7,$jun_total,1,1);

        $pdf->cell(48.7,7,'July',1,0);
        $pdf->cell(48.7,7,$jul_in,1,0);
        $pdf->cell(48.7,7,$jul_out,1,0);
        $pdf->cell(48.7,7,$jul_total,1,1);

        $pdf->cell(48.7,7,'Augost',1,0);
        $pdf->cell(48.7,7,$aug_in,1,0);
        $pdf->cell(48.7,7,$aug_out,1,0);
        $pdf->cell(48.7,7,$aug_total,1,1);

        $pdf->cell(48.7,7,'September',1,0);
        $pdf->cell(48.7,7,$sep_in,1,0);
        $pdf->cell(48.7,7,$sep_out,1,0);
        $pdf->cell(48.7,7,$sep_total,1,1);

        $pdf->cell(48.7,7,'October',1,0);
        $pdf->cell(48.7,7,$oct_in,1,0);
        $pdf->cell(48.7,7,$oct_out,1,0);
        $pdf->cell(48.7,7,$oct_total,1,1);

        $pdf->cell(48.7,7,'November',1,0);
        $pdf->cell(48.7,7,$nov_in,1,0);
        $pdf->cell(48.7,7,$nov_out,1,0);
        $pdf->cell(48.7,7,$nov_total,1,1);

        $pdf->cell(48.7,7,'December',1,0);
        $pdf->cell(48.7,7,$dec_in,1,0);
        $pdf->cell(48.7,7,$dec_out,1,0);
        $pdf->cell(48.7,7,$dec_total,1,1);

        $pdf->cell(146.1,7,'',1,0);
        $pdf->cell(48.7,7,$grand_total,1,1);
        $graph->Render('Bar3DGraph', true,true);

        $pdf->Output();     
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

    public function test() {
        $this->view('pages/admin/test');
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
                'status'      => $this->input->post('status'),
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
                'patient_code'     => $this->input->post('patient_code'),
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
                'date'             => $this->input->post('date'),
                'time'             => $this->input->post('time'),
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
                'patient_code'  => $this->input->post('patient_code'),
                'surname'       => $this->input->post('surname'),
                'firstname'     => $this->input->post('firstname'),
                'middlename'    => $this->input->post('middlename'),
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
                'admission_date' => $this->input->post('admission_date'),
                'admission_time' => $this->input->post('admission_time'),
                'discharged_date' => $this->input->post('discharged_date'),
                'discharged_time' => $this->input->post('discharged_time'),
                'days' => $this->input->post('days'),
                'admitting_personnel' => $this->input->post('admitting_personnel'),
                'attending_physicians' => $_POST['attending_physicians'],
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
                'status'      => $this->input->post('status'),
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