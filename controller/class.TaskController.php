<?php   
    include_once(dirname(__FILE__) ."/../model/dao/class.TaskDao.php");
    include_once(dirname(__FILE__) ."/../lib/Validator.php");
    include_once(dirname(__FILE__) ."/../exceptions/class.ValidationException.php");

    class TaskController {

        private $taskDao;

        function __construct($taskDao) {
            $this-> taskDao = $taskDao;
        }
        public function getTasksAssignedToUser($username) {
                return $this-> taskDao->getTaskAssignedToUser($username);
        }
        public function getTaskById($id) {
            return $this->taskDao->getTaskById($id);
        }
        public function delete($id) {
            $this->taskDao->delete($id);
        }

        public function add($task) {
            return $this->taskDao->add($task);
        }

    }