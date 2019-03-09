<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=webapp;charset=utf8','forge','forge',
    array(PDO::ATTR_EMULATE_PREPARES => false));
    $stmt = $pdo -> prepare("INSERT INTO tbl_users (code,email,name,password) VALUES (:code,:email,:name,:password)");
    $stmt->bindValue(':code', "hoge", PDO::PARAM_STR);
    $stmt->bindValue(':password', "hoge", PDO::PARAM_INT);
    $stmt->bindValue(':name', "hoge", PDO::PARAM_STR);
    $stmt->bindValue(':email', "hoge", PDO::PARAM_INT);
    if(!$stmt->execute()){
        echo "error";
    }
    } catch (PDOException $e) {
     exit('データベース接続失敗。'.$e->getMessage());
    }
