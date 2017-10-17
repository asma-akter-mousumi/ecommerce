<?php

include_once '../helper/format.php';

include_once 'lib/database.php';
/*
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
      $query="Insert into product(product_name,cat_id,brand_id,product_des,product_price,product_image,product_type) values('$product_name','$cat_id','$brand_id','$product_des','$product_price','$uploaded_image','$product_type')";
     
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
 public function getall(){
     $query = "select product.*,category.cat_name,brand.brand_name from product inner join category on product.cat_id=category.cat_id inner join brand on product.brand_id=brand.brand_id order by product.product_id desc";
      $result = $this->db->select($query);
        return $result;
 }
    

}
