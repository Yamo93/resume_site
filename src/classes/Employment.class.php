<?php
class Employment {
    private $db;
    public $employments;
    function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Error case
        if ($this->db->connect_errno)
        {
        printf("Fel vid anslutning", $this->db->connect_error);
        exit();
        }
    }
    function addEmployment($title, $place, $startyear, $startmonth, $ongoing, $endyear, $endmonth) {
        if (empty($title) || empty($place) || empty($startyear) || empty($startmonth)) {
            return false;
        }

        $title = strip_tags($title);
        $place = strip_tags($place);
        $startyear = strip_tags($startyear);
        $startmonth = strip_tags($startmonth);
        $ongoing = strip_tags($ongoing);
        $endyear = strip_tags($endyear);
        $endmonth = strip_tags($endmonth);

        $stmt = $this->db->prepare("INSERT INTO resume_employments(title, place, startyear, startmonth, ongoing, endyear, endmonth) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsdds", $title, $place, $startyear, $startmonth, $ongoing, $endyear, $endmonth);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function getEmployments() {
        $sql = "SELECT * FROM resume_employments";
        if(!$result = $this->db->query($sql)){
            die('Fel vid SQL-fråga [' . $this->db->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $this->employments[] = $row;
        }
        return $this->employments;
    }

    function updateEmployment($title, $place, $startyear, $startmonth, $ongoing, $endyear, $endmonth, $id) {
        if (empty($title) || empty($place) || empty($startyear) || empty($startmonth)) {
            return false;
        }
        
        $title = strip_tags($title);
        $place = strip_tags($place);
        $startyear = strip_tags($startyear);
        $startmonth = strip_tags($startmonth);
        $ongoing = strip_tags($ongoing);
        $endyear = strip_tags($endyear);
        $endmonth = strip_tags($endmonth);
        $id = strip_tags($id);

        $stmt = $this->db->prepare("UPDATE resume_employments SET title=?, place=?, startyear=?, startmonth=?, ongoing=?, endyear=?, endmonth=? WHERE id = ?;");
        $stmt->bind_param("ssdsddsd", $title, $place, $startyear, $startmonth, $ongoing, $endyear, $endmonth, $id);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function deleteEmployment($id) {
        $sql = "DELETE FROM resume_employments WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>