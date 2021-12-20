<?php

require_once __DIR__ . "/../Model/DB.php";
require_once __DIR__ . "/Page.php";

class LoginPage extends Page
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "\..\View\html\LoginPage.php");
        $this->db = new DB();
    }


    public function render_view($data)
    {
        $this->data["users"] = $this->db->get_users();
        parent::render_view($this->data);
    }

    public function check_user($data)
    {
        $user_exists = $this->db->check_user($data);
        if ($user_exists == " | " . "Connecting user.") {
            $_SESSION["is_connected"] = true;
            $_SESSION["name"] = $data["name"];
            $all_users = $this->db->get_users();
            foreach ($all_users as $key => $value) {
                if ($value["name"] == $data["name"])
                    $_SESSION["user_index"] = $key;
            }
        }
        return $user_exists;
    }
}
