<?php   
    include_once("model/dao/class.TaskDao.php");
    include_once("lib/Validator.php");
    include_once("exceptions/class.ValidationException.php");

    class TaskController {

        private $taskDao;

        function __construct($taskDao) {
            $this-> taskDao = $taskDao;
        }

        public function getTasksAssignedToUser($username) {
                return $this-> taskDao->getTaskAssignedToUser($username);
        }
}