<?php
include_once ('config.php');

class DB extends Config
{
    /** @var object|null $connect is the connection object when connected or null */
    private $connect = null;

    /** @var bool $is_connected is false when db connection fails or is closed */
    private bool $is_connected = false;

    /**
     * DB constructor.
     * Initializes the database connection and sets the character set to UTF-8.
     * Throws an exception if the connection fails.
     */
    public function __construct()
    {
        try {
            // Connect to database
            $this->connect = new mysqli(
                parent::DB_HOST,
                parent::DB_USER,
                parent::DB_PASS,
                parent::DB_NAME
            );
            $this->connect->set_charset("utf8");
            if ($this->connect->connect_error) {
                throw new Exception("Error while connecting to database: " . $this->connect->connect_error);
            }
            $this->is_connected = true;
        } catch (Exception $e) {
            $this->logError($e->getMessage());
        }
    }

    function get_connection()
    {
        return $this->connect;
    }

    /**
     * Checks if the database connection is successful.
     * @return bool True if the database connection is successful, false otherwise.
     */
    public function is_connected(): bool
    {
        return $this->is_connected;
    }

    /**
     * Inserts data into the specified table.
     * @param string $table The name of the table.
     * @param array $data Associative array of column names and their respective values.
     * @return bool True if the insertion is successful, false otherwise.
     */
    public function insert(string $table, array $data): bool
    {
        $columns = array_keys($data); // Retrieve column names from keys
        $values = array_values($data); // Retrieve values from keys

        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO $table (" . implode(", ", $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)";
            $query = $this->connect->prepare($sql);
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }

            $types = '';
            foreach ($values as $value) {
                if (is_int($value)) {
                    $types .= 'i';
                } elseif (is_double($value)) {
                    $types .= 'd';
                } elseif (is_string($value)) {
                    $types .= 's';
                } else {
                    $types .= 'b'; // Blob and other types
                }
            }

            $query->bind_param($types, ...$values);
            if ($query->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return false;
        }
    }

    /**
     * Updates data in the specified table.
     * @param string $table The name of the table.
     * @param array $data Associative array of column names and their respective values.
     * @param array $conditions Associative array of conditions for the update (e.g., ['id' => 1]).
     * @return bool True if the update is successful, false otherwise.
     */
    public function update(string $table, array $data, array $conditions): bool
    {
        $columns = array_keys($data); // Retrieve column names from keys
        $values = array_values($data); // Retrieve values from keys
        $setClause = implode(' = ?, ', $columns) . ' = ?';

        $conditionColumns = array_keys($conditions);
        $conditionValues = array_values($conditions);
        $conditionClause = implode(' = ? AND ', $conditionColumns) . ' = ?';

        try {
            // Prepare the SQL statement
            $sql = "UPDATE $table SET $setClause WHERE $conditionClause";
            $query = $this->connect->prepare($sql);
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }

            $types = '';
            foreach ($values as $value) {
                if (is_int($value)) {
                    $types .= 'i';
                } elseif (is_double($value)) {
                    $types .= 'd';
                } elseif (is_string($value)) {
                    $types .= 's';
                } else {
                    $types .= 'b'; // Blob and other types
                }
            }
            foreach ($conditionValues as $value) {
                if (is_int($value)) {
                    $types .= 'i';
                } elseif (is_double($value)) {
                    $types .= 'd';
                } elseif (is_string($value)) {
                    $types .= 's';
                } else {
                    $types .= 'b'; // Blob and other types
                }
            }

            $query->bind_param($types, ...array_merge($values, $conditionValues));
            if ($query->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return false;
        }
    }

    /**
     * Deletes a row from the specified table based on the unique ID.
     * @param int $unique_id The primary key in the database.
     * @param string $table_name The name of the table.
     * @return bool True if the deletion is successful, false otherwise.
     */
    public function delete(string $condition_column_name, int $unique_id, string $table_name): bool
    {
        // $column_name = $table_name . "_id";
        try {
            $query = $this->connect->prepare("DELETE FROM $table_name WHERE $condition_column_name = ?");
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }
            $query->bind_param("i", $unique_id);
            if ($query->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return false;
        }
    }

    /**
     * get all data from specific table with desc by id
     * @param string $tablename
     * @param string $unique_name
     * @return array
     */
    public function get_all_datas(string $table_name, string $unique_id): array{
        try {
            $query = $this->connect->prepare("SELECT * FROM $table_name ORDER BY $unique_id DESC");
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }
            $query->execute();
            $query = $query->get_result();
            $datas = [];
            while ($row = $query->fetch_assoc()) {
                $datas[] = $row;
            }
            return $datas;
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    public function get_data_by_id(string $table_name, int $id, string $unique_id): array{
        try {
            $query = $this->connect->prepare("SELECT * FROM $table_name WHERE $unique_id = ?");
            $query->bind_param("d", $id);
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }
            $query->execute();
            $query = $query->get_result();
            $data = $query->fetch_assoc();
            return $data ? $data: [];
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }

    public function get_data_by_unique_string(string $table_name, string $value, string $unique_s_col_name): array{
        try {
            $query = $this->connect->prepare("SELECT * FROM $table_name WHERE $unique_s_col_name = ?");
            $query->bind_param("s", $value);
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }
            $query->execute();
            $query = $query->get_result();
            $data = $query->fetch_assoc();
            return $data ? $data: [];
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }
    public function get_many(string $table_name, string $value, string $unique_s_col_name): array{
        try {
            $check_all = $value != "" ? " WHERE $unique_s_col_name = ?" : "";
            $query = $this->connect->prepare("SELECT * FROM $table_name" . $check_all);
            
            if (!$query) {
                throw new Exception("Failed to prepare SQL statement: " . $this->connect->error);
            }
            
            if ($check_all) {
                $query->bind_param('s', $value);
            }
            
            $query->execute();
            $result = $query->get_result();
            $data = [];
            
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            return $data ? $data : [];
        } catch (Exception $e) {
            $this->logError($e->getMessage());
            return [];
        }
    }
    
    /** 
     * Closes the database connection. 
     * @return void
     */
    public function close(): void
    {
        if ($this->is_connected) {
            $this->connect->close();
            $this->is_connected = false;
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

    /**
     * Destructor to ensure the database connection is closed.
     */
    public function __destruct()
    {
        $this->close();
    }
}

// Usage example
// $db = new DB();

// print_r($db->get_many('news', "d", 'date'));
// if ($db->is_connected()) {
//     $data = [
//         "username" => "DomAK",
//         "password" => "domak"
//     ];

//     $db->viewsUsers("user");
    // if ($db->update("user", $data, array("user_id"=>6, "username"=>"domak"))) {
    //     print "Inserted";
    // } else {
    //     print "Fail";
    // }
    // $db->close();
// }
// }
?>