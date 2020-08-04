<?php

class ActivityController{

    private $activityDao;

    public function __construct(){
        $this->activityDao = new ActivityDaoImpl();
    }

    public function index(){
        $command = filter_input(INPUT_GET, 'cmd');
        if (isset($command) && $command == 'del') {
            $cid = filter_input(INPUT_GET, 'cid');
            if (isset($cid)) {
                $activity = $this->activityDao->fetchSelectedActivityData($cid);
                unlink('uploads/' . $activity->getDocPhoto());
                $result = $this->activityDao->deleteActivity($cid);
                if ($result) {
                    echo '<div class="alert alert-success">Data successfully deleted</div>';
                } else {
                    echo '<div class="bg-danger">Delete failed</div>';
                }
            }
        }


        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitPressed)) {
            $title = filter_input(INPUT_POST, 'txtTitle');
            $description = filter_input(INPUT_POST, 'txtDescription');
            $place = filter_input(INPUT_POST, 'txtPlace');
            $end_date = filter_input(INPUT_POST, 'txtEnd_date');
            $faculty_id = filter_input(INPUT_POST, 'txtFaculty_id');
            if (isset($_FILES['activityPhoto']['name'])) {
                $targetDirectory = 'uploads/';
                $fileExtension = pathinfo($_FILES['activityPhoto']['name'], PATHINFO_EXTENSION);
                $newTitle = str_replace(' ', '_', $title);
                $newFileName = $newTitle . '.' . $fileExtension;
                $targetFile = $targetDirectory . $newFileName;
                if ($_FILES['activityPhoto']['size'] > 1024 * 2048) {
                    echo '<div class="bg-info">Upload error. File size exceed 2 MB </div>';
                } else {
                    move_uploaded_file($_FILES['activityPhoto']['tmp_name'], $targetFile);
                }
            }
            $activity = new Activity();
            $activity->setTitle($title);
            $activity->setDescription($description);
            $activity->setPlace($place);
            $activity->setEndDate($end_date);
            $activity->setFacultyId($faculty_id);
            $activity->setDocPhoto($newFileName);
            $result = $this->activityDao->addActivity($activity);
            if ($result) {
                echo '<div class="alert alert-success">Data successfully added </div>';
            } else {
                echo '<div class="bg-error">Error add data </div>';
            }
        }
        $result = $this->activityDao->fetchActivityData();
        include_once 'pages/activity_page.php';
    }

}