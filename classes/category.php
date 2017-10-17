<?php

include_once '../helper/format.php';

include_once 'lib/database.php';
/*
 * For category
 */

class category {

    private $fm, $db;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new format();
    }

    public function add_cat($cat_name) {
        $cat_name = $this->fm->validation($cat_name);

        $cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
        if (empty($cat_name)) {
            $loginmsg1 = "category must be entry";
            return $loginmsg1;
        } else {
            $query = "Insert INTO category(cat_name) values ('$cat_name') ";
            $insert_cat = $this->db->insert($query);
            if ($insert_cat) {
                $msg = "<span class='success'> Insert Successfully</span>";
                return $msg;
                ;
            } else {
                $msg = "<span class='error'> Not Inserted</span>";
                return $msg;
            }
        }
    }

    public function get_all_cat() {
        $query = "select * from category order by cat_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_by_id($id) {
        $query = "select * from category where cat_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_cat($cat_name, $id) {
        $cat_name = $this->fm->validation($cat_name);
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
        if (empty($cat_name)) {
            $msg = "<span class='error'> <CategoryName Must be Entry</span>";
            return $msg;
            ;
        } else {
            $query = "update category 
                set cat_name='$cat_name' where cat_id=$id";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'> CategoryName Updated Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> <CategoryName Not Updated Successfully</span>";
                return $msg;
            }
        }
    }
    public function delete_cat($id){
        $query="delete from category where cat_id='$id'";
        $deleted_row = $this->db->delete($query);
        if ($deleted_row) {
                $msg = "<span class='success'> Category Deleted  Successfully</span>";
                return $msg;
            } 
 else {$msg = "<span class='error'> Category not Deleted  Successfully</span>";
                return $msg;}
            
    }

}
