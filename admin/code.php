<?php

session_start();

include('authentication.php');
include('config/dbcon.php');


//admin delete
if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE user_id='$user_id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: view-register.php");
        exit(0);
    }

}

//admin add
if(isset($_POST['add_user']))
{
    $user_id = $_POST['user_id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $number= $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $user_status = $_POST['user_status'] == true ? '1' : '0';

    $query = "INSERT INTO users (fname, lname,number, email,address, password, role_as, user_status) VALUES ('$fname','$lname','$number','$email','$address','$password','$role_as','$user_status')";
    $query_run = mysqli_query($db, $query);
    
    if($query_run)
    {
        $_SESSION['message'] = "User Added Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: view-register.php");
        exit(0);
    }
}
//admin edit
if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $number= $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $user_status = $_POST['user_status'] == true ? '1' : '0';

    $query = "UPDATE users SET fname='$fname', lname='$lname',number='$number', email='$email',address='$address', password='$password', role_as='$role_as', user_status='$user_status' 
                WHERE user_id ='$user_id' ";
    $query_run = mysqli_query($db, $query);
    
    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: view-register.php");
        exit(0);
    }
}

//end transaction
if(isset($_POST['end_modal_btn']))
{
    $book_id = $_POST['end_modal_input'];
    $book_user_id = $_POST['b_book_user_id'];

        $add_points = "UPDATE users SET user_points = user_points + 1 WHERE user_id = '$book_user_id'";
        $add_points_run = mysqli_query($db,$add_points);    

        $change_status = "UPDATE booking SET b_status = 3 WHERE booking_id = '$book_id'";
        $change_status_run = mysqli_query($db,$change_status);

            if($add_points_run . $change_status_run)
            {
                $_SESSION['message'] = "Transaction Complete!";
                header("Location: user-transact.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: user-transact.php");
                exit(0);
            }
    }


//redeem
if(isset($_POST['redeem_modal_btn']))
 {
    $redeem = $_POST['redeem_value'];
    $user_id = $_POST['r_user_id'];
    $c_points = $_POST['current_points'];

    if($c_points >= $redeem)
    {
       $update = "UPDATE users SET user_points = user_points - $redeem WHERE user_id = '$user_id'";
       $update_run = mysqli_query($db, $update);
    }
    if($update_run)
    {
        $_SESSION['message'] = "Points Redeemed!";
        header("Location: user-transact.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Insufficient Points!";
        header("Location: user-transact.php");
        exit(0);
    }
    
    }


?>
   