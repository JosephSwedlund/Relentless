<?php
    $link = new mysqli("localhost","root","","relentless");
    
    if ($link->connect_errno) {
        printf("Connect failed: %s\n", $link->connect_error);
        exit();
    }

    $name = $_POST["name"];
    $password = $_POST["password"];
    $name = htmlentities($link->real_escape_string($name));
    $password = htmlentities($link->real_escape_string($password));
    $result = $link->query("SELECT * FROM accounts WHERE name = '$name' AND password = '$password';");
    if(!$result)
        die ('Can\'t query users because: ' . $link->error);
    else{
        $row = $result->fetch_assoc();
        if ($password == $row["password"] && $password != "" && $name != "") {
            session_start();
            $_SESSION["user"] = array("name"=>$name, "id"=>$row["id"]);
            print("success");
        }
        else
            print("fail");
    }
?>