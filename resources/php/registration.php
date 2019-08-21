<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {


    switch (htmlentities($_POST['form'])) {
        case 'form1':
            addFirstFormData($_POST['email'], $_POST['password'], isset($_POST['checkbox']));
            break;
    }
    $name = isset($_POST['name']) ? $_POST['name'] : false;
    $house = isset($_POST['houseSelect']) ? $_POST['houseSelect'] : false;
    $textArea = isset($_POST['textArea']) ? $_POST['textArea'] : false;
    if($name && $house && $textArea) {
        addSecondFormData($name,$house, $textArea);
    }

}

function addFirstFormData($email, $password, $checkbox = "off") {
    $passwordLength = 8;
    try {
        checkInput('email',$email,'/[\w-]+@([\w-]+\.)+[\w-]+/');
        checkInput('password',$password,'/[A-Za-z0-9]+/',$passwordLength);
    } catch (Exception $e) {
        $input = $e->getMessage();
        $_SESSION['error'] = [$input => 'Wrong '.$input.' input'];
        header('Location: ../../public/index.php');
        exit();
   }
    $json = file_get_contents('../json/data.json');
    $array = json_decode($json,true);
    checkDoubleEmail($array,$email);
    $obj = [
        "email" => $email,
        'password' => $password,
        'checkbox' => $checkbox,
        'name' => '',
        'house' => '',
        'textArea' => ''
    ];
    $array[] = $obj;
    $json = json_encode($array,JSON_PRETTY_PRINT);
    file_put_contents('../json/data.json', $json);
    header('Location: ../../public/secondForm.php');
    exit();
}

function addSecondFormData($name, $house, $textArea) {
    try {
        checkInput('name',$name,'/[A-Za-z0-9]+/');
        checkInput('houseSelect',$house,'/[A-Za-z0-9]+/');
        checkInput('textArea',$textArea,'/[A-Za-z0-9]+/');
    } catch (Exception $e) {
        $input = $e->getMessage();
        $_SESSION['error'] = [$input => 'Wrong '.$input.' input'];
        header('Location: ../../public/secondForm.php');
        exit();
    }
    $json = file_get_contents('../json/data.json');
    $array = json_decode($json,true);
    $obj = end($array);
    $obj['name'] = $name;
    $obj['house'] = $house;
    $obj['textArea'] = $textArea;
    $array[count($array) - 1] = $obj;
    $json = json_encode($array,JSON_PRETTY_PRINT);
    file_put_contents('../json/data.json', $json);
    header('Location: ../../public/end.php');
    session_destroy();
}

function checkDoubleEmail($array, $email) {
    foreach ($array as $obj) {
        if($obj['email'] === $email) {
            $_SESSION['error'] = ['email' => 'Email already exists'];
            header('Location: ../../public/index.php');
            exit();
        }
    }
}

function checkInput($inputName, $inputValue, $regExp, $checkSize = 1) {
    if( preg_match($regExp,$inputValue) && strlen($inputValue) >= $checkSize) {
        return true;
    }
    throw new Exception($inputName);
}

