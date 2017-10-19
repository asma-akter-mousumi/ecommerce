<?php/*
 include_once '../lib/session.php';
  include_once '../helper/format.php';
 Session::checkLogin();
 include_once '../lib/database.php';
 
 * For Admin Login
 */
 class AdminLogin{
     private $db;
        private $fm;
     public function __construct() {
        $this->db=new Database();
       $this->fm=  new Format();
     }
     public function adminlogin($adminuser,$adminpass){
        
        $adminuser=$this->fm->validation($adminuser); 
        $adminpass=$this->fm->validation($adminpass); 
        $adminuser= mysqli_real_escape_string($this->db->link,$adminuser);
          $adminpass= mysqli_real_escape_string($this->db->link,$adminpass);
          if(empty($adminuser) || empty($adminpass)){
              $loginmsg1="user password must be enter";
              return $loginmsg1;
          }
 else {
     $query="select * from admin where admin_user='$adminuser' and admin_pass='$adminpass'";
     $result=  $this->db->select($query);
  
     if($result!=false){
         $value=$result->fetch_assoc();
         Session::set('adminlogin', true);
         Session::set('adminid', $value['admin_id']);
         Session::set('adminuser', $value['admin_user']);
         Session::set('admin_name', $value['admin_name']);
         header("Location:index.php");
     }
 else {
   
              $loginmsg2="incorrect";
              return $loginmsg2;
            
     }
 }
     }
} 

