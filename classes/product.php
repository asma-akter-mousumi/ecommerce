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
}

