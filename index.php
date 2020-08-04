<?php
session_start();
include_once 'util/PDOUtil.php';
include_once 'dao/ActivityDaoImpl.php';
include_once 'entity/Activity.php';
include_once 'dao/FacultyDaoImpl.php';
include_once 'entity/Faculty.php';
include_once 'dao/UserDaoImpl.php';
include_once 'entity/User.php';
include_once 'controller/UserController.php';
include_once 'controller/FacultyController.php';
include_once 'controller/FacultyUpdateController.php';
include_once 'controller/ActivityController.php';
include_once 'controller/ActivityUpdateController.php';

if (!isset($_SESSION['my_session'])) {
    $_SESSION['my_session'] = false;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content=" ">
    <title>PHP</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.css"/>

    <script src="scripts/command_script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php
    if ($_SESSION['my_session']) {
        ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        PW2 FIT
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="?menu=fac">Faculty Management</a></li>
                    <li><a href="?menu=act">Activity Management</a></li>
                    <li><a href="?menu=logout">Log out</a></li>
                </ul>
            </div>
        </nav>
        <div>
            <?php
            $menu = filter_input(INPUT_GET, 'menu');
            switch ($menu) {
                case 'fac';
                    $facultyController = new FacultyController();
                    $facultyController->index();
                    break;
                case 'act';
                    $activityController = new ActivityController();
                    $activityController->index();
                    break;
                case 'facu';
                    $facultyUpdateController = new FacultyUpdateController();
                    $facultyUpdateController->index();
                    break;
                case 'actu';
                    $activityUpdateController = new ActivityUpdateController();
                    $activityUpdateController->index();
                    break;
                case 'logout';
                    $userController = new UserController();
                    $userController->logout();
                    break;
                default;
                    include_once 'pages/home.php';
            }
            ?>
        </div>
        <?php
    } else {
        $userController = new UserController();
        $userController->index();
    }
    ?>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>

