<?php
class Project {
    private $db;
    public $projects;
    function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Error case
        if ($this->db->connect_errno)
        {
        printf("Fel vid anslutning", $this->db->connect_error);
        exit();
        }
    }
    function addProject($title, $link, $description) {
        if (empty($title) || empty($link) || empty($description)) {
            return false;
        }

        $title = strip_tags($title);
        $link = strip_tags($link);
        $description = strip_tags($description);

        $stmt = $this->db->prepare("INSERT INTO resume_projects(title, link, description) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $title, $link, $description);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function getProjects() {
        $sql = "SELECT * FROM resume_projects";
        if(!$result = $this->db->query($sql)){
            die('Fel vid SQL-fråga [' . $this->db->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $this->projects[] = $row;
        }
        return $this->projects;
    }

    function updateProject($title, $link, $description, $id) {
        if (empty($title) || empty($link) || empty($description)) {
            return false;
        }
        
        $title = strip_tags($title);
        $link = strip_tags($link);
        $description = strip_tags($description);
        $id = strip_tags($id);

        $stmt = $this->db->prepare("UPDATE resume_projects SET title=?, link=?, description=? WHERE id = ?;");
        $stmt->bind_param("sssd", $title, $link, $description, $id);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function deleteProject($id) {
        $sql = "DELETE FROM resume_projects WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>