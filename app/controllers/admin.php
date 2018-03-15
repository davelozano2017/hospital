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
        $impatients = $this->model('account')->get_all_admissions(0)->num_rows;
        $alive = $this->model('account')->get_all_admissions(1)->num_rows;
        $out_patient = $this->model('account')->get_all_out_patients()->num_rows;
        
        $pdf = new TCPDF('P','mm','Legal');
        $pdf->AddPage();

        // 0 = first line
        // 1 = end line
        $pdf->SetFont('helvetica','',10);
        $pdf->cell(190,5,'Online Health Facilities Statistical Reporting System',0,1,'C');

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,5,'2. Implementing Beds: 23 beds',0,1);

        $pdf->Text(17,23,'* Implementing beds: Actual beds used ( based on hospital management decision) ',0,1);

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,5,'                    2. Implementing Beds: 23 beds',0,1);

        $pdf->cell(80,8,'3. Bed Occupancy Rate (BOR) Based on Authorized beds: 41/61% beds',0,1);
    
        $pdf->cell(80,0,'    _________________________________________________________ x 100',0,1);
        $pdf->SetFont('helvetica','',8);
        $pdf->cell(80,10,'    [Total Number of Authorized beds] x [Total days in the period (365 or 366 for leap year)]',0,1);
       
        $pdf->SetFont('helvetica','',8);
        $pdf->cell(80,0,'       * Bed Occupancy Rate: The percentage of impatient beds occupied over a given period of time. It is a measure of the ideniaty of hospital resources utilized',0,1);
        $pdf->cell(80,0,'         (given period of time in January 1 to December 31 each year for the annual statistics)',0,1);

        $pdf->cell(80,10,'       * Impatient services days (Impatient bed days) Unit of measure demoting the services received by one in-patient in one 24 hour period.',0,1);

        $pdf->cell(80,0,'       * Total Impatient Services  days or Impatient Bed days = [(Impatients remaining at midnight + Total admissions) + Total discharges/deaths)] + (member .',0,1);

        $pdf->cell(80,8,'         of adona discharges on the same day)]',0,1);
        
        $pdf->SetFont('helvetica','B',12);
        $pdf->cell(80,8,'II. HOSPITAL OPERATIONS',0,1);

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,8,' A. Summary of Patients in the hospital',0,1);
        $pdf->cell(80,5,'     For each category listed below, please report the total volume of services or procedures performed',0,1);
        $pdf->SetFont('helvetica','',10);
        $pdf->cell(80,10,'           ** Inpatient: A patient who stays in a health facility licensed to admit patients. While under treatment. ',0,1);
        $pdf->cell(175,7,'Impatient Care',1,0);
        $pdf->cell(20,7,'Number',1,1);

        $pdf->cell(175,7,'Total number of impatients',1,0);
        $pdf->cell(20,7,$impatients,1,1,'R');

        $pdf->cell(175,7,'Total number of (In facility deliveries)',1,0);
        $pdf->cell(20,7,'0',1,1,'R');

        $pdf->cell(175,7,'Total Discharges (Alive)',1,0);
        $pdf->cell(20,7,$alive,1,1,'R');

        $pdf->cell(175,7,'Total patients admitted and discharged on the same day',1,0);
        $pdf->cell(20,7,$out_patient,1,1,'R');

        $pdf->cell(175,7,'Total member of inpatient bed days (service days)',1,0);
        $pdf->cell(20,7,'0',1,1,'R');

        $pdf->cell(175,7,'Total number of inpatients transferred TO THIS FACILITIES from another facility for impatient care',1,0);
        $pdf->cell(20,7,'0',1,1,'R');

        $pdf->cell(175,7,'Total number of inpatients transferred FROM THIS FACILITIES from another facility for impatient care',1,0);
        $pdf->cell(20,7,'0',1,1,'R');

        $pdf->cell(175,7,'Total number of patients remaining in the hospital as of midnight last day of previous year',1,0);
        $pdf->cell(20,7,'0',1,1,'R');

        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(80,10,'B. Discharges',0,1);
        $pdf->SetFont('helvetica','',8);
        $tbl = <<<EOD
<table width="100%" cellspacing="0" cellpadding="1" border="1">
<tr>
<td colspan="3" rowspan="3">Type of service</td>
<td colspan="3" rowspan="3">No of patient</td>
<td colspan="3" rowspan="3">total length of days / total no of days stay</td>
<td colspan="13">Type of accomodation</td>
<td colspan="12">Condition on Discharged</td>
</tr>
<tr>
<td colspan="5">Non-Philhealth</td>
<td colspan="5">Philhealt</td>
<td rowspan="2">HMO</td>
<td colspan="2" rowspan="2">OWWA</td>
<td colspan="2" rowspan="2">R/I</td>
<td rowspan="2">T</td>
<td rowspan="2">H</td>
<td rowspan="2">A</td>
<td rowspan="2">U</td>
<td colspan="4">Deaths</td>
<td colspan="2" rowspan="2">Total Discharges</td>
</tr>
<tr>
<td>Pay</td>
<td colspan="3">Service/Charity</td>
<td>Total</td>
<td>Pay</td>
<td colspan="3">Service/Charity</td>
<td>Total</td>
<td>< 48 Hrs</td>
<td>> 48 Hrs</td>
<td colspan="2">Total</td>
</tr>
<tr>
<td colspan="3">Medicine</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Obstetrics</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Gynecology</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Pediatrics</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="34">Surgery</td>
</tr>

<tr>
<td colspan="3">Pedia</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Adult</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>


<tr>
<td colspan="34">Others</td>
</tr>


<tr>
<td colspan="3">Total</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Total new born</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>



<tr>
<td colspan="3">Pathologic</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>

<tr>
<td colspan="3">Non-Pathologic</td>
<td colspan="3">0</td>
<td colspan="3">0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="3">0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
<td colspan="2">0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td colspan="2">0</td>
</tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
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