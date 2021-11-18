<?php
    include_once(dirname(__FILE__) ."/../class.User.php");
    include_once(dirname(__FILE__) ."/class.Dao.php");

    class UserDao extends Dao {

        public function getUserByUsernamePassword($username, $password) {

            $stmt = $this->connection->prepare("SELECT * FROM users where username = :username and pwd = :pwd and status ='confirmed'");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pwd", $password);
            $ok = $stmt->execute();

            if (($ok) && ($stmt->rowCount() == 1)) {
                $row = $stmt->fetch();
                return $this->getUser($row);
            } else {
                return null;
            }        
        }


        public function getUserByEmail($email) {
            $stmt = $this->connection->prepare("SELECT * FROM users where email = :email");
            $stmt->bindParam(":email", $email);
            $ok = $stmt->execute();

            if (($ok) && ($stmt->rowCount() == 1)) {
                $row = $stmt->fetch();
                return $this->getUser($row);
            } else {
                return null;
            }        
        }
        

        public function getUserByUsername($username) {

            $stmt = $this->connection->prepare("SELECT * FROM users where username = :username");
            $stmt->bindParam(":username", $username);
            $ok = $stmt->execute();

            if (($ok) && ($stmt->rowCount() == 1)) {
                $row = $stmt->fetch();
                return $this->getUser($row);
            } else {
                return null;
            }        
        }


        private function getUser($row)  {           
            return new User($row["username"],$row["name"],$row["last_name"],$row["user_type"],$row["status"],$row["email"],$row["picture"]);
        }


    }

?>