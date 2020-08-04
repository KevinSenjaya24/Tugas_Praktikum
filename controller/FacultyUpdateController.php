<?php

class FacultyUpdateController{

    private $facultyDao;

    public function __construct(){
        $this->facultyDao = new FacultyDaoImpl();
    }

    public function index(){
        $id = filter_input(INPUT_GET, 'cid');
        if(isset($id)){
            $faculty = $this->facultyDao->fetchSelectedFacultyData($id);
        }


        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if(isset($submitPressed)){
            $id = filter_input(INPUT_POST, 'txtId');
            $name = filter_input(INPUT_POST, 'txtName');
            $updatedFaculty = new Faculty();
            $updatedFaculty->setId($id);
            $updatedFaculty->setName($name);
            $result = $this->facultyDao->updateFaculty($updatedFaculty, $faculty->getId());
            if ($result) {
                header('location:index.php?menu=fac');
                echo '<div class="alert alert-success">Data successfully updated (Faculty:' . $id . $name . ')</div>';
            } else {
                echo '<div class="bg-info">Error update faculty data </div>';
            }
        }
        include_once 'pages/faculty_update_page.php';
    }

}