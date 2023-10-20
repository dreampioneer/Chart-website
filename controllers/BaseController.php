<?php

    session_start();

    class MySQL {
        public $servername, $username, $password, $dbname, $conn, $conn_status; // config variables

        function __construct() {
            if($_SERVER['HTTP_HOST'] == 'localhost'){
                // Localserver
                $this->servername   = 'localhost';
                $this->username     = 'root';
                $this->password     = '';
                $this->db_name      = 'charts';
                $this->conn_status  = false;
            }elseif($_SERVER['HTTP_HOST'] == '192.168.1.114'){
                // Localserver
                $this->servername   = 'localhost';
                $this->username     = 'root';
                $this->password     = '';
                $this->db_name      = 'charts';
                $this->conn_status  = false;
            } else{
                //  Production server
               // $this->servername   = 'localhost';
               // $this->username     = 'dependa8_admin';
               // $this->password     = 'Oy&.S2xWG}p)';
               // $this->db_name      = 'dependa8_sensor';
               // $this->conn_status  = false;
 
                //  Production server
                $this->servername   = 'localhost';
                $this->username     = 'triniws6_sensor';
                $this->password     = 'Xitb?f!{^M{(';
                $this->db_name      = 'triniws6_samd';
                $this->conn_status  = false;
            }

            $this->conn = new mysqli($this->servername, $this->username, $this->password);
        }

        function init_conn() {
            if($this->make_conn() == false) {
                return false;
            }

            if($this->conn_to_database($this->db_name) == false) {
                return false;
            }

            if($this->make_new_conn() == false) {
                return false;
            }

            $this->conn_to_table();
            $this->conn_status = true;

            return $this->conn_status;
        }

        function make_conn() {
            // create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password);

            // check connection
            if ($this->conn->connect_error) {
                return false;
            } else {
                return true;
            }
        }


        function make_new_conn() {
            // create new connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            // check connection
            if ($this->conn->connect_error) {
                return false;
            } else {
                return true;
            }
        }

        function conn_to_database($dbname) {
            $this->dbname = $dbname;

            // create database
            // $sql = "CREATE DATABASE $this->dbname";
            // if ($this->conn->query($sql) == TRUE) {
            //     return true;
            // }
            // else if($this->str_contains($this->conn->error, "database exists")) {
            //     return true;
            // }
            // else {
            //     return false;
            // }
            return true;
        }

        function conn_to_table() {
          //  $sql = "CREATE TABLE users(id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(255), password VARCHAR(255), email VARCHAR(255), role INT, email_verified INT, status INT, reg_date TIMESTAMP, etc VARCHAR(255))";
        //    $this->conn->query($sql);

           // $sql = "CREATE TABLE leads(id INT PRIMARY KEY AUTO_INCREMENT, NAME VARCHAR(255), email VARCHAR(255), city VARCHAR(255), state VARCHAR(255), etc VARCHAR(255))";
            //$this->conn->query($sql);
        }

        function str_contains (string $haystack, string $needle) {
            return empty($needle) || strpos($haystack, $needle) !== false;
        }



    }

    function Redirect($url, $permanent = false) {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
    }

    function dd($value) {
        var_dump($value);
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once(__DIR__."/../vendor/autoload.php");

    function email_verify($address) {


        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->Username = "database@kctd.org"; // SMTP username
        $mail->Password = "Ss7651!!"; // SMTP password
        $mail->Host = 'ssl://mail.kctd.org:465';
        $mail->addAttachment("../uploads/".$file_name);
        $mail->From = "database@kctd.org";
        $mail->FromName = 'Support';


        $mail->addAddress($address);                          // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);
        $mail->Subject = 'Email Verify Code';

        $code = mt_rand(100000, 999999);

        $_SESSION['verify_code'] = md5($code);
        $_SESSION['verify_status'] = "false";

        $mail->Body    = "Email Verify Code is <b>$code</b>";
        $mail->AltBody = "Email Verify Code is <b>$code</b>";

        if($mail->send()) {
            return 'true';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        return 'false';
    }
?>
