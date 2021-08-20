<?php

function connection() {
    return $conn = new mysqli("localhost", "root", "", "autoplius");
}

function all() {
    $conn = connection();
    $sql = "select * from cars";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function store() {
    $sql = "INSERT INTO `cars`
    (`id`, `manufacturer`, `model`, `fuel`, `distance`, `year`, `status`)
    VALUES (NULL, 
            '".$_POST['manufacturer']."', 
            '".$_POST['model']."',
            '".$_POST['fuel']."', 
            '".$_POST['distance']."',
            '".$_POST['year']."', 
            '0');";
    // echo $sql; die;
    $conn = connection();
    $conn -> query($sql);
    $conn -> close();
}

function update() {
    $conn = connection();
    $sql = "UPDATE `cars` SET 
        `manufacturer` = '".$_POST['manufacturer']."', 
        `model` = '".$_POST['model']."', 
        `fuel` = '".$_POST['fuel']."', 
        `distance` = '".$_POST['distance']."', 
        `year` = '".$_POST['year']."' 
        WHERE `cars`.`id` = '".$_POST['edit']."';";
    // echo $sql; die;
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function find($id){
    $conn = connection();
    $sql = "select * from cars where id = '".$id."'";
    $car = $conn->query($sql);
    $conn->close();
    return (array) $car -> fetch_assoc();
}

function destroy(){
    $conn = connection();
    $sql = "DELETE FROM `cars` WHERE `cars`.`id` = '".$_POST['destroy']."'";
    $conn->query($sql);
    $conn->close();
}

?>