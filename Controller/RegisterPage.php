<?php

require_once __DIR__ . "/../Model/DB.php";
require_once __DIR__ . "/Page.php";

class RegisterPage extends Page
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "\..\View\html\RegisterPage.php");
        $this->db = new DB();
    }


    public function render_view($data)
    {
        $this->data[] = [];
        parent::render_view($this->data);
    }

    public function register_user($data)
    {
        return $this->db->create_user($data);
    }
}
