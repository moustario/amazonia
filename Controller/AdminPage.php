<?php

require_once __DIR__ . "/../Model/DB.php";
require_once __DIR__ . "/Page.php";

class AdminPage extends Page
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "\..\View\html\AdminPage.php");
        $this->db = new DB();
    }


    public function render_view($data)
    {
        $this->data["users"] = $this->db->get_users();
        parent::render_view($this->data);
    }

    public function change_account($data)
    {
        $this->data["users"] = $this->db->get_users();
        $id = $data["id"];
        foreach ($this->data["users"] as $key => $user) {
            if ($id == $user["id_user"]) {
                $_SESSION["use_to_be_admin"] = $_SESSION["admin_user"];
                $_SESSION["use_to_be_admin_id"] = $_SESSION["id_user"];
                $_SESSION["id_user"] = $user["id_user"];
                $_SESSION["is_connected"] = true;
                $_SESSION["name"] = $user["name"];
                $_SESSION["user_index"] = $key;
                $_SESSION["admin_user"] = $user["admin_user"];
                return " | Logged as " . $_SESSION["name"];
            }
        }
        return " | User with id " . $id . " not found";
    }
}
