<?php

/*
  include_once '../helper/format.php';

  include_once '../lib/database.php';

 * For category
 */

class customer {

    private $fm, $db;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new format();
    }

    public function regitration($data) {
        $name = $this->fm->validation($data['name']);
        $email = $this->fm->validation($data['email']);
        $address = $this->fm->validation($data['address']);
        $city = $this->fm->validation($data['city']);
        $zip = $this->fm->validation($data['zip_code']);
        $country = $this->fm->validation($data['country']);
        $phone = $this->fm->validation($data['phone']);
        $pass = $this->fm->validation($data['password']);

        $name = mysqli_real_escape_string($this->db->link, $name);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $zip = mysqli_real_escape_string($this->db->link, $zip);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        if ($name == "" || $city == "" || $email == "" || $address == "" || $zip == "" || $country == "" || $phone == "" || $pass == "") {
            $msg = "<span class='error'>Feild not be Empty</span>";
            return $msg;
        }
        $mailquery = "select * from customer where email='$email' limit 1";
        $mail_chk = $this->db->select($mailquery);
        if ($mail_chk != FALSE) {
            $msg = "<span class='error'>Email Already Exists</span>";
            return $msg;
        } else {
            $query = "Insert into customer(name,address,city,country,zip,phone,email,password) "
                    . "values('$name','$address','$city','$country','$zip','$phone','$email','$pass')";

            $insert_customer = $this->db->insert($query);
            if ($insert_customer) {
                $msg = "<span class='success'> Customer Data Save Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Not Inserted</span>";
                return $msg;
            }
        }
    }

    public function login($data) {
        $email = $this->fm->validation($data['email']);
        $pass = $this->fm->validation($data['password']);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $pass = mysqli_real_escape_string($this->db->link, $pass);
        if ($email == "" || $pass == "") {
            $msg = "<span class='error'>Feild not be Empty</span>";
            return $msg;
        } else {
            $query = "select * from customer where email='$email' and password='$pass'";
            $login_customer = $this->db->select($query);
            if ($login_customer != FALSE) {
                $value = $login_customer->fetch_assoc();
                Session::set("customer", $value['id']);
                Session::set("cus_login", TRUE);
                Session::set("customer_name", $value['name']);
                header("Location:order.php");
            } else {
                $msg = "<span class='error'> Incorrect User Id and Password </span>";
                return $msg;
            }
        }
    }

    public function customerDta($id) {

        $query = "select * from customer where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function user_update($data, $id) {
        
        $name = $this->fm->validation($data['name']);
        $email = $this->fm->validation($data['email']);
        $address = $this->fm->validation($data['address']);
        $city = $this->fm->validation($data['city']);
        $zip = $this->fm->validation($data['zip']);
        $country = $this->fm->validation($data['country']);
        $phone = $this->fm->validation($data['phone']);    
        $name = mysqli_real_escape_string($this->db->link, $name);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $zip = mysqli_real_escape_string($this->db->link, $zip);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
     

        if ($name == "" || $city == "" || $email == "" || $address == "" || $zip == "" || $country == "" || $phone == "") {
            $msg = "<span class='error'>Feild not be Empty</span>";
            return $msg;
        }
         $query = "update customer set name='$name',address='$address',city='$city',country='$country',zip='$zip',phone='$phone',email='$email'"
                 . " where id='$id'";
         
       
         
        $updated_row = $this->db->update($query);
        if ($updated_row) {
             $msg = "<span class='success'> User data Updated Successfully</span>";
            //header("Location:user_update.php");
            return $msg;
        } else {
            $msg = "<span class='error'> <User data Not Updated Successfully</span>";
            return $msg;
        }
}

        }
    