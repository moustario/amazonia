<?php

require_once __DIR__ . "/../Model/DB.php";
require_once __DIR__ . "/Page.php";

class ProfilePage extends Page
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "\..\View\html\ProfilePage.php");
        $this->db = new DB();
    }


    public function render_view($data)
    {
        $this->data["users"] = $this->db->get_users();
        $this->data["gigs"] = [];
        $all_gigs = $this->db->get_gigs();
        foreach ($all_gigs as $key => $gig) {
            if ($gig["id_user"] == $_SESSION["user_index"] + 1) {
                array_push($this->data["gigs"], $gig);
            }
        }
        $this->data["buying_history"] = $this->db->get_buying_history($_SESSION["user_index"] + 1);
        $this->data["sell_history"] = $this->db->get_sell_history($_SESSION["user_index"] + 1);
        parent::render_view($this->data);
    }

    public function disconnect_user($data)
    {
        session_destroy();
        return " | User disconnected.";
    }

    public function update_user($data)
    {
        $status = $this->db->post_user($data);
        $this->data["users"] = $this->db->get_users();
        return $status;
    }

    public function update_gig($data)
    {
        return $this->db->post_gig($data);
    }
}
