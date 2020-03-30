<?php
if(isset($_POST['signup-submit'])){
    
    require 'dbh.php';

    $uid = $_POST['username'];
    $pswd =$_POST['pswd'];

    if(empty($uid)||empty($pswd))
    {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE USERNAME=?";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck =password_verify($pswd,$row['PSWD']);
                if($pwdCheck ==false)
                {
                    header("Location: ../login.php?error=wrongpswd");
                    exit();
                }
                else if($pwdCheck==true)
                {
                    session_start();
                    $_SESSION['userId']=$row['ID'];
                    $_SESSION['userUid']=$row['USERNAME'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else
                {
                    header("Location: ../login.php?error=wrongpswd");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?error=nouser");
                exit();
            }

        }
    }
}

?>