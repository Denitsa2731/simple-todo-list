<?php 
include "db_conn.php";

class Tasks extends Dbh {
	private $stm;

	function __construct() 
	{
		$this->stm = $this->connect();
	}

	public function getAllTasks() 
	{
		$tasks = [];
		$todos = $this->stm->query( "SELECT * FROM to_do_list.todos ORDER BY id DESC");
		
		while ($row = $todos->fetch()) {
			array_push($tasks, array(
				'id' => $row['id'],
				'title' => $row['title'],
				'date_time' => $row['date_time'],
				'checked' => $row['checked'],
			));
		}

		return $tasks;
	}

	public function removeTaskById(int $id)
	{
		$stmt = $this->stm->prepare("DELETE FROM to_do_list.todos WHERE id=?");
        $res = $stmt->execute([$id]);

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
        
        exit();
	}

	public function checkTaskById(int $id)
	{
		$todos = $this->stm->prepare("SELECT id, checked FROM to_do_list.todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $this->stm->query("UPDATE to_do_list.todos SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
      
        exit();
	}

	public function addNewTask(string $title)
	{
		$stmt = $this->stm->prepare("INSERT INTO to_do_list.todos(title) VALUE(?)");
		$res = $stmt->execute([$title]);
		
		if ($res) {
			header("Location: ../index.php?success");
		} else {
			header("Location: ../index.php");
		}
		
		exit();
	}
}