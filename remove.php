<?php
    include_once("db.php");
    include_once("security.php");   
    $sql = "delete from tasks where id_task = :id_task";
    $st = $conn->prepare($sql);
    $st->bindParam(":id_task", $_POST["task_id"]);
    $st->execute();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>