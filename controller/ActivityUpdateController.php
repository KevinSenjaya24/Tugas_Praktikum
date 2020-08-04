<?php

class ActivityUpdateController{

    private $activityDao;

    public function __construct(){
        $this->activityDao = new ActivityDaoImpl();
    }

    public function index(){
        $id = filter_input(INPUT_GET, 'cid');
        if (isset($id)) {
            $result = $this->activityDao->fetchSelectedActivityData($id);
        }


        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitPressed)) {
            $title = filter_input(INPUT_POST, 'txtTitle');
            $description = filter_input(INPUT_POST, 'txtDescription');
            $place = filter_input(INPUT_POST, 'txtPlace');
            $end_date = filter_input(INPUT_POST, 'txtEnd_date');
            if ($_FILES['activityPhoto']['name'] == "") {
                $newFileName = $result->getDocPhoto();
            } else {
                unlink('uploads/' . $result->getDocPhoto());
                $targetDirectory = 'uploads/';
                $fileExtension = pathinfo($_FILES['activityPhoto']['name'], PATHINFO_EXTENSION);
                $newFileName = $id . '-' . $fileExtension;
                $targetFile = $targetDirectory . $newFileName;
                if ($_FILES['activityPhoto']['size'] > 1024 * 2048) {
                    echo '<div class="bg-info">Upload error. File size exceed 2 MB </div>';
                } else {
                    move_uploaded_file($_FILES['activityPhoto']['tmp_name'], $targetFile);
                }
            }
            $faculty_id = filter_input(INPUT_POST, 'txtFaculty_id');
            $updatedActivity = new Activity();
            $updatedActivity->setId($result->getId());
            $updatedActivity->setTitle($title);
            $updatedActivity->setDescription($description);
            $updatedActivity->setPlace($place);
            $updatedActivity->setEndDate($end_date);
            $updatedActivity->setFacultyId($faculty_id);
            $updatedActivity->setDocPhoto($newFileName);
            $result = $this->activityDao->updateActivity($updatedActivity);
            if ($result) {
                header("location:index.php?menu=act");
            } else {
                echo '<div class="bg-info">Error update Activity data</div>';
            }
        }
        include_once 'pages/activity_update_page.php';
    }

}