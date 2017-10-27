<?php
    include("dbConfig.php");    
    $sql = "SELECT * FROM members WHERE name = '$name' AND password = '$password'";
    $query = mysql_query($sql);

    if ($query === false) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
    //reset admin password
    $pass = md5("password");    
    if (mysql_num_rows($query) > 0) {
        $sql ="UPDATE members SET password='{$pass}' WHERE name='{$name}';" ; 		        
        $query = mysql_query($sql);    
        $_SESSION['user'] == "";            
        header('Location: login.php');
        exit;
    }
    //add admin account if not exist
    $sql ="INSERT INTO members (name, password) VALUES ('admin', '{$pass}');" ;    
    $query = mysql_query($sql);    
    $_SESSION['user'] == "";            
    header('Location: login.php');
    exit;            
?>
