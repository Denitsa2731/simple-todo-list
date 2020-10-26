<?php
include "../tasks.php";

if (isset($_POST['title'])) {
    $title = $_POST['title'];

    if (empty($title)) {
		header("Location: ../index.php?mess=error");
	} else {
		$tasks = new Tasks;
        $tasks->addNewTask($title);
	}
} else {
	header("Location: ../index.php?mess=error");
}