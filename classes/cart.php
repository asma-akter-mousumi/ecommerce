<?php
/*
include_once '../helper/format.php';

include_once '../lib/database.php';

 * For category
 */

class cart {

    private $fm, $db;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new format();
    }
    public function add_to_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $id = $this->fm->validation($id);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $session_id=  session_id();
        $query="select * from product where product_id='$id'";
        
         $result = $this->db->select($query)->fetch_assoc();
         $product_name=$result['product_name'];
          $product_price=$result['product_price'];
           $product_image=$result['product_image'];
           $chquery="select * from cart where product_id=$id and session_id='$session_id'";
             $get_pro = $this->db->insert($chquery);
             if($get_pro){
                $msg = "<span class='error'> Product Already added</span>";
                return $msg;
             }
 else { $query="Insert into cart(session_id,product_id,product_name,product_price,product_qunatity,product_image) values('$session_id','$id','$product_name','$product_price','$quantity','$product_image')";
     
      $insert_product = $this->db->insert($query);
            if ($insert_product) {
                header("Location:cart.php");
               
            } else {
                header("Location:404.php"); 
            }}
      
    }
    public function get_cart_product(){
        $sid=  session_id();
         $query="select * from cart where session_id='$sid'";
         $result = $this->db->select($query);
        return $result;
     
    }
    public function update_cart($quantity ,$cart_id){
          $quantity = $this->fm->validation($quantity);
          $cart_id = $this->fm->validation($cart_id);
          $quantity = mysqli_real_escape_string($this->db->link, $quantity);
          $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
        
      
            $query = "update cart 
                set product_qunatity='$quantity' where cart_id=$cart_id";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'> Quantity  Updated Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> <Quantity Not Updated Successfully</span>";
                return $msg;
            
        }
    }
}