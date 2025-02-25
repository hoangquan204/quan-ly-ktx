<?php
require_once "../config/database.php";
require_once "../app/models/Phong.php";

class PhongController {
    private $phong;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->phong = new Phong($db);
    }

    public function index() {
        $data = $this->phong->getAll();
        require_once "../app/views/phong/index.php";
    }
}
