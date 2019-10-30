<?php
    // Importing classes and instantiation of object
    session_start();
    function my_autoloader($class) {
        include '../classes/' . $class . '.class.php';
    }
    /* Lokal utveckling */
    define("DB_HOST", 'localhost');
    define("DB_USERNAME", 'yamo93');
    define("DB_PASSWORD", '12345');
    define("DB_NAME", 'resume_site');
    spl_autoload_register('my_autoloader');
    include_once('../php/properties.php');

    $project = new Project();
    // API initialization
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');
    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($method) {
        case "GET":
        $response = $project->getProjects();
            if(sizeof($response) > 0) {
                http_response_code(200);
            } else {
                $response = ['message' => 'Inget projekt hittades.', 'class' => 'project-alert-danger'];
            }
            break;
        case "POST":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att skapa nytt projekt.', 'class' => 'project-alert-danger'];
                break;
            }

            if ($project->addProject($input['title'], $input['link'], $input['description'])) {
                http_response_code(200);
                $response = ['message' => 'Projekt tillagt.', 'class' => 'project-alert-success'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid tillägg av projekt.', 'class' => 'project-alert-danger'];
            }
            break;
        case "PUT":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att uppdatera ett projekt.', 'class' => 'project-alert-danger'];
                break;
            }

            if ($project->updateProject($input['title'], $input['link'], $input['description'], $input['id'])) {
                http_response_code(200);
                $response = ['message' => 'Projekt uppdaterat.', 'class' => 'project-alert-success'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid uppdatering av projekt.', 'class' => 'project-alert-danger'];
            }
            break;
        case "DELETE":
            if(!isset($_SESSION['username'])) {
                $response = ['message' => 'Du har ingen behörighet att radera ett projekt.', 'class' => 'project-alert-danger'];
                break;
            }

            if ($project->deleteProject($input['id'])) {
                http_response_code(200);
                $response = ['message' => 'Projekt raderat.', 'class' => 'project-alert-danger'];
            } else {
                http_response_code(500);
                $response = ['message' => 'Fel vid radering av projekt.', 'class' => 'project-alert-danger'];
            }
            break;
        default:
            // Code
            break;
    }
    echo json_encode($response);
?>