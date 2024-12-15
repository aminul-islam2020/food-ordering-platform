<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br>

<?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];//display session msg
        unset ($_SESSION['add']);//rmv session msg
    }
?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Admin Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>

<?php

// Getting the data from the form
    if(isset($_POST['submit']))
    {
         $full_name=$_POST['full_name'];
         $username=$_POST['username'];
         $password=md5($_POST['password']);

        //  Saving to the database

        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // Execute qurery and save data in DB
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add']="Admin Added Successfully";
            // Redirect to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add']="Failed to Add Admin";
            // Redirect to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>
