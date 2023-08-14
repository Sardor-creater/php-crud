<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['username']) && isset($_POST['phone'])){

        $username = $user_fun->htmlvalidation($_POST['username']);
        $phone = $user_fun->htmlvalidation($_POST['phone']);

        if((!preg_match('/^[ ]*$/', $username)) && (!preg_match('/^[ ]*$/', $phone))){

            $field_val['name'] = $username;
            $field_val['phone'] = $phone;

//            $insert = $user_fun->insert("user", $field_val);
            $insert = $user_fun->insert("contacts", $field_val);

            if($insert){
                $json['status'] = 101;
                $json['msg'] = "Данные успешно добавлены";
            }
            else{
                $json['status'] = 102;
                $json['msg'] = "Данные не добавлены";
            }

        }
        else{

            if(preg_match('/^[ ]*$/', $username)){

                $json['status'] = 103;
                $json['msg'] = "Пожалуйста, введите имя пользователя";

            }
            if(preg_match('/^[ ]*$/', $phone)){

                $json['status'] = 104;
                $json['msg'] = "Пожалуйста, введите телефон";
            }
        }

    }
    else{
        $json['status'] = 108;
        $json['msg'] = "Переданы недопустимые значения";
    }
}
else{
    $json['status'] = 109;
    $json['msg'] = "Обнаружен неверный метод";
}


echo json_encode($json);

?>