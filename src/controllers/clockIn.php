<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));


try {
    $currentTime = strftime('%H:%M:%S', time());

    if($_POST['forcedTime']) {
        $currentTime = $_POST['forcedTime'];
    }
 
    $records->ClockIn($currentTime);
    addSuccessMsg('Succefully inserted!');
} catch(AppException $e) {
    addErrorMsg($e->getMessage());
}

header('Location: day_records.php');