<?php   
    include_once("model/dao/class.UserDao.php");
    include_once("lib/Validator.php");
    include_once("exceptions/class.ValidationException.php");

    class UserController {

        private $userDao;

        function __construct($userDao) {
            $this-> userDao = $userDao;
        }


        public function existsEmail($email) {
            $user = $this->userDao->getUserByEmail($email);
            return (isset($user));
        }

        public function login($username, $password) {


            $validator = new Validator(array(
                    "username"=>$username,
                    "pwd"=> $password
            ));
            $validator->required("You must supply an username")->validate("username","username");
            $validator->required("You must supply an password")->validate("pwd","pwd");

            
            if ($validator->hasErrors()) {
                throw new ValidationException($validator->getAllErrors());
            } else {                            
                $user =   $this-> userDao->getUserByUsernamePassword($username, $password);
                if ($user!=null) {
                    return $user;
                } else {
                    throw new ValidationException(array("pwd"=>"Username and password combination does not exists"));
                }
        }

    }
}