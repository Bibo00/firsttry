<?php
    session_start();
    include 'db_conn.php';

    if(isset($_POST['regname']) && isset($_POST['regmail']) && isset($_POST['regpassword'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $usname = validate($_POST['regname']);
    $usmail = validate($_POST['regmail']);
    $pass = validate($_POST['regpassword']);

    if(empty($usname)){
        header('Location: index.php?error=mail name is required');
        exit();
    } else if(empty($usmail)){
        header('Location: index.php?error=pass mail is required');
        exit();
    } else if(empty($pass)){
        header('Location: index.php?error=pass password is required');
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_names = '$usname'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >= 1){
        $row = mysqli_fetch_assoc($result);
        if($row['user_names'] == $usname){
            header('Location: index.php?error=pass username already in use');
            exit();
        }
    }

    $sql = "SELECT * FROM users WHERE email = '$usmail'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >= 1){
        $row = mysqli_fetch_assoc($result);
        if($row['email'] == $usmail){
            header('Location: index.php?error=pass email already registered in use');
            exit();
        }
    }

    $sql = "INSERT INTO users(user_names , password ) VALUES ('$usname', '$pass')";
    if(mysqli_query($conn, $sql)){
        echo 'succesfully registered';
        exit(); 
    }else{  
       echo "Could not insert record: ". mysqli_error($conn); 
    } 
?>