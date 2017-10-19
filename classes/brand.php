<?php
/*
include_once '../helper/format.php';

include_once '../lib/database.php';

 * For category
 */

class brand {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new format();
    }

    public function add_brand($brand_name) {
        $brand_name = $this->fm->validation($brand_name);

        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        if (empty($brand_name)) {
            $loginmsg1 = "Brand Name must be entry";
            return $loginmsg1;
        } else {
            $query = "Insert INTO brand(brand_name) values ('$brand_name') ";
            $insert_brand = $this->db->insert($query);
            if ($insert_brand) {
                $msg = "<span class='success'> Brand name Insert Successfully</span>";
                return $msg;
                ;
            } else {
                $msg = "<span class='error'> Brand name Not Inserted</span>";
                return $msg;
            }
        }
    }

    public function get_all_brand() {
        $query = "select * from brand order by brand_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_by_id($id) {
        $query = "select * from brand where brand_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($brand_name, $id) {
        $brand_name = $this->fm->validation($brand_name);
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        if (empty($brand_name)) {
            $msg = "<span class='error'> Brand Name Must be Entry</span>";
            return $msg;
            ;
        } else {
            $query = "update brand 
                set brand_name='$brand_name' where brand_id='$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'> Brand Name Updated Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> <Brand Name Not Updated Successfully</span>";
                return $msg;
            }
        }
    }

    public function delete_brand($id) {
        $query = "delete from brand where brand_id='$id'";
        $deleted_row = $this->db->delete($query);
        if ($deleted_row) {
            $msg = "<span class='success'> Brand Deleted  Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Brand not Deleted  Successfully</span>";
            return $msg;
        }
    }

}
