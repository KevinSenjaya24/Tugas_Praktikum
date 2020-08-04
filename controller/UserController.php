<?php

class UserController{

    private $userDao;

    public function __construct(){
        $this->userDao = new UserDaoImpl();
    }

    public function index(){
        $signInPressed = filter_input(INPUT_POST, 'btnSignIn');
        if ($signInPressed){
            $username = filter_input(INPUT_POST, 'txtUsername');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $md5Password = md5($password);
            $log = new User();
            $log->setUsername($username);
            $log->setPassword($md5Password);
            $result = $this->userDao->login($log);
            if ($result != null && $result->getUsername() == $username){
                $_SESSION['my_session'] = true;
                $_SESSION['session_user'] = $result->getName();
                header("location:index.php");
            } else {
                echo '<div class="bg-error">Invalid username or password</div>';
            }
        }
        include_once 'pages/login_page.php';
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }

}