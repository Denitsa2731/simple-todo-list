<?php
include "../tasks.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (empty($id)) {
       echo 0;
    } else {
        $tasks = new Tasks;
        $tasks->removeTaskById($id);
    }
} else {
    header("Location: ../index.php?mess=error");
}