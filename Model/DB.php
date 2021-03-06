<?php

class db
{
    private $host = 'localhost';
    private $db = 'postgres';
    private $user = 'amazonia';
    private $password = 'amazonia';

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $dsn = "pgsql:host=$this->host;port=5432;dbname=$this->db;";
            // make a database connection
            $this->pdo = new PDO($dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get_users()
    {
        if ($this->pdo == null) return;

        $sql = "SELECT * FROM public.\"user\" ORDER BY id_user ASC";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);


        return $rows;
    }


    public function get_gigs()
    {
        if ($this->pdo == null) return;

        $sql = "SELECT * FROM public.\"gig\" INNER JOIN public.\"user\" ON public.\"gig\".id_user = public.\"user\".id_user ORDER BY id_gig ASC";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function get_buying_history($id_user)
    {
        $sql = "SELECT buy.id_user AS buyer, timestamp_buy, gig.id_gig, gig.price, description_gig, category_gig, gig.id_user AS author FROM buy 
	        INNER JOIN gig 
		        ON gig.id_gig = buy.id_gig 
	        WHERE buy.id_user = {$id_user}";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function get_sell_history($id_user)
    {
        $sql = "SELECT buy.id_user AS buyer, timestamp_buy, gig.id_gig, gig.price, description_gig, category_gig, gig.id_user AS author FROM buy 
	        INNER JOIN gig 
		        ON gig.id_gig = buy.id_gig 
            WHERE buy.id_gig in (SELECT gig.id_gig from gig where gig.id_user = {$id_user})";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function post_buy($data)
    {
        if ($data["type"] == "create") {
            error_log(implode(",", $data));
            $data["timestamp_buy"] = date("Y-m-d H:i:s");
            $sql = "INSERT INTO public.buy(id_gig, id_user, timestamp_buy)
                VALUES ('{$data["id_gig"]}', '{$data["id_user"]}', '{$data["timestamp_buy"]}')";
            $statement = $this->pdo->query($sql);
            return " | Gig purchased complete.";
        } else {
            return " | Unsuported operation {$data["type"]}";
        }
    }

    public function post_user($data)
    {
        error_log('Post user');
        if ($data["type"] == "create") {
            error_log(implode(",", $data));
            $id = count($this->get_users()) + 1;
            $sql = "INSERT INTO public.\"user\"(id_user, \"name\", password, wallet)
                VALUES ({$id}, '{$data["name"]}', '{$data["password"]}', {$data["wallet"]})";
            $statement = $this->pdo->query($sql);
            return " | User creation complete.";
        }
        if ($data["type"] == "update") {
            error_log(implode(",", $data));
            $id = count($this->get_users()) + 1;
            $sql = "UPDATE public.\"user\"
                SET \"name\"='{$data["name"]}', \"password\"='{$data["password"]}', wallet={$data["wallet"]}
                WHERE id_user={$data["id"]}";
            $statement = $this->pdo->query($sql);
            return " | User updated.";
        } else {
            return " | Unsuported operation {$data["type"]}";
        }
    }

    public function post_gig($data)
    {
        error_log('Post gig');
        if ($data["type"] == "create") {
            error_log(implode(",", $data));
            $id = count($this->get_gigs()) + 1;
            $sql = "INSERT INTO public.\"gig\"(id_gig, price, description_gig, category_gig, id_user)
                VALUES ({$id}, '{$data["price"]}', '{$data["description"]}', '{$data["category"]}', {$data["id_user"]})";
            $statement = $this->pdo->query($sql);
            return " | Gig creation complete.";
        }
        if ($data["type"] == "update") {
            error_log(implode(",", $data));
            $id = count($this->get_users()) + 1;
            $sql = "UPDATE public.\"gig\"
                SET \"price\"={$data["price"]}, description_gig='{$data["description"]}', category_gig='{$data["category"]}'
                WHERE id_gig={$data["id_gig"]}";
            $statement = $this->pdo->query($sql);
            return " | Gig updated.";
        }
        if ($data["type"] == "delete") {
            error_log(implode(",", $data));
            $sql = "DELETE FROM public.gig
                WHERE id_gig={$data["id_gig"]}";
            $statement = $this->pdo->query($sql);
            return " | Gig deleted.";
        } else {
            return " | Unsuported operation {$data["type"]}";
        }
    }

    public function check_user($data)
    {
        error_log('Check user');
        error_log(implode(",", $data));
        $sql = "SELECT password FROM public.\"user\" WHERE \"name\" = '{$data["name"]}' ORDER BY id_user ASC";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $valid = ($rows[0] = $data["password"]) ? "Connecting user." : "Unknown user.";
        return " | " . $valid;
    }
}
