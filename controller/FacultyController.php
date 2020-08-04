<?php

class FacultyController{

    private $facultyDao;

    public function __construct(){
        $this->facultyDao = new FacultyDaoImpl();
    }

    public function index(){
        $command = filter_input(INPUT_GET, 'cmd');
        if (isset($command) && $command == 'del') {
            $cid = filter_input(INPUT_GET, 'cid');
            if (isset($cid)) {
                $result = $this->facultyDao->deleteFaculty($cid);
                if ($result) {
                    echo '<div class="alert alert-success">Data successfully deleted </div>';
                } else {
                    echo '<div class="bg-danger">Error delete data </div>';
                }
            }
        }


        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitPressed)) {
            $id = filter_input(INPUT_POST, 'txtId');
            $name = filter_input(INPUT_POST, 'txtName');
            $faculty = new Faculty();
            $faculty->setId($id);
            $faculty->setName($name);
            $result = $this->facultyDao->addFaculty($faculty);
            if ($result) {
                echo '<div class="alert alert-success">Data successfully added (Faculty:'. " " . $id . " " . $name . ')</div>';
            } else {
                echo '<div class="bg-error">Error add data </div>';
            }
        }
        $result = $this->facultyDao->fetchFacultyData();
        include_once 'pages/faculty_page.php';
    }

}