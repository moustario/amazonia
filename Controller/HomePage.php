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

        public function buy_gig($data)
        {
            // check if the buyer as enough to buy
            $this->data["users"] = $this->db->get_users();
            $this->data["gigs"] = $this->db->get_gigs();
            $buyer = [];
            $seller = [];
            $product = [];
            foreach ($this->data["users"] as $key => $user) {
                if ($data["id_user"] == $user["id_user"]) {
                    $buyer = $user;
                }
            }
            foreach ($this->data["gigs"] as $key => $gig) {
                if ($data["id_gig"] == $gig["id_gig"]) {

                    $product = $gig;
                }
            }
            foreach ($this->data["users"] as $key => $user) {
                if ($product["id_user"] == $user["id_user"]) {
                    $seller = $user;
                }
            }
            if ($product["price"] > $buyer["wallet"]) {
                return " | Not enough money in wallet, <br> currently have " . $buyer["wallet"] . "€";
            }

            // substracting from buyer
            $updated_buyer = $buyer;
            $updated_buyer["wallet"] = $updated_buyer["wallet"] - $product["price"];
            $updated_buyer["type"] = "update";
            $updated_buyer["id"] = $updated_buyer["id_user"];
            $this->db->post_user($updated_buyer);

            // adding to seller
            $updated_seller = $seller;
            $updated_seller["wallet"] = $updated_seller["wallet"] + $product["price"];
            $updated_seller["type"] = "update";
            $updated_seller["id"] = $updated_seller["id_user"];
            $this->db->post_user($updated_seller);

            return $this->db->post_buy($data);
        }
    }
