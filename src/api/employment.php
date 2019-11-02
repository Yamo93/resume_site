<?php
    // Importing classes and instantiation of object
    session_start();
    function my_autoloader($class) {
        include '../classes/' . $class . '.class.php';
    }
    /* Lokal utveckling */
    // define("DB_HOST", 'localhost');
    // define("DB_USERNAME", 'yamo93');
    // define("DB_PASSWORD", '12345');
    // define("DB_NAME", 'resume_site');
    spl_autoload_register('my_autoloader');
    include_once('../php/properties.php');

    $employment = new Employment();
    // API initialization
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');
    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($method) {
        case "GET":
        $response = $employment->getEmployments();
            if(sizeof($response) > 0) {
                http_response_code(200);
            } else {
                $response = ['message' => 'Ingen anställning hittades.', 'class' => 'employment-alert-danger'];
            }
            break;
        case "POST":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att skapa ny anställning.', 'class' => 'employment-alert-danger'];
                break;
            }

            if ($employment->addEmployment($input['title'], $input['place'], $input['startyear'], $input['startmonth'], $input['ongoing'], $input['endyear'], $input['endmonth'])) {
                http_response_code(200);
                $response = ['message' => 'Anställning tillagd.', 'class' => 'employment-alert-success'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid tillägg av anställning.', 'class' => 'employment-alert-danger'];
            }
            break;
        case "PUT":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att uppdatera en anställning.', 'class' => 'employment-alert-danger'];
                break;
            }

            if ($employment->updateEmployment($input['title'], $input['place'], $input['startyear'], $input['startmonth'], $input['ongoing'], $input['endyear'], $input['endmonth'], $input['id'])) {
                http_response_code(200);
                $response = ['message' => 'Anställning uppdaterad.', 'class' => 'employment-alert-success'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid uppdatering av anställning.', 'class' => 'employment-alert-danger'];
            }
            break;
        case "DELETE":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att radera en anställning.', 'class' => 'employment-alert-danger'];
                break;
            }

            if ($employment->deleteEmployment($input['id'])) {
                http_response_code(200);
                $response = ['message' => 'Anställning raderad.', 'class' => 'employment-alert-danger'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid radering av anställning.', 'class' => 'employment-alert-danger'];
            }
            break;
        default:
            // Code
            break;
    }
    echo json_encode($response);
?>