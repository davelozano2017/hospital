<?php 
class account extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_user_information($account_id) {
        $query = $this->db->query("SELECT * FROM accounts WHERE accounts_id = $account_id");
        return $query->fetch_object();
    }

    public function get_information_by_id($accounts_id) {
        $query = $this->db->query("SELECT * FROM accounts WHERE accounts_id = $accounts_id");
        echo json_encode($query->fetch_object());
    }

    public function get_all_users($role) {
        $query = $this->db->query("SELECT * FROM accounts WHERE role = $role");
        return $query;
    }

    public function accounts($data) {
        $accounts_id = $data['accounts_id'];
        $name        = $data['name'];
        $contact     = $data['contact'];
        $email       = $data['email'];
        $gender      = $data['gender'];
        $address     = $data['address'];
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
            $query = $this->db->query("UPDATE accounts SET name = '$name', contact = '$contact', email = '$email', gender = '$gender', address = '$address', username = '$username', password = '$password', role = '$role' WHERE accounts_id = $accounts_id");
            notify('info','Data has been changed.',true);
        }

    }

    public function user_login($data) {
        $username = $data['username'];
        $password = $data['password'];
        $check = $this->db->query("SELECT * FROM accounts WHERE username = '$username'");
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
