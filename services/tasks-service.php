<?php
    error_reporting(0);
    include_once("../config.php");
    include_once("model/class.Task.php");
    $action = $_SERVER["REQUEST_METHOD"];
    header('Content-type: application/json');
    switch($action) {
        case "GET" : 
            if  (  (isset($_GET["id"])) || (isset($_GET["assigned_user"]) ) ) {
                if (isset($_GET["id"])) {
                    $task = $taskController->getTaskById($_GET["id"]);
                    if ($task) { 
                        echo json_encode($task);
                    } else {
                        http_response_code(404);
                    }
                    exit;
                }

                if (isset($_GET["assigned_user"])) {
                    $tasks = $taskController->getTasksAssignedToUser($_GET["assigned_user"]);
                    http_response_code(count($tasks)==0?204:200);
                    echo json_encode($tasks);
                }                 
            } else {
                $o = new stdClass();
                $o->error = "Missing required parameters";
                http_response_code(400);
                echo json_encode($o);
            }
        break;
        case "DELETE" : 
            if (isset($_GET["id"])) {
                    $taskController->delete($_GET["id"]);
                    http_response_code(200);    
            } else {
                $o = new stdClass();
                $o->error = "Missing required parameters";
                http_response_code(400);
                echo json_encode($o);
            }
        break;
        case "POST" :        
            $input = json_decode(file_get_contents('php://input'), true);
            $task = new Task(null, $input["assigned_user"], $input["creator_user"], $input["status"], $input["title"], $input["description"], $input["due_date"], null);
            $task = $taskController->add($task);
            header('location: http://localhost/tasks/tasks-service.php?id='. $task->get("id"));
            http_response_code(201);    
            echo json_encode($task);
       break;
    }


    