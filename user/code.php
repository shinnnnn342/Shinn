<?php

session_start();

include('../admin/config/dbcon.php');


//user edit
if(isset($_POST['update_profile']))
{
    $user_id = $_POST['user_id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $number= $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "UPDATE users SET fname='$fname', lname='$lname',number='$number', email='$email',address='$address'
                WHERE user_id ='$user_id' ";
    $query_run = mysqli_query($db, $query);
    
    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: profile.php");
        exit(0);
    }
}

if(isset($_POST['update_password']))
{
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $user_id = $_POST['user_id'];

    

    $checkpassword = "SELECT * FROM users WHERE user_id='$user_id' AND password='$current_pass'";
    $checkpassword_run = mysqli_query($db,$checkpassword);
    
    if(mysqli_num_rows($checkpassword_run)>0)
    {

        if($new_pass == $confirm_pass)
        {
            $sql_confirm = "UPDATE users SET password='$new_pass' WHERE user_id = '$user_id'";
            $sql_confirm_run = mysqli_query($db, $sql_confirm);
        }
        if($sql_confirm_run)
        {
            $_SESSION['message'] = "Password Updated!";
            header("Location: edit-password.php?id=$user_id");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "New Password and Confirm Password Does not Match!";
            header("Location: edit-password.php?id=$user_id");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Current Password Does Not Match!";
        header("Location: edit-password.php?id=$user_id");
        exit(0);
    }
}
//user edit password

if(isset($_POST['redeem_btn']))
 {
    $redeem_reg_wash = $_POST['reg_wash'];
    $redeem_reg_wash_dry = $_POST['reg_wash_dry'];
    $redeem_laundry_bag = $_POST['laundry_bag'];
    $redeem_full_service = $_POST['full_service'];
    $redeem = $_POST['redeem_value'];
    $user_id = $_POST['r_user_id'];
    $c_points = $_POST['current_points'];

    if($c_points >= $redeem_reg_wash)
    {
       $update = "UPDATE users SET user_points = user_points - $redeem_reg_wash WHERE user_id = '$user_id'";
       $update_run = mysqli_query($db, $update);
    }
    if($update_run)
    {
        $_SESSION['message'] = "Points Redeemed!";
        header("Location: profile.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Insufficient Points!";
        header("Location: profile.php");
        exit(0);
    }
    
 }
?>
