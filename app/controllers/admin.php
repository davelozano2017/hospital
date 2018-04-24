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
        $data['bar_in'] = $this->model('account')->bar_admission_in_patient();
        $data['bar_out'] = $this->model('account')->bar_admission_out_patient();
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

    public function diseases() {
        $data['token']    = $_SESSION['token'];
        $data['title']    = 'Diseases';
        $data['user']     = $this->model('account')->get_user_information($_SESSION['id']);
        $data['diseases'] = $this->model('account')->get_all_diseases();
        $this->view('components/header',$data);
        $this->view('components/top-bar',$data);
        $this->view('components/sidebar',$data);
        $this->view('pages/admin/diseases',$data);
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
        $data['title']       = 'Statistical';
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
        $data['outpatients']  = $this->model('account')->get_all_out_patients_by_name();
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
        $data['diseases']    = $this->model('account')->get_all_diseases();
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
        $get_all_admission = $this->model('account')->get_all_admission($inpatients);

        $out_patients = array('from' => $from,'to'=>$to);
        $all_out_patients = $this->model('account')->all_out_patients($out_patients);

        $admission_type_new = array( 'from' => $from, 'to' => $to, 'admission_type' => 'New');
        $total_admission_type_new = $this->model('account')->filter_admission($admission_type_new);

        $admission_type_old = array( 'from' => $from, 'to' => $to, 'admission_type' => 'Old');
        $total_admission_type_old = $this->model('account')->filter_admission($admission_type_old);

        $deaths = array( 'from' => $from, 'to' => $to, 'outcome' => 'Died' );
        $deaths_patients = $this->model('account')->filter_outcome($deaths);

        $discharged = array( 'from' => $from, 'to' => $to);
        $discharged_patients = $this->model('account')->get_all_discharged_patients($discharged);

        $admitted_discharged = array( 'from' => $from, 'to' => $to);
        $total_admitted_discharged = $this->model('account')->get_all_admitted_discharged_patients($admitted_discharged);

        $outpatient_new = array( 'from' => $from, 'to' => $to);
        $total_out_patient_new = $this->model('account')->all_out_patients_new($outpatient_new);
        $total_out_patient_old = $this->model('account')->all_out_patients_old($outpatient_new);

        $all_patients = array('from' => $from,'to'=>$to);
        $total_all_patient = $this->model('account')->all_patients($all_patients);
        
        $filter_diseases = $this->model('account')->view_diseases($all_patients);
        $filter_diseases_out = $this->model('account')->view_diseases_out($all_patients);
        
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

        $jan_in_non = $this->model('account')->jan_in_non();
        $feb_in_non = $this->model('account')->feb_in_non();
        $mar_in_non = $this->model('account')->mar_in_non();
        $apr_in_non = $this->model('account')->apr_in_non();
        $may_in_non = $this->model('account')->may_in_non();
        $jun_in_non = $this->model('account')->jun_in_non();
        $jul_in_non = $this->model('account')->jul_in_non();
        $aug_in_non = $this->model('account')->aug_in_non();
        $sep_in_non = $this->model('account')->sep_in_non();
        $oct_in_non = $this->model('account')->oct_in_non();
        $nov_in_non = $this->model('account')->nov_in_non();
        $dec_in_non = $this->model('account')->dec_in_non();

        $jan_di  = $this->model('account')->jan_di();
        $feb_di  = $this->model('account')->feb_di();
        $mar_di  = $this->model('account')->mar_di();
        $apr_di  = $this->model('account')->apr_di();
        $may_di  = $this->model('account')->may_di();
        $jun_di  = $this->model('account')->jun_di();
        $jul_di  = $this->model('account')->jul_di();
        $aug_di  = $this->model('account')->aug_di();
        $sep_di  = $this->model('account')->sep_di();
        $oct_di  = $this->model('account')->oct_di();
        $nov_di  = $this->model('account')->nov_di();
        $dec_di  = $this->model('account')->dec_di();

        $jan_di_non  = $this->model('account')->jan_di_non();
        $feb_di_non  = $this->model('account')->feb_di_non();
        $mar_di_non  = $this->model('account')->mar_di_non();
        $apr_di_non  = $this->model('account')->apr_di_non();
        $may_di_non  = $this->model('account')->may_di_non();
        $jun_di_non  = $this->model('account')->jun_di_non();
        $jul_di_non  = $this->model('account')->jul_di_non();
        $aug_di_non  = $this->model('account')->aug_di_non();
        $sep_di_non  = $this->model('account')->sep_di_non();
        $oct_di_non  = $this->model('account')->oct_di_non();
        $nov_di_non  = $this->model('account')->nov_di_non();
        $dec_di_non  = $this->model('account')->dec_di_non();
        
        $jan_out_new = $this->model('account')->jan_out_new();
        $feb_out_new = $this->model('account')->feb_out_new();
        $mar_out_new = $this->model('account')->mar_out_new();
        $apr_out_new = $this->model('account')->apr_out_new();
        $may_out_new = $this->model('account')->may_out_new();
        $jun_out_new = $this->model('account')->jun_out_new();
        $jul_out_new = $this->model('account')->jul_out_new();
        $aug_out_new = $this->model('account')->aug_out_new();
        $sep_out_new = $this->model('account')->sep_out_new();
        $oct_out_new = $this->model('account')->oct_out_new();
        $nov_out_new = $this->model('account')->nov_out_new();
        $dec_out_new = $this->model('account')->dec_out_new();

        $jan_out_revisit = $this->model('account')->jan_out_revisit();
        $feb_out_revisit = $this->model('account')->feb_out_revisit();
        $mar_out_revisit = $this->model('account')->mar_out_revisit();
        $apr_out_revisit = $this->model('account')->apr_out_revisit();
        $may_out_revisit = $this->model('account')->may_out_revisit();
        $jun_out_revisit = $this->model('account')->jun_out_revisit();
        $jul_out_revisit = $this->model('account')->jul_out_revisit();
        $aug_out_revisit = $this->model('account')->aug_out_revisit();
        $sep_out_revisit = $this->model('account')->sep_out_revisit();
        $oct_out_revisit = $this->model('account')->oct_out_revisit();
        $nov_out_revisit = $this->model('account')->nov_out_revisit();
        $dec_out_revisit = $this->model('account')->dec_out_revisit();

        $total_in = $jan_in + $feb_in + $mar_in + $apr_in + $may_in + $jun_in + $jul_in + $aug_in + $sep_in + $oct_in + $nov_in + $dec_in;

        $total_in_non = $jan_in_non + $feb_in_non + $mar_in_non + $apr_in_non + $may_in_non + $jun_in_non + $jul_in_non + $aug_in_non + $sep_in_non + $oct_in_non + $nov_in_non + $dec_in_non;
        
        $total_inn = $total_in + $total_in_non;
        
        $total_di = $jan_di + $feb_di + $mar_di + $apr_di + $may_di + $jun_di + $jul_di + $aug_di + $sep_di + $oct_di + $nov_di + $dec_di;

        $total_di_non = $jan_di_non + $feb_di_non + $mar_di_non + $apr_di_non + $may_di_non + $jun_di_non + $jul_di_non + $aug_di_non + $sep_di_non + $oct_di_non + $nov_di_non + $dec_di_non;

        $total_dii = $total_di + $total_di_non;

        $total_out_new = $jan_out_new + $feb_out_new + $mar_out_new + $apr_out_new + $may_out_new + $jun_out_new + $jul_out_new + $aug_out_new + $sep_out_new + $oct_out_new + $nov_out_new + $dec_out_new;

        $total_out_revisit = $jan_out_revisit + $feb_out_revisit + $mar_out_revisit + $apr_out_revisit + $may_out_revisit + $jun_out_revisit + $jul_out_revisit + $aug_out_revisit + $sep_out_revisit + $oct_out_revisit + $nov_out_revisit + $dec_out_revisit;

        $total_out = $total_out_new + $total_out_revisit;

        $total_jan = $jan_in + $jan_in_non;
        $total_feb = $feb_in + $feb_in_non;
        $total_mar = $mar_in + $mar_in_non;
        $total_apr = $apr_in + $apr_in_non;
        $total_may = $may_in + $may_in_non;
        $total_jun = $jun_in + $jun_in_non;
        $total_jul = $jul_in + $jul_in_non;
        $total_aug = $aug_in + $aug_in_non;
        $total_sep = $sep_in + $sep_in_non;
        $total_oct = $oct_in + $oct_in_non;
        $total_nov = $nov_in + $nov_in_non;
        $total_dec = $dec_in + $dec_in_non;

        $total_jan_di = $jan_di + $jan_di_non;
        $total_feb_di = $feb_di + $feb_di_non;
        $total_mar_di = $mar_di + $mar_di_non;
        $total_apr_di = $apr_di + $apr_di_non;
        $total_may_di = $may_di + $may_di_non;
        $total_jun_di = $jun_di + $jun_di_non;
        $total_jul_di = $jul_di + $jul_di_non;
        $total_aug_di = $aug_di + $aug_di_non;
        $total_sep_di = $sep_di + $sep_di_non;
        $total_oct_di = $oct_di + $oct_di_non;
        $total_nov_di = $nov_di + $nov_di_non;
        $total_dec_di = $dec_di + $dec_di_non;
        
        $total_jan_out = $jan_out_new + $jan_out_revisit;
        $total_feb_out = $feb_out_new + $feb_out_revisit;
        $total_mar_out = $mar_out_new + $mar_out_revisit;
        $total_apr_out = $apr_out_new + $apr_out_revisit;
        $total_may_out = $may_out_new + $may_out_revisit;
        $total_jun_out = $jun_out_new + $jun_out_revisit;
        $total_jul_out = $jul_out_new + $jul_out_revisit;
        $total_aug_out = $aug_out_new + $aug_out_revisit;
        $total_sep_out = $sep_out_new + $sep_out_revisit;
        $total_oct_out = $oct_out_new + $oct_out_revisit;
        $total_nov_out = $nov_out_new + $nov_out_revisit;
        $total_dec_out = $dec_out_new + $dec_out_revisit;
        
        $totalt = $total_inpatients;
        
        $total_all_patients = $all_out_patients + $totalt;

        $from1 = date('F d, Y',strtotime($from));
        $to1  = date('F d, Y',strtotime($to));
        
        $pdf = new TCPDF('P','mm','Legal');

        // 0 = first line
        // 1 = end line
        $pdf->AddPage();
        $pdf->SetFont('helvetica','B',10);
        $pdf->cell(190,5,'Republic of the Philippines',0,1,'C');
        $pdf->Image('http://localhost/hospital/assets/images/logo.png', 20, 12, 20, 20, '', '', '', true, 1000);
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
        $pdf->cell(80,8,'A: Summary of Patients',0,1);
        
        $tbl = <<<EOD
        <table style="border:1px solid #000">
        <tr>
          <th  style="border:1px solid #000" rowspan="2"><br><br>DATE</th>
          <th  style="border:1px solid #000" colspan="3">ADMITTED</th>
          <th  style="border:1px solid #000" rowspan="2"><br><br>DATE</th>
          <th  style="border:1px solid #000" colspan="3">DISCHARGES</th>
          <th  style="border:1px solid #000" rowspan="2"><br><br>DATE</th>
          <th  style="border:1px solid #000" colspan="3">OUTPATIENT</th>
        </tr>
        <tr>
          <td  style="border:1px solid #000">A.<br>NHIP</td>
          <td  style="border:1px solid #000">B. <br>NON-NHIP</td>
          <td  style="border:1px solid #000">C. <br>TOTAL</td>
          <td  style="border:1px solid #000">A.<br>NHIP</td>
          <td  style="border:1px solid #000">B. <br>NON-NHIP</td>
          <td  style="border:1px solid #000">C.<br>TOTAL</td>
          <td  style="border:1px solid #000">A. <br>NEW</td>
          <td  style="border:1px solid #000">B. <br>REVISIT</td>
          <td  style="border:1px solid #000">C. <br>TOTAL</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">JAN</td>
          <td  style="border:1px solid #000">$jan_in</td>
          <td  style="border:1px solid #000">$jan_in_non</td>
          <td  style="border:1px solid #000">$total_jan</td>
          <td  style="border:1px solid #000">JAN</td>
          <td  style="border:1px solid #000">$jan_di</td>
          <td  style="border:1px solid #000">$jan_di_non</td>
          <td  style="border:1px solid #000">$total_jan_di</td>
          <td  style="border:1px solid #000">JAN</td>
          <td  style="border:1px solid #000">$jan_out_new</td>
          <td  style="border:1px solid #000">$jan_out_revisit</td>
          <td  style="border:1px solid #000">$total_jan_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">FEB</td>
          <td  style="border:1px solid #000">$feb_in</td>
          <td  style="border:1px solid #000">$feb_in_non</td>
          <td  style="border:1px solid #000">$total_feb</td>
          <td  style="border:1px solid #000">FEB</td>
          <td  style="border:1px solid #000">$feb_di</td>
          <td  style="border:1px solid #000">$feb_di_non</td>
          <td  style="border:1px solid #000">$total_feb_di</td>
          <td  style="border:1px solid #000">FEB</td>
          <td  style="border:1px solid #000">$feb_out_new</td>
          <td  style="border:1px solid #000">$feb_out_revisit</td>
          <td  style="border:1px solid #000">$total_feb_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">MAR</td>
          <td  style="border:1px solid #000">$mar_in</td>
          <td  style="border:1px solid #000">$mar_in_non</td>
          <td  style="border:1px solid #000">$total_mar</td>
          <td  style="border:1px solid #000">MAR</td>
          <td  style="border:1px solid #000">$mar_di</td>
          <td  style="border:1px solid #000">$mar_di_non</td>
          <td  style="border:1px solid #000">$total_mar_di</td>
          <td  style="border:1px solid #000">MAR</td>
          <td  style="border:1px solid #000">$mar_out_new</td>
          <td  style="border:1px solid #000">$mar_out_revisit</td>
          <td  style="border:1px solid #000">$total_mar_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">APR</td>
          <td  style="border:1px solid #000">$apr_in</td>
          <td  style="border:1px solid #000">$apr_in_non</td>
          <td  style="border:1px solid #000">$total_apr</td>
          <td  style="border:1px solid #000">APR</td>
          <td  style="border:1px solid #000">$apr_di</td>
          <td  style="border:1px solid #000">$apr_di_non</td>
          <td  style="border:1px solid #000">$total_apr_di</td>
          <td  style="border:1px solid #000">APR</td>
          <td  style="border:1px solid #000">$apr_out_new</td>
          <td  style="border:1px solid #000">$apr_out_revisit</td>
          <td  style="border:1px solid #000">$total_apr_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">MAY</td>
          <td  style="border:1px solid #000">$may_in</td>
          <td  style="border:1px solid #000">$may_in_non</td>
          <td  style="border:1px solid #000">$total_may</td>
          <td  style="border:1px solid #000">MAY</td>
          <td  style="border:1px solid #000">$may_di</td>
          <td  style="border:1px solid #000">$may_di_non</td>
          <td  style="border:1px solid #000">$total_may_di</td>
          <td  style="border:1px solid #000">MAY</td>
          <td  style="border:1px solid #000">$may_out_new</td>
          <td  style="border:1px solid #000">$may_out_revisit</td>
          <td  style="border:1px solid #000">$total_may_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">JUN</td>
          <td  style="border:1px solid #000">$jun_in</td>
          <td  style="border:1px solid #000">$jun_in_non</td>
          <td  style="border:1px solid #000">$total_jun</td>
          <td  style="border:1px solid #000">JUN</td>
          <td  style="border:1px solid #000">$jun_di</td>
          <td  style="border:1px solid #000">$jun_di_non</td>
          <td  style="border:1px solid #000">$total_jun_di</td>
          <td  style="border:1px solid #000">JUN</td>
          <td  style="border:1px solid #000">$jun_out_new</td>
          <td  style="border:1px solid #000">$jun_out_revisit</td>
          <td  style="border:1px solid #000">$total_jun_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">JUL</td>
          <td  style="border:1px solid #000">$jul_in</td>
          <td  style="border:1px solid #000">$jul_in_non</td>
          <td  style="border:1px solid #000">$total_jul</td>
          <td  style="border:1px solid #000">JUL</td>
          <td  style="border:1px solid #000">$jul_di</td>
          <td  style="border:1px solid #000">$jul_di_non</td>
          <td  style="border:1px solid #000">$total_jul_di</td>
          <td  style="border:1px solid #000">JUL</td>
          <td  style="border:1px solid #000">$jul_out_new</td>
          <td  style="border:1px solid #000">$jul_out_revisit</td>
          <td  style="border:1px solid #000">$total_jul_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">AUG</td>
          <td  style="border:1px solid #000">$aug_in</td>
          <td  style="border:1px solid #000">$aug_in_non</td>
          <td  style="border:1px solid #000">$total_aug</td>
          <td  style="border:1px solid #000">AUG</td>
          <td  style="border:1px solid #000">$aug_di</td>
          <td  style="border:1px solid #000">$aug_di_non</td>
          <td  style="border:1px solid #000">$total_aug_di</td>
          <td  style="border:1px solid #000">AUG</td>
          <td  style="border:1px solid #000">$aug_out_new</td>
          <td  style="border:1px solid #000">$aug_out_revisit</td>
          <td  style="border:1px solid #000">$total_aug_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">SEPT</td>
          <td  style="border:1px solid #000">$sep_in</td>
          <td  style="border:1px solid #000">$sep_in_non</td>
          <td  style="border:1px solid #000">$total_sep</td>
          <td  style="border:1px solid #000">SEPT</td>
          <td  style="border:1px solid #000">$sep_di</td>
          <td  style="border:1px solid #000">$sep_di_non</td>
          <td  style="border:1px solid #000">$total_sep_di</td>
          <td  style="border:1px solid #000">SEPT</td>
          <td  style="border:1px solid #000">$sep_out_new</td>
          <td  style="border:1px solid #000">$sep_out_revisit</td>
          <td  style="border:1px solid #000">$total_sep_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">OCT</td>
          <td  style="border:1px solid #000">$oct_in</td>
          <td  style="border:1px solid #000">$oct_in_non</td>
          <td  style="border:1px solid #000">$total_oct</td>
          <td  style="border:1px solid #000">OCT</td>
          <td  style="border:1px solid #000">$oct_di</td>
          <td  style="border:1px solid #000">$oct_di_non</td>
          <td  style="border:1px solid #000">$total_oct_di</td>
          <td  style="border:1px solid #000">OCT</td>
          <td  style="border:1px solid #000">$oct_out_new</td>
          <td  style="border:1px solid #000">$oct_out_revisit</td>
          <td  style="border:1px solid #000">$total_oct_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">NOV</td>
          <td  style="border:1px solid #000">$nov_in</td>
          <td  style="border:1px solid #000">$nov_in_non</td>
          <td  style="border:1px solid #000">$total_nov</td>
          <td  style="border:1px solid #000">NOV</td>
          <td  style="border:1px solid #000">$nov_di</td>
          <td  style="border:1px solid #000">$nov_di_non</td>
          <td  style="border:1px solid #000">$total_nov_di</td>
          <td  style="border:1px solid #000">NOV</td>
          <td  style="border:1px solid #000">$nov_out_new</td>
          <td  style="border:1px solid #000">$nov_out_revisit</td>
          <td  style="border:1px solid #000">$total_nov_out</td>
        </tr>
        <tr>
          <td  style="border:1px solid #000">DEC</td>
          <td  style="border:1px solid #000">$dec_in</td>
          <td  style="border:1px solid #000">$dec_in_non</td>
          <td  style="border:1px solid #000">$total_dec</td>
          <td  style="border:1px solid #000">DEC</td>
          <td  style="border:1px solid #000">$dec_di</td>
          <td  style="border:1px solid #000">$dec_di_non</td>
          <td  style="border:1px solid #000">$total_dec_di</td>
          <td  style="border:1px solid #000">DEC</td>
          <td  style="border:1px solid #000">$dec_out_new</td>
          <td  style="border:1px solid #000">$dec_out_revisit</td>
          <td  style="border:1px solid #000">$total_dec_out</td>
        </tr>

        <tr>
          <td  style="border:1px solid #000">TOTAL</td>
          <td  style="border:1px solid #000">$total_in</td>
          <td  style="border:1px solid #000">$total_in_non</td>
          <td  style="border:1px solid #000">$total_inn</td>
          <td  style="border:1px solid #000">TOTAL</td>
          <td  style="border:1px solid #000">$total_di</td>
          <td  style="border:1px solid #000">$total_di_non</td>
          <td  style="border:1px solid #000">$total_dii</td>
          <td  style="border:1px solid #000">TOTAL</td>
          <td  style="border:1px solid #000">$total_out_new</td>
          <td  style="border:1px solid #000">$total_out_revisit</td>
          <td  style="border:1px solid #000">$total_out</td>
        </tr>
      </table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


        
$pdf->SetFont('helvetica','B',10);
$pdf->cell(170,8,'B.1: List of Diagnosis ( In - Patients )',0,1);
$pdf->cell(170,8,'Diagnosis',1,0);
$pdf->cell(20,8,'Total',1,1);
foreach($filter_diseases as $row) {
    $pdf->cell(170,8,$row['final_diagnosis'],1,0);
    $pdf->cell(20,8,$this->model('account')->count_diseases($all_patients,$row['final_diagnosis']),1,1);
}


$pdf->SetFont('helvetica','B',10);
$pdf->cell(170,8,'B.2: List of diagnosis ( Out Patients )',0,1);
$pdf->cell(170,8,'Diagnosis',1,0);
$pdf->cell(20,8,'Total',1,1);
foreach($filter_diseases_out as $rows) {
    $pdf->cell(170,8,$rows['impression'],1,0);
    $pdf->cell(20,8,$this->model('account')->count_diseases_out($all_patients,$rows['impression']),1,1);
}




$pdf->SetFont('helvetica','B',10);
$pdf->cell(80,8,'C: Summary',0,1);
$tbls = <<<EOD
<table style="border:1px solid #000">
<tr>
<th  style="border:1px solid #000" colspan="5"></th>
<th  style="border:1px solid #000" colspan="3">Numbers</th>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of admitted patient </td>
<td colspan="3" style="border:1px solid #000">$get_all_admission</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of discharge</td>
<td colspan="3" style="border:1px solid #000">$discharged_patients</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of admitted and discharged on the same day</td>
<td colspan="3" style="border:1px solid #000">$total_admitted_discharged</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of outpatient visit (new patient)</td>
<td colspan="3" style="border:1px solid #000">$total_out_patient_new</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of outpatient visit (revisit)</td>
<td colspan="3" style="border:1px solid #000">$total_out_patient_old</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of deaths</td>
<td colspan="3" style="border:1px solid #000">$deaths_patients</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of Inpatients</td>
<td colspan="3" style="border:1px solid #000">$totalt</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of all outpatient</td>
<td colspan="3" style="border:1px solid #000">$all_out_patients</td>
</tr>

<tr>
<td colspan="5" style="border:1px solid #000">Total Number of all patients</td>
<td colspan="3" style="border:1px solid #000">$total_all_patients</td>
</tr>

</table>
EOD;
$pdf->writeHTML($tbls, true, false, false, false, '');

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
        $data['diseases']    = $this->model('account')->get_all_diseases();
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
        $data['diseases']    = $this->model('account')->get_all_diseases();
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

    public function print($admissions_id) {
        $data['prints'] = $this->model('account')->print_patient_information($admissions_id);
        $this->view('pages/admin/print',$data);
    }

    public function print_out_patient($outpatients_id) {
        $data['prints'] = $this->model('account')->print_out_patient_information($outpatients_id);
        $this->view('pages/admin/print_out_patient',$data);
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

    public function InsertOrUpdateDiseases() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'diseases_id' => $this->input->post('diseases_id'),
                'diseases'    => $this->input->post('diseases'),
            );
            $this->model('account')->diseases($data);
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
                'type'             => $this->input->post('type'),
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

    public function get_diseases_by_id() {
        $diseases_id = $this->input->post('diseases_id');
        $this->model('account')->get_diseases_by_id($diseases_id);
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

    public function delete_diseases_by_id() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $diseases_id = $this->input->post('diseases_id');
            $this->model('account')->delete_diseases_by_id($diseases_id);
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