<?php

    include_once("model/dao/class.Dao.php");
    include_once("model/dao/class.UserDao.php");
    include_once("model/class.Task.php");

    class TaskDao extends Dao {
        private $userDao;
        // Constructor
        public function __construct($conn, $userDao){
            parent::__construct($conn);
            $this->userDao =  $userDao;            
        }

        public function getTaskAssignedToUser($username) {

           $sql = "SELECT 
                    t.id_task,
                    s.status_name AS status,
                    s.id_status,
                    t.title,
                    t.description,
                    t.due_date,
                    t.last_update,
                    cu.username as creation_username,
                    au.username as assigned_username
                FROM 
                    tasks t 
                    INNER JOIN status s ON t.id_status = s.id_status
                    INNER JOIN users cu ON t.creation_user = cu.username
                    INNER JOIN users au ON t.assigned_user = au.username
                WHERE 
                    t.assigned_user = :username";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam("username", $username);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $tasks = array();
            foreach ($rows as $row) { 
                $task = $this->getTask($row);
                array_push($tasks,$task);
            }            
            return $tasks;
            
        }


        private function getTask($row) {           
            return new Task(
            $row["id_task"] , 
            $this->userDao->getUserByUsername($row["assigned_username"]), 
            $this->userDao->getUserByUsername($row["creation_username"]), 
            $row["status"], 
            $row["title"], 
            $row["description"], 
            $row["due_date"], 
            $row["last_update"]);
        }


    }

?>