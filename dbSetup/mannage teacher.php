<?php

class teacherManage{
//class assigner
function classAssigner($class, $section, $id){
    include("connect.php");
    $query= "INSERT INTO `classtable`( `teacherid`, `class`, `section`) 
    VALUES ('$id', '$class', '$section')";
    // this is to update teachers status that the teacher has assigned a class
    $query2 = "UPDATE `teacherslist` SET `assignedClass` =  1  WHERE `teacherslist`.`id` = '$id'";
    $tell = $mysql->query($query);
    $ask = $mysql->query($query2);

}
}

$teacher = new teacherManage;

?>