<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['delete_id']) && $_POST['delete_id'] > 0){

		$deleteid = $user_fun->htmlvalidation($_POST['delete_id']);

		$condition['id'] = $deleteid;
		$delete_rec = $user_fun->delete("contacts",$condition);
		
		if($delete_rec){
			$json['status'] = 0;
			$json['msg'] = "Успешно удалено";
		}
		else{
			$json['status'] = 1;
			$json['msg'] = "Данные не удалены";
		}

	}
	else{
		$json['status'] = 2;
		$json['msg'] = "Передано неверное значение";
	}

}
else{
	$json['status'] = 3;
	$json['msg'] = "Обнаружен неверный метод";
}

echo json_encode($json);


?>