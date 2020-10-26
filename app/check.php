<?php
include "../tasks.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (empty($id)) {
       echo 'error';
    } else {
        $tasks = new Tasks;
        $tasks->checkTaskById($id);
    }
} else {
    header("Location: ../index.php?mess=error");
}
