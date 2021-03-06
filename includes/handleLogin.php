<?php 
session_start();
include("database_connection.php");
?>
<?php
$msg ="";
if(isset($_POST['loginBtn'])){

    //krypting and triming inserted password for safety and because they were crypted upon registration
    $username= trim($_POST['username']);
    $password = trim($_POST['password']);
    $salt1 = "AfGsaö2";
    $salt2 = "Hasf&6";
    $krypt_password = md5($salt2.$password.$salt1);
    if($username != "" & $password != "" ){
        //checking if the inserted username and password are in the database
        try {
            $query = "SELECT * FROM `users` where `username` =:username_IN and `password`=:password_IN";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username_IN', $username);
            $stmt->bindValue('password_IN', $krypt_password);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch();

                // If there is a match, a session with that user is started!
                if($count == 1 && !empty($row)) {
        
                    $_SESSION['sess_user_id'] = $row['id'];
                    $_SESSION['sess_user_name'] = $row['username'];
                    $_SESSION['sess_email'] = $row['email'];
                    $_SESSION['sess_role'] = $row['role'];
                    header("location:../views/homepage.php");
                }   
                // if there is no match, an error message that something is invalid apears!
                else {
                    $msg = "Invalid username or password! <br>";
                    echo $msg . "<a href='../views/login.php'> Try again </a>";
                }
    }
        catch(PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
       
    }
    //no empty fields are allowed
    else {
        $msg = "Both fields are required! <br>";
        echo $msg . "<a href='../views/login.php'> Try again </a>";
    }
}
?>