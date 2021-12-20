 <?php

    require_once __DIR__ . "/../Model/DB.php";
    require_once __DIR__ . "/Page.php";

    class HomePage extends Page
    {
        private array $data;
        private $db;

        public function __construct()
        {
            parent::__construct(__DIR__ . "\..\View\html\HomePage.php");
            $this->db = new DB();
        }


        public function render_view($data)
        {
            $this->data["users"] = $this->db->get_users();
            $this->data["gigs"] = $this->db->get_gigs();
            parent::render_view($this->data);
        }
    }
