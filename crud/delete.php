<?php
include './travel.php';
if(isset($_GET['delete'])){
    $travel->deleteTravel(intval($_GET['delete']));
    header('Location: dashboard.php');
} else {
    header('Location: dashboard.php');
}
?>