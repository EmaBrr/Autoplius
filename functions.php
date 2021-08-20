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

}

function find(){


}

?>