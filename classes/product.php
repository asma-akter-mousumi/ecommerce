<?php

/*
  include_once '../helper/format.php';

  include_once '../lib/database.php';

 * For category
 */

class product {

    private $fm, $db;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new format();
    }

    public function add_product($data, $file) {

        // var_dump($data);
        $product_name = $this->fm->validation($data['product_name']);
        $cat_id = $this->fm->validation($data['cat_id']);
        $brand_id = $this->fm->validation($data['brand_id']);

        $product_price = $this->fm->validation($data['product_price']);
        $product_type = $this->fm->validation($data['product_type']);
        $product_name = mysqli_real_escape_string($this->db->link, $product_name);
        $cat_id = mysqli_real_escape_string($this->db->link, $cat_id);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
        $product_des = mysqli_real_escape_string($this->db->link, $data['product_des']);
        $product_price = mysqli_real_escape_string($this->db->link, $product_price);
        $product_type = mysqli_real_escape_string($this->db->link, $product_type);
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['product_image']['name'];
        $file_size = $file['product_image']['size'];
        $file_temp = $file['product_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;




        move_uploaded_file($file_temp, $uploaded_image);
        $query = "Insert into product(product_name,cat_id,brand_id,product_des,product_price,product_image,product_type) values('$product_name','$cat_id','$brand_id','$product_des','$product_price','$uploaded_image','$product_type')";

        $insert_product = $this->db->insert($query);
        if ($insert_product) {
            $msg = "<span class='success'> Insert Successfully</span>";
            return $msg;
            ;
        } else {
            $msg = "<span class='error'> Not Inserted</span>";
            return $msg;
        }
    }

    public function update_product($data, $file, $product_id) {
        $product_name = $this->fm->validation($data['product_name']);
        $cat_id = $this->fm->validation($data['cat_id']);
        $brand_id = $this->fm->validation($data['brand_id']);

        $product_price = $this->fm->validation($data['product_price']);
        $product_type = $this->fm->validation($data['product_type']);
        $product_name = mysqli_real_escape_string($this->db->link, $product_name);
        $cat_id = mysqli_real_escape_string($this->db->link, $cat_id);
        $brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
        $product_des = mysqli_real_escape_string($this->db->link, $data['product_des']);
        $product_price = mysqli_real_escape_string($this->db->link, $product_price);
        $product_type = mysqli_real_escape_string($this->db->link, $product_type);
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['product_image']['name'];
        $file_size = $file['product_image']['size'];
        $file_temp = $file['product_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;




        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE  product set product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',product_des='$product_des',"
                . "product_price='$product_price',product_image='$uploaded_image',product_type='$product_type' where product_id=$product_id";


        $update_product = $this->db->update($query);
        if ($update_product) {
            $msg = "<span class='success'> Update Successfully</span>";
            return $msg;
            ;
        } else {
            $msg = "<span class='error'> Not Update</span>";
            return $msg;
        }
    }

    public function getall() {
        $query = "select product.*,category.cat_name,brand.brand_name from product inner join category on product.cat_id=category.cat_id inner join brand on product.brand_id=brand.brand_id order by product.product_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_by_id($id) {
        $query = "select * from product where product_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_product($id) {
        $query = "delete from product where product_id='$id'";
        $deleted_row = $this->db->delete($query);
        if ($deleted_row) {
            $msg = "<span class='success'> Product Deleted  Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Product not Deleted  Successfully</span>";
            return $msg;
        }
    }

    public function get_pro_cat($id) {
        $query = "select * from product where cat_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_feature_product() {
        $query = "select * from product where product_type='0' order by product_id desc limit 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_new_product() {
        $query = "select * from product order by product_id desc limit 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_by_id($id) {
        $query = "select p.*,c.cat_name,b.brand_name from product as p ,category as c,brand as b  where "
                . "p.cat_id=c.cat_id and p.brand_id=b.brand_id and p.product_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestiphone() {
        $query = "select * from product where brand_id='4' order by product_id desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestsamsong() {
        $query = "select * from product where brand_id='2' order by product_id desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestacer() {
        $query = "select * from product where brand_id='1' order by product_id desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestcanon() {
        $query = "select * from product where brand_id='3' order by product_id desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function inserdata($cus, $cmp) {
        $cus = mysqli_real_escape_string($this->db->link, $cus);
        $cmp = mysqli_real_escape_string($this->db->link, $cmp);
        //echo $cus;
       $query_cmp = "select * from compare where customer_id='$cus' and product_id='$cmp'";
     // echo $query_cmp;
       $result_cmp = $this->db->select($query_cmp);
       if( $result_cmp){
        $msg = "<span class='error'> Already Product Added </span>";
            return $msg;    
       }
       
       
       
        $query = "select * from product where product_id='$cmp'";
     
        $result = $this->db->select($query)->fetch_assoc();
        if ($result) {
             $product_id = $result['product_id'];
            $product_name = $result['product_name'];
            $product_price = $result['product_price'];
            $product_image = $result['product_image'];
            $query = "Insert into compare(customer_id,product_id,product_name,price,image) values('$cus','$product_id','$product_name','$product_price','$product_image')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
            $msg = "<span class='success'> Product Added to compare</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Product not Added to compare</span>";
            return $msg;
        }
        }
    }
    public function delcom($login){
      $query = "delete from compare where customer_id='$login'";
        $deleted_row = $this->db->delete($query);
        
    }
    public function savewishlist($id,$customerid){
        $query_cmp = "select * from wlist where cmrid='$customerid' and product_id='$id'";
     // echo $query_cmp;
       $result_cmp = $this->db->select($query_cmp);
       if( $result_cmp){
        $msg = "<span class='error'> Product  Already Added to Wish List </span>";
            return $msg;    
       }
        $query="select * from product where product_id='$id'";
        
         $result=$this->db->select($query);
    while ($value=$result->fetch_assoc()){
        
        $product_id=$value['product_id'];
        $product_name=$value['product_name'];
      
        $product_price=$value['product_price'];
 
        $product_image=$value['product_image'];
        $query = "Insert into wlist(cmrid,product_id,product_name,product_price,product_image)"
                . " values('$customerid','$product_id','$product_name','$product_price','$product_image')";
            $insert_product = $this->db->insert($query);
            if ($insert_product) {
            $msg = "<span class='success'> Product Added to Wish List</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Product not Added to Wish List</span>";
            return $msg;
        }
    }
    }
    public function get_wish_product($cmrid){
       $query="select * from wlist where cmrid='$cmrid'";
        
         $result=$this->db->select($query); 
         return $result;
    }
    public function delete_wlist_product($cmrid,$id){
     
       $query = "delete from wlist where product_id='$id' and cmrid='$cmrid'";

        $deleted_row = $this->db->delete($query); 
    }
}
