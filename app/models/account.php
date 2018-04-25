<?php 
class account extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function filter_outcome($data) {
        $from = $data['from'];
        $to = $data['to'];
        $outcome = $data['outcome'];
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND outcome = '$outcome'");
        return $query->num_rows;
    }

    public function filter_disposition($data) {
        $from = $data['from'];
        $to = $data['to'];
        $disposition = $data['disposition'];
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND disposition = '$disposition'");
        return $query->num_rows;
    }

    public function bar_admission_in_patient() {
        $query = $this->db->query("SELECT * FROM admissions GROUP BY final_diagnosis LIMIT 10");
        return $query;
    }

    public function bar_admission_out_patient() {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient GROUP BY impression LIMIT 10");
        return $query;
    }

    public function all_patients($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to'");
        return $query->num_rows;
    }

    public function filter_admission($data) {
        $from = $data['from'];
        $to = $data['to'];
        $admission_type = $data['admission_type'];
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date > '$from' AND admission_date <= '$to' AND admission_type = '$admission_type'");
        return $query->num_rows;
    }

    public function all_out_patients($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date > '$from' AND date <= '$to' ");
        return $query->num_rows;
    }

    public function all_out_patients_new($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function all_out_patients_old($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function jan_in() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function feb_in() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function mar_in() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function apr_in() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function may_in() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jun_in() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jul_in() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function aug_in() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function sep_in() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function oct_in() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function nov_in() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function dec_in() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jan_in_non() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function feb_in_non() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function mar_in_non() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function apr_in_non() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function may_in_non() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function jun_in_non() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function jul_in_non() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function aug_in_non() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function sep_in_non() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function oct_in_non() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function nov_in_non() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function dec_in_non() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }


    public function jan_di() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function feb_di() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function mar_di() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function apr_di() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function may_di() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jun_di() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jul_di() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function aug_di() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function sep_di() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function oct_di() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function nov_di() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function dec_di() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth != 'None' ");
        return $query->num_rows;
    }

    public function jan_di_non() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function feb_di_non() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function mar_di_non() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function apr_di_non() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function may_di_non() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function jun_di_non() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function jul_di_non() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function aug_di_non() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function sep_di_non() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function oct_di_non() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function nov_di_non() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function dec_di_non() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND '$to' AND philhealth = 'None' ");
        return $query->num_rows;
    }

    public function jan_out_new() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function feb_out_new() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function mar_out_new() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function apr_out_new() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function may_out_new() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function jun_out_new() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function jul_out_new() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function aug_out_new() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function sep_out_new() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function oct_out_new() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function nov_out_new() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function dec_out_new() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'New Patient'");
        return $query->num_rows;
    }

    public function jan_out_revisit() {
        $from = date('Y').'-01-01';
        $to = date('Y').'-01-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function feb_out_revisit() {
        $from = date('Y').'-02-01';
        $to = date('Y').'-02-28';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function mar_out_revisit() {
        $from = date('Y').'-03-01';
        $to = date('Y').'-03-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function apr_out_revisit() {
        $from = date('Y').'-04-01';
        $to = date('Y').'-04-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function may_out_revisit() {
        $from = date('Y').'-05-01';
        $to = date('Y').'-05-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function jun_out_revisit() {
        $from = date('Y').'-06-01';
        $to = date('Y').'-06-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function jul_out_revisit() {
        $from = date('Y').'-07-01';
        $to = date('Y').'-07-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function aug_out_revisit() {
        $from = date('Y').'-08-01';
        $to = date('Y').'-08-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function sep_out_revisit() {
        $from = date('Y').'-09-01';
        $to = date('Y').'-09-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function oct_out_revisit() {
        $from = date('Y').'-010-01';
        $to = date('Y').'-010-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function nov_out_revisit() {
        $from = date('Y').'-11-01';
        $to = date('Y').'-11-30';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function dec_out_revisit() {
        $from = date('Y').'-012-01';
        $to = date('Y').'-012-31';
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND  '$to' AND type = 'Revisit'");
        return $query->num_rows;
    }

    public function get_all_inpatients($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date BETWEEN '$from' AND '$to' AND discharged_date = '' AND discharged_time = '' ");
        return $query->num_rows;
    }

    public function get_all_discharged_patients($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query = $this->db->query("SELECT * FROM admissions WHERE discharged_date BETWEEN '$from' AND  '$to' AND discharged_date != '' ");
        return $query->num_rows;
    }

    public function get_all_admitted_discharged_patients($data) {
        $from = $data['from'];
        $to = $data['to'];
        $i = 0;
        $total = 0;
        $query = $this->db->query("SELECT * FROM admissions WHERE admission_date >= '$from' AND discharged_date <= '$to'");
        while($row = $query->fetch_assoc()) {
            if($row['admission_date'] == $row['discharged_date']) {
               $total = ++$i;
            }
        }
        return $total;
    }

    public function chart() {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM admissions WHERE status = 0 GROUP BY admission_date,patient_code");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['admission_date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }

    public function chart_discharged() {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM admissions WHERE status = 1 GROUP BY admission_date,patient_code");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['admission_date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }

    public function chart_out_patients() {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM medical_record_out_patient GROUP BY date");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }

    public function filter_patient_code($search) {
        $check = $this->db->query("SELECT * FROM medical_record_out_patient WHERE patient_code = '$search'");
        if($check->num_rows > 0) {
            $row = $check->fetch_object();
            echo json_encode(array('success'=>true,'data'=>$row));
        } else {
            $check = $this->db->query("SELECT * FROM admissions WHERE patient_code = '$search'");
            if($check->num_rows > 0) {
                $row = $check->fetch_object();
                echo json_encode(array('success'=>true,'data'=>$row));
            } else {
                echo json_encode(array('success'=>false));
            }
        }
    }

    public function filter_out_patient($search) {
        $check = $this->db->query("SELECT * FROM medical_record_out_patient WHERE patient_code = '$search'");
        if($check->num_rows > 0) {
            $row = $check->fetch_object();
            echo json_encode(array('success'=>true,'data'=>$row));
        } else {
            $check = $this->db->query("SELECT * FROM admissions WHERE patient_code = '$search'");
            if($check->num_rows > 0) {
                $row = $check->fetch_object();
                echo json_encode(array('success'=>true,'data'=>$row));
            } else {
                echo json_encode(array('success'=>false));
            }
        }
    }

    public function chart_by_doctor($id) {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM admissions WHERE status = 0 AND attending_physicians = $id GROUP BY admission_date");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['admission_date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }

    public function chart_by_doctor_discharged($id) {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM admissions WHERE status = 1 AND attending_physicians = $id GROUP BY admission_date");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['admission_date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }

    public function chart_out_patients_by_doctor($id) {
        $result = $this->db->query("SELECT *, COUNT(*) as c  FROM medical_record_out_patient WHERE physicians_id = $id GROUP BY date");
        $jsonArray = array();
        foreach($result as $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = date('M d, Y',strtotime($row['date']));
            $jsonArrayItem['value'] = $row['c'];
            array_push($jsonArray, $jsonArrayItem);
        }    
        header('Content-type: application/json');
        echo json_encode($jsonArray);
    }
    

    public function get_user_information($account_id) {
        $query = $this->db->query("SELECT * FROM accounts WHERE accounts_id = $account_id");
        return $query->fetch_object();
    }

    public function get_information_by_id($accounts_id) {
        $query = $this->db->query("SELECT * FROM accounts WHERE accounts_id = $accounts_id");
        echo json_encode($query->fetch_object());
    }

    public function get_admissions_by_id($admissions_id) {
        $query = $this->db->query("SELECT * FROM admissions WHERE admissions_id = $admissions_id");
        echo json_encode($query->fetch_object());
    }

    public function get_out_patient_by_id($outpatients_id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE outpatients_id = $outpatients_id");
        echo json_encode($query->fetch_object());
    }

    public function get_all_users($role) {
        $query = $this->db->query("SELECT * FROM accounts WHERE role = $role");
        return $query;
    }

    public function get_all_physicians() {
        $query = $this->db->query("SELECT * FROM accounts WHERE role = 1 AND status = 0");
        return $query;
    }

    public function medical_record_out_patients($data) {
        $outpatients_id = $data['outpatients_id'];
        $patient_code  = rand(111111,999999);
        if(empty($outpatients_id)) {
            $check = $this->db->query("SELECT * FROM medical_record_out_patient WHERE opd_case_number = '".$data['opd_case_number']."'");
            if($check->num_rows > 0) {
                notify('error','OPD case number already exist.',false);
            } else {
                $query = $this->db->query("INSERT INTO `medical_record_out_patient`(`patient_code`,`surname`, `firstname`, `middlename`, `birthday`, `age`, `gender`, `address`, `chief_complaints`, `opd_case_number`, `physicians_id`, `hp`, `pulse_rate`, `respiratory_rate`, `temperature`, `weight`,`date`,`type`,`time`, `impression`, `treatment`) VALUES 
                ('$patient_code','".$data['surname']."','".$data['firstname']."','".$data['middlename']."','".$data['birthday']."','".$data['age']."','".$data['gender']."','".$data['address']."','".$data['chief_complaints']."','".$data['opd_case_number']."','".$data['physicians_id']."','".$data['hp']."','".$data['pulse_rate']."','".$data['respiratory_rate']."','".$data['temperature']."','".$data['weight']."','".$data['date']."','".$data['type']."','".$data['time']."','".$data['impression']."','".$data['treatment']."')");
                if($query) {
                    notify('success','New out-patient has been added.',true);
                } else {
                    notify('error','Something went wrong!',true);
                }
            }
        } else {
            // update here 
            $query = $this->db->query("UPDATE `medical_record_out_patient` SET `surname`= '".$data['surname']."' ,`firstname`= '".$data['firstname']."', `middlename`= '".$data['middlename']."',`birthday`= '".$data['birthday']."',`age`= '".$data['age']."',`gender`= '".$data['gender']."',`address`= '".$data['address']."',`chief_complaints`= '".$data['chief_complaints']."',`opd_case_number`= '".$data['opd_case_number']."',`physicians_id`= '".$data['physicians_id']."',`hp`= '".$data['hp']."',`pulse_rate`= '".$data['pulse_rate']."',`respiratory_rate`= '".$data['respiratory_rate']."',`temperature`= '".$data['temperature']."',`weight`= '".$data['weight']."',`date`= '".$data['date']."',`type`= '".$data['type']."',`time`= '".$data['time']."',`impression`= '".$data['impression']."',`treatment`= '".$data['treatment']."' WHERE outpatients_id = $outpatients_id");
            if($query) {
                notify('info','OPD case number '.$data['opd_case_number'].' has been updated.',true);
            }
        }
    }

    public function admissions_in_patients($data) {
        $admissions_id = $data['admissions_id'];
        $p_code = $data['patient_code'];
        $patient_code  = rand(111111,999999);
        $date = date('Y-m-d');
        if(empty($admissions_id)) {
            $check = $this->db->query("SELECT * FROM admissions WHERE hospital_code = '".$data['hospital_code']."'");
            if($check->num_rows > 0) {
                notify('error','Hospital code already exist.',false);
            } else {
            // insert here 
                foreach($data['attending_physicians'] as $key => $value) {
                    $query = $this->db->query("INSERT INTO `admissions`(`patient_code`,`surname`, `firstname`, `middlename`, `birthday`, `address`, `birthplace`, `age`, `gender`, `civil_status`, `nationality`, `religion`, `occupation`, `name1`, `address1`, `contact1`, `name2`, `address2`, `contact2`, `name3`, `address3`, `contact3`, `hospital_code`, `medical_record_number`, `room`, `admission_date`, `admission_time`, `discharged_date`, `discharged_time`, `days`, `admitting_personnel`, `attending_physicians`, `referred_by`, `alert`, `allergic`, `admission_type`, `health_insurance`, `philhealth`, `data_furnished`, `informant`, `patient_relation`, `admission_diagnosis`, `final_diagnosis`, `icd`, `principal_operation`, `disposition`, `outcome`,`date_today`) VALUES ('$patient_code','".$data['surname']."','".$data['firstname']."','".$data['middlename']."','".$data['birthday']."','".$data['patient_address']."','".$data['birthplace']."','".$data['age']."','".$data['gender']."','".$data['civil_status']."','".$data['nationality']."','".$data['religion']."','".$data['occupation']."','".$data['name1']."','".$data['address1']."','".$data['contact1']."','".$data['name2']."','".$data['address2']."','".$data['contact2']."','".$data['name3']."','".$data['address3']."','".$data['contact3']."','".$data['hospital_code']."','".$data['medical_record_number']."','".$data['room']."','".$data['admission_date']."','".$data['admission_time']."','".$data['discharged_date']."','".$data['discharged_time']."','".$data['days']."','".$data['admitting_personnel']."','".$data['attending_physicians'][$key]."','".$data['referred_by']."','".$data['alert']."','".$data['allergic']."','".$data['admission_type']."','".$data['health_insurance']."','".$data['philhealth']."','".$data['data_furnished']."','".$data['informant']."','".$data['patient_relation']."','".$data['admission_diagnosis']."','".$data['final_diagnosis']."','".$data['icd']."','".$data['principal_operation']."','".$data['disposition']."','".$data['outcome']."','$date')");
                }
                
                if($query) {
                    notify('success','New patient has been added.',true);
                } else {
                    notify('error','Something went wrong!',true);
                }
            }
        } else {
            // update here 
            $status = $data['discharged_date'] == '' ? 0 : 1;
            foreach($data['attending_physicians'] as $key => $value) {
                $query = $this->db->query("UPDATE `admissions` SET `surname`= '".$data['surname']."' ,`firstname`= '".$data['firstname']."', `middlename`= '".$data['middlename']."',`birthday`= '".$data['birthday']."',`address`= '".$data['patient_address']."',`birthplace`= '".$data['birthplace']."',`age`= '".$data['age']."',`gender`= '".$data['gender']."',`civil_status`= '".$data['civil_status']."',`nationality`= '".$data['nationality']."',`religion`= '".$data['religion']."',`occupation`= '".$data['occupation']."',`name1`= '".$data['name1']."',`address1`= '".$data['address1']."',`contact1`= '".$data['contact1']."',`name2`= '".$data['name2']."',`address2`= '".$data['address2']."',`contact2`= '".$data['contact2']."',`name3` = '".$data['name3']."',`address3`= '".$data['address3']."',`contact3`= '".$data['contact3']."',`hospital_code`= '".$data['hospital_code']."',`medical_record_number`= '".$data['medical_record_number']."',`room`= '".$data['room']."',`admission_date`= '".$data['admission_date']."',`admission_time` = '".$data['admission_time']."', `discharged_date` = '".$data['discharged_date']."',`discharged_time` = '".$data['discharged_time']."',`days`= '".$data['days']."',`admitting_personnel`= '".$data['admitting_personnel']."',`referred_by`='".$data['referred_by']."',`alert`= '".$data['alert']."',`allergic`= '".$data['allergic']."',`admission_type`='".$data['admission_type']."',`health_insurance`='".$data['health_insurance']."',`philhealth`='".$data['philhealth']."',`data_furnished`='".$data['data_furnished']."',`informant`='".$data['informant']."',`patient_relation`= '".$data['patient_relation']."',`admission_diagnosis`='".$data['admission_diagnosis']."',`final_diagnosis`='".$data['final_diagnosis']."',`icd`='".$data['icd']."',`principal_operation`='".$data['principal_operation']."',`disposition`='".$data['disposition']."',`outcome`='".$data['outcome']."', status = $status WHERE patient_code = $p_code");
            }
            // ,`attending_physicians`= '".$data['attending_physicians'][$key]."',
                if($query) {
                    notify('info','Hospital code '.$data['hospital_code'].' has been updated.',true);
                }
            
        }
    }

    public function get_all_admissions($status) {
        $date_today = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.status = $status GROUP BY patient_code");
        return $query;
    }


    public function get_all_doctor_admissions($status,$id) {
        $date_today = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE  a.status = $status AND a.attending_physicians = $id");
        return $query;
    }

    public function get_all_patients() {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id GROUP BY surname,firstname,middlename");
        return $query;
    }

    public function print_patient_information($admissions_id) {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.admissions_id = $admissions_id");
        return $query->fetch_object();
    }

    public function print_out_patient_information($outpatients_id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE outpatients_id = $outpatients_id");
        return $query->fetch_object();
    }

    public function total_patients($status) {
        $date = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM admissions WHERE status = $status");
        return $query->num_rows;
    }

    public function total_patients_by_doctor($status,$id) {
        $query = $this->db->query("SELECT * FROM admissions WHERE status = $status AND attending_physicians = $id");
        return $query->num_rows;
    }

    public function total_out_patients_by_doctor($id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE physicians_id = $id");
        return $query->num_rows;
    }

    public function view_diseases($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query =  $this->db->query("SELECT * FROM admissions WHERE admission_date >= '$from' AND discharged_date <= '$to' AND discharged_date != '' GROUP BY final_diagnosis");
        return $query;
    }

    public function count_diseases($data,$final_diagnosis) {
        $from = $data['from'];
        $to = $data['to'];
        $query =  $this->db->query("SELECT * FROM admissions WHERE admission_date >= '$from' AND discharged_date <= '$to' AND final_diagnosis = '$final_diagnosis'");
        return $query->num_rows;
    }
    
    public function view_diseases_out($data) {
        $from = $data['from'];
        $to = $data['to'];
        $query =  $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND '$to' GROUP BY impression ORDER BY impression");
        return $query;
    }

    public function count_diseases_out($data,$impression) {
        
        $from = $data['from'];
        $to = $data['to'];
        $query =  $this->db->query("SELECT * FROM medical_record_out_patient WHERE date BETWEEN '$from' AND '$to' AND impression = '$impression'");
        return $query->num_rows;
    }

    public function get_all_diseases() {
        $query = $this->db->query("SELECT * FROM diseases");
        return $query;
    }

    public function get_diseases() {
        $query = $this->db->query("SELECT * FROM diseases");
        return $query->num_rows;
    }

    public function total_out_patients() {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient");
        return $query->num_rows;
    }

    public function total_users($role) {
        $query = $this->db->query("SELECT * FROM accounts WHERE role = $role");
        return $query->num_rows;
    }

    public function get_doctor_patients($id) {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.attending_physicians = $id GROUP BY surname,firstname,middlename");
        return $query;
    }

    public function view_doctor_patients($surname,$firstname,$status,$id) {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.surname = '$surname' AND a.firstname = '$firstname' AND a.status = $status AND a.attending_physicians = $id");
        return $query;
    }
    
    public function view_patients_by_lastname($surname,$firstname,$status) {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.surname = '$surname' AND a.firstname = '$firstname' AND a.status = $status");
        return $query;
    }

    public function view_patients_doctor_by_lastname($surname,$firstname,$status,$id) {
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.surname = '$surname' AND a.firstname = '$firstname' AND a.status = $status AND a.attending_physicians = $id");
        return $query;
    }

    

    public function get_patient($id) {
        $query = $this->db->query("SELECT * FROM admissions WHERE admissions_id = $id");
        return $query->fetch_object();
    }

    public function get_patients($id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient WHERE outpatients_id = $id");
        return $query->fetch_object();
    }

    

    public function get_all_admissions_by_doctor($status) {
        $date_today = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM admissions as a INNER JOIN accounts as ac ON a.attending_physicians = ac.accounts_id INNER JOIN rooms as r ON a.room = r.rooms_id WHERE a.discharged_date = '' AND a.status = $status AND accounts_id = ".$_SESSION['id']);
        return $query;
    }


    public function get_all_out_patients() {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id WHERE mrop.impression = '' AND treatment = ''");
        return $query;
    }

    public function get_all_out_patients_by_name() {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id GROUP BY surname,firstname,middlename");
        return $query;
    }

    public function get_all_out_patients_by_name_by_doctor($id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id WHERE mrop.physicians_id = $id GROUP BY surname,firstname,middlename");
        return $query;
    }

    public function get_all_out_patients_by_doctor($id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id WHERE mrop.physicians_id = $id AND mrop.impression = '' AND mrop.treatment = ''");
        return $query;
    }

    public function get_out_patients_by_lastname($surname,$firstname) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id WHERE mrop.surname = '$surname' AND mrop.firstname = '$firstname'");
        return $query;
    }

    public function get_out_patients_doctor_by_lastname($surname,$firstname,$id) {
        $query = $this->db->query("SELECT * FROM medical_record_out_patient as mrop INNER JOIN accounts as ac ON mrop.physicians_id = ac.accounts_id WHERE mrop.surname = '$surname' AND mrop.firstname = '$firstname' AND mrop.physicians_id = $id");
        return $query;
    }

    public function accounts($data) {
        $accounts_id = $data['accounts_id'];
        $name        = $data['name'];
        $contact     = $data['contact'];
        $email       = $data['email'];
        $gender      = $data['gender'];
        $address     = $data['address'];
        $status      = $data['status'];
        $username    = $data['username'];
        $password    = $data['password'];
        $role        = $data['role'];
        if(empty($accounts_id)) {
            $check       = $this->db->query("SELECT * FROM accounts WHERE username = '$username'");
            if($check->num_rows > 0) {
                notify('error','Username already exist.',false);
            } else {
                $query = $this->db->query("INSERT INTO accounts (name, contact, email, gender, address, username, password, role) VALUES ('$name', '$contact', '$email', '$gender', '$address', '$username', '$password', '$role')");
                notify('success','New user has been added.',true);
            }
        } else {
            $query = $this->db->query("UPDATE accounts SET name = '$name', contact = '$contact', email = '$email', gender = '$gender', address = '$address', status = '$status', username = '$username', password = '$password', role = '$role' WHERE accounts_id = $accounts_id");
            notify('info','Data has been changed.',true);
        }

    }

    public function user_login($data) {
        $username = $data['username'];
        $password = $data['password'];
        $check = $this->db->query("SELECT * FROM accounts WHERE username = '$username' AND status = 0");
        if($check->num_rows > 0) {
            $row = $check->fetch_object();
            $role = $row->role;
            $hash = $row->password;
            if(verify($password,$hash) && $role == 0) {
                $_SESSION['id'] = $row->accounts_id;
                echo json_encode(['url' => URL.'admin/dashboard','success' => true]);
            } elseif(verify($password,$hash) && $role == 1) {
                $_SESSION['id'] = $row->accounts_id;
                echo json_encode(['url' => URL.'doctor/dashboard','success' => true]);
            } elseif(verify($password,$hash) && $role == 2) {
                $_SESSION['id'] = $row->accounts_id;
                echo json_encode(['url' => URL.'staff/dashboard','success' => true]);
            } else {
                notify('error','Invalid username or password',false);
            }
        } else {
            notify('error','Invalid username or password',false);
        }
    }

    public function get_all_rooms() {
        $query = $this->db->query("SELECT * FROM rooms");
        return $query;
    }

    public function get_rooms_by_id($rooms_id) {
        $query = $this->db->query("SELECT * FROM rooms WHERE rooms_id = $rooms_id");
        echo json_encode($query->fetch_object());
    }

    public function get_diseases_by_id($diseases_id) {
        $query = $this->db->query("SELECT * FROM diseases WHERE diseases_id = $diseases_id");
        echo json_encode($query->fetch_object());
    }

    public function rooms($data) {
        $rooms_id    = $data['rooms_id'];
        $room_type   = $data['room_type'];
        $floor       = $data['floor'];
        $room_number = $data['room_number'];
        if(empty($rooms_id)) {
            $check       = $this->db->query("SELECT * FROM rooms WHERE floor = '$floor' AND room_number = '$room_number'");
            if($check->num_rows > 0) {
                notify('error','Room already exist.',false);
            } else {
                $query = $this->db->query("INSERT INTO rooms (room_type,floor,room_number) VALUES ('$room_type', '$floor', '$room_number')");
                notify('success','New room has been added.',true);
            }
        } else {
            $query = $this->db->query("UPDATE rooms SET room_type = '$room_type', floor = '$floor', room_number = '$room_number' WHERE rooms_id = $rooms_id");
            notify('info','Data has been changed.',true);
        }
    }

    public function diseases($data) {
        $diseases_id = $data['diseases_id'];
        $diseases    = $data['diseases'];
        if(empty($diseases_id)) {
            $check       = $this->db->query("SELECT * FROM diseases WHERE diseases = '$diseases'");
            if($check->num_rows > 0) {
                notify('error','Disease already exist.',false);
            } else {
                $query = $this->db->query("INSERT INTO diseases (diseases) VALUES ('$diseases')");
                notify('success','New disease has been added.',true);
            }
        } else {
            $query = $this->db->query("UPDATE diseases SET diseases = '$diseases' WHERE diseases_id = $diseases_id");
            notify('info','Data has been changed.',true);
        }
    }

    public function delete_rooms_by_id($rooms_id) {
        $query = $this->db->query("DELETE FROM rooms WHERE rooms_id = $rooms_id");
        notify('info','Room has been deleted',true);
    }

    public function delete_diseases_by_id($diseases_id) {
        $query = $this->db->query("DELETE FROM diseases WHERE diseases_id = $diseases_id");
        notify('info','Disease has been deleted',true);
    }
    
    public function countries() {
        $query = $this->db->query("SELECT * FROM countries");
        return $query;
    }

    public function update_profile($data) {
        $accounts_id = $data['accounts_id'];
        $name        = $data['name'];
        $contact     = $data['contact'];
        $email       = $data['email'];
        $gender      = $data['gender'];
        $address     = $data['address'];
        $username    = $data['username'];
        $query       = $this->db->query("UPDATE accounts SET name = '$name', contact = '$contact', email = '$email', gender = '$gender', address = '$address', username = '$username' WHERE accounts_id = $accounts_id");
        if($query) {
            $content = 'updated his / her account details';
            $this->db->query("INSERT INTO logs (accounts_id,content) VALUES ('$accounts_id','$content')");
        }
        notify('info','Data has been changed.',true);
    }

    public function get_all_logs() {
        $query = $this->db->query("SELECT * FROM accounts as a INNER JOIN logs as l ON a.accounts_id = l.accounts_id");
        return $query;
    }

    public function update_picture() {
        $image       = $_FILES['files']['name'];
        $accounts_id = $_SESSION['id'];
        move_uploaded_file($_FILES['files']['tmp_name'],UPLOADS.'profile/'.$_FILES['files']['name']);
        $query = $this->db->query("UPDATE accounts SET image = '$image' WHERE accounts_id = $accounts_id");
        if($query) {
            $content = 'updated his / her account profile';
            $this->db->query("INSERT INTO logs (accounts_id,content) VALUES ('$accounts_id','$content')");
        }
        notify('info','profile has been changed.',true);
    }

    public function update_password($data) {
        $password    = $data['password'];
        $accounts_id = $data['accounts_id'];
        $query = $this->db->query("UPDATE accounts SET password = '$password' WHERE accounts_id = '$accounts_id'");
        if($query) {
            $content = 'updated his / her account password';
            $this->db->query("INSERT INTO logs (accounts_id,content) VALUES ('$accounts_id','$content')");
        }
        notify('info','Password has been changed.',true);
        
    }

    public function post($data) {
        $query = $this->db->real_escape_string(htmlentities($_POST[$data]));
        return $query;
    }

}
