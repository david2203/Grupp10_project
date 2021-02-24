<?php 
session_start();
include("database_connection.php");
?>
<?php
$msg ="";
if(isset($_POST['loginBtn'])){
    $username= trim($_POST['username']);
    $password = trim($_POST['password']);
    $md5_password = md5($password);
    if($username != "" & $password != "" ){
        try {
            $query = "SELECT * FROM `users` where `username` =:username_IN and `password`=:password_IN";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username_IN', $username);
            $stmt->bindValue('password_IN', $md5_password);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch();

            
                if($count == 1 && !empty($row)) {
        
                    $_SESSION['sess_user_id'] = $row['id'];
                    $_SESSION['sess_user_name'] = $row['username'];
                    $_SESSION['sess_email'] = $row['email'];
                    header("location:../views/homepage.php");
                }   
                else {
                    $msg = "Invalid username or password! <br>";
                    echo $msg . "<a href='../views/login.php'> Try again </a>";
                }
    }
        catch(PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
       
    }
    else {
        $msg = "Both fields are required! <br>";
        echo $msg . "<a href='../views/login.php'> Try again </a>";
    }
}
?>