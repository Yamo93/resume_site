<?php
class Education {
    private $db;
    public $education;
    function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Error case
        if ($this->db->connect_errno)
        {
        printf("Fel vid anslutning", $this->db->connect_error);
        exit();
        }
    }
    function addEducation($name, $school, $startyear, $startmonth, $ongoing, $endyear, $endmonth) {
        if (empty($name) || empty($school) || empty($startyear) || empty($startmonth)) {
            return false;
        }

        $name = strip_tags($name);
        $school = strip_tags($school);
        $startyear = strip_tags($startyear);
        $startmonth = strip_tags($startmonth);
        $ongoing = strip_tags($ongoing);
        $endyear = strip_tags($endyear);
        $endmonth = strip_tags($endmonth);

        $stmt = $this->db->prepare("INSERT INTO resume_education(name, school, startyear, startmonth, ongoing, endyear, endmonth) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsdds", $name, $school, $startyear, $startmonth, $ongoing, $endyear, $endmonth);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function getEducation() {
        $sql = "SELECT * FROM resume_education";
        if(!$result = $this->db->query($sql)){
            die('Fel vid SQL-fråga [' . $this->db->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $this->education[] = $row;
        }
        return $this->education;
    }

    function updateEducation($name, $school, $startyear, $startmonth, $ongoing, $endyear, $endmonth, $id) {
        if (empty($name) || empty($school) || empty($startyear) || empty($startmonth)) {
            return false;
        }
        
        $name = strip_tags($name);
        $school = strip_tags($school);
        $startyear = strip_tags($startyear);
        $startmonth = strip_tags($startmonth);
        $ongoing = strip_tags($ongoing);
        $endyear = strip_tags($endyear);
        $endmonth = strip_tags($endmonth);
        $id = strip_tags($id);

        $stmt = $this->db->prepare("UPDATE resume_education SET name=?, school=?, startyear=?, startmonth=?, ongoing=?, endyear=?, endmonth=? WHERE id = ?;");
        $stmt->bind_param("ssdsddsd", $name, $school, $startyear, $startmonth, $ongoing, $endyear, $endmonth, $id);
        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }
        return $result;
    }

    function deleteEducation($id) {
        $sql = "DELETE FROM resume_education WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>