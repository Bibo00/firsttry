<?php 
    session_start();
    include 'db_conn.php';

    if(isset($_POST['uname']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $usname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($usname)){
        header('Location: index.php?error=mail mail is required');
        exit();
    } else if(empty($pass)){
        header('Location: index.php?error=pass password is required');
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_names = '$usname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['user_names'] == $usname && $row['password'] == $pass){
            echo 'Logged in!';
            $_SESSION['user_names'] = $row['user_names'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header('Location: home.php');
            exit();
        } else {
            header('Location: index.php?error=incorrect Email or Password');
            exit();
        }
    }
?>