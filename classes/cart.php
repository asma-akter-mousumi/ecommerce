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

    public function add_to_cart($quantity, $id) {
        $quantity = $this->fm->validation($quantity);
        $id = $this->fm->validation($id);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $session_id = session_id();
        $query = "select * from product where product_id='$id'";

        $result = $this->db->select($query)->fetch_assoc();
        $product_name = $result['product_name'];
        $product_price = $result['product_price'];
        $product_image = $result['product_image'];
        $chquery = "select * from cart where product_id=$id and session_id='$session_id'";
        $get_pro = $this->db->select($chquery);
        if ($get_pro) {
            $msg = "<span class='error'> Product Already added</span>";
            return $msg;
        } else {
            $query = "Insert into cart(session_id,product_id,product_name,product_price,product_qunatity,product_image) values('$session_id','$id','$product_name','$product_price','$quantity','$product_image')";

            $insert_product = $this->db->insert($query);
            if ($insert_product) {
                header("Location:cart.php");
            } else {
                header("Location:404.php");
            }
        }
    }

    public function get_cart_product() {
        $sid = session_id();
        $query = "select * from cart where session_id='$sid'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_cart($quantity, $cart_id) {
        $quantity = $this->fm->validation($quantity);
        $cart_id = $this->fm->validation($cart_id);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);


        $query = "update cart 
                set product_qunatity='$quantity' where cart_id=$cart_id";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
            header("Location:cart.php");
            return $msg;
        } else {
            $msg = "<span class='error'> <Quantity Not Updated Successfully</span>";
            return $msg;
        }
    }

    public function delete_cart_product($id) {
        $query = "delete from cart where cart_id='$id'";
        $deleted_row = $this->db->delete($query);
        if ($deleted_row) {
            header("Location:cart.php");
           
        } else {
            $msg = "<span class='error'> cart not Deleted  Successfully</span>";
            return $msg;
        }
    }
    public function chkdat(){
       $query = "select * from cart";
        $result = $this->db->select($query);
        return $result;  
    }
    public function del_cus_cart(){
        $sid=  session_id();
         $query="delete from cart where session_id='$sid'";
          $cart = $this->db->delete($query);
          return  $cart;
    }
   public function orderdata($id){
    $result=$this->get_cart_product();
    while ($value=$result->fetch_assoc()){
        
        $product_id=$value['product_id'];
        $product_name=$value['product_name'];
        $product_price=$value['product_price']*$value['product_qunatity'];
        $product_price=$product_price+$product_price*.1;
        $product_qunatity=$value['product_qunatity'];
        $product_image=$value['product_image'];
        $query = "Insert into order_tbl(customer_id,product_id,quantity,product_name,product_price,image)"
                . " values('$id','$product_id','$product_qunatity','$product_name','$product_price','$product_image')";
            $insert_product = $this->db->insert($query);
            if ($insert_product) {
                header("Location:cart.php");
            } else {
                header("Location:404.php");
            }
    }
}
public function payableammnt($id){
    echo session_id();
     $query = "select * from order_tbl where customer_id='$id' order by order_date desc";
     echo $query;
        $result = $this->db->select($query);
        return $result; 
    
}
public function get_order($id){
 $query = "select * from order_tbl where customer_id='$id'";
    
        $result = $this->db->select($query);
        return $result;    
}
public function getAllorderProduct(){
    $query = "select * from order_tbl order by order_date";
    
        $result = $this->db->select($query);
        return $result;   
    
}
public function product_shifted($id,$price,$date){
     $id = $this->fm->validation($id);
        $price = $this->fm->validation($price);
            $date = $this->fm->validation($date);
             $id = mysqli_real_escape_string($this->db->link, $id);
               $price = mysqli_real_escape_string($this->db->link, $price);
        $date = mysqli_real_escape_string($this->db->link, $date);
 


        $query = "update order_tbl 
                set status='1' where customer_id='$id' and product_price='$price' and order_date='$date'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
           $msg = "<span class='success'> Updated Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Not Updated Successfully</span>";
            return $msg;
        }
}
public function product_shifted_del($id,$price,$date){
    $id = mysqli_real_escape_string($this->db->link, $id);
               $price = mysqli_real_escape_string($this->db->link, $price);
        $date = mysqli_real_escape_string($this->db->link, $date);
 

  $query="delete from order_tbl where order_date='$date' and customer_id='$id' and product_price='$price'";
          $deldata = $this->db->delete($query);
          if($deldata){
           $msg = "<span class='success'> Deleted Successfully</span>";
            return $msg;   
          }
 else {
     $msg = "<span class='success'> not delete</span>";
            return $msg;
 }
}
public function product_shifted_con($id,$price,$date){
  $id = $this->fm->validation($id);
        $price = $this->fm->validation($price);
            $date = $this->fm->validation($date);
             $id = mysqli_real_escape_string($this->db->link, $id);
               $price = mysqli_real_escape_string($this->db->link, $price);
        $date = mysqli_real_escape_string($this->db->link, $date);
 


        $query = "update order_tbl 
                set status='2' where customer_id='$id' and product_price='$price' and order_date='$date'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
           $msg = "<span class='success'> Updated Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Not Updated Successfully</span>";
            return $msg;
        }  
}
public function get_comp_product($cus){
     $id = mysqli_real_escape_string($this->db->link, $cus);
      $query = "select * from compare where customer_id='$id' order by product_id desc";
     
        $result = $this->db->select($query);
        return $result; 
}
}
