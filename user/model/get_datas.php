<?php
include_once(__DIR__."/db.php");

class GetDatas extends DB
{
    private $table_name = "";
    private $connect = null;
    public function __construct($table_name)
    {
        parent::__construct();
        $this->table_name = $table_name;
        try {
            if (parent::is_connected()) {
                $this->connect = parent::get_connection();
            }
        }catch (Exception $e) {
            $this->logError($e->getMessage());
        }
    }


    function get_data_by_vehicle_number(string $license): array
    {
        try {
            $sql = $this->connect->prepare("SELECT * FROM " . $this->table_name . " WHERE vehicle_number = ?");
            $sql->bind_param("s", $license);
            $sql->execute();
            $result = $sql->get_result();
            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            }
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            echo "" . $e->getMessage();
            return [];
        }
        return [];
    }

    public function get_user_by_email(string $email): array{
        try {
            $sql = "SELECT * FROM ". $this->table_name ." WHERE email = ?";
            $result = $this->connect->prepare($sql);
            $result->bind_param("s", $email);
            $result->execute();
            $result = $result->get_result();
            $user = $result->fetch_assoc();
            return $user ? $user : [];
        }catch(Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }
    public function get_user(string $email, string $password): array{
        try {
            $sql = "SELECT * FROM ". $this->table_name ." WHERE email = ? AND password = ?";
            $result = $this->connect->prepare($sql);
            $result->bind_param("ss", $email, $password);
            $result->execute();
            $result = $result->get_result();
            $user = $result->fetch_assoc();
            return $user ? $user : [];
        }catch(Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    public function get_reviews(): array{
        try {
            $sql = "SELECT user.username, review.* FROM " . $this->table_name . " 
            JOIN user ON review.user_id = user.user_id";
            $result = $this->connect->prepare($sql);
            $result->execute();
            $result = $result->get_result();
            $reviews = [];
            while($row = $result->fetch_assoc()) {
                $reviews[] = $row;
            }
            return $reviews;
        }catch(Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    public function getNews(): array{
        try {
            $sql = "SELECT * FROM ". $this->table_name ." ORDER BY news_id DESC";
            $result = $this->connect->query($sql);
            $news = [];
            while ($row = $result->fetch_assoc()) {
                $news[] = $row;
            }
            return $news;
        }catch(Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    public function get_news_by_id(int $news_id): array{
        try{
            $sql = "SELECT * FROM ". $this->table_name ." WHERE news_id = ?";
            $result = $this->connect->prepare($sql);
            $result->bind_param("d", $news_id);
            $result->execute();
            $result = $result->get_result();
            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            }
            return [];
        }catch(Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    /** 
     * Logs error messages to a file.
     * @param string $message The error message to log.
     * @return void
     */
    private function logError(string $message): void
    {
        // Simple error logging - you can expand this to use a logging library
        file_put_contents('error_log.txt', date("l jS \of F Y h:i:s A") . ": " . $message . PHP_EOL, FILE_APPEND);
    }


}

// $view = new GetDatas("review");
// print_r($view->get_reviews());

?>