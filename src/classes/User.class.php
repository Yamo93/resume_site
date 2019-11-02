<?php
    class User {
        function __construct() {
            $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);
            // Error case
            if ($this->db->connect_errno)
            {
            printf("Fel vid anslutning", $this->db->connect_error);
            exit();
            }
        }

        function loginUser($username, $password) {
            $username = $this->db->real_escape_string($username);
            $password = $this->db->real_escape_string($password);
            $stmt = $this->db->prepare("SELECT username, password FROM resume_users WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if($row['username'] == $username && $row['password'] == $password) {
                return true;
            } else {
                return false;
            }
        }

        function getUserID($username) {
            $sql = "SELECT id FROM resume_users WHERE username = '$username';";
            $result = $this->db->query($sql);
            $result = $result->fetch_assoc();
            return $result['id'];
        }
    }
?>