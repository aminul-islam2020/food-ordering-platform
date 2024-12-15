<?php include('partials/menu.php')?>

    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
       <h1>MANAGE ADMIN</h1>
    <br>
    <br>
    

    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];//Displaying session msg
            unset($_SESSION['add']);//removing session msg
        }
    ?>
    <br><br>
       <a href="add-admin.php" class="btn-primary">Add Admin</a>

       <br><br><br>

       <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php
            //get all admin
            $sql = "SELECT * FROM tbl_admin";
            // execute the query
            $res = mysqli_query($conn,$sql);

            // chk whthr the query is executed or not
            if($res==TRUE)
            {
                // count rows
                $count =mysqli_num_rows($res);
                $sn=1;
                //chk the no of row
                if($count>0)
                {
                    while ($rows = mysqli_fetch_assoc($res)) {

                        // get individual data
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                        //Display the values in the table
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="#" class="btn-secondary">Update Admin</a>
                                    <a href="#" class="btn-danger">Delete Admin</a>
                                    
                                </td>
                            </tr>
                        <?php
                    }
                }
                else{

                }
            }
        ?>

    
        
       </table>
        
        </div>
    </div>
    <!-- Main Content Ends -->

    <!-- Footer Content Starts -->
    <?php include('partials/footer.php')?>
</body>
</html>