<?php
include 'Connection.php';
?>


<html>
<head>
    <link rel="stylesheet" href="indexcss.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<head>

<body class="bods">


<div class="logindiv">  
        <form method="POST" action="Index.php">
        <h2 id="login">LOG IN</h2>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="user" style="caret-color:red;">
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
            <label for="floatingPassword">Password</label>
        </div>
        <div id="btn1">
            <button type="submit" class="btn btn-info" name="sub">Login</button>

        </div>
        <div id="btn2">
            <button type="submit" class="btn btn-info" name="sub">Enrol</button>

        </div>
        </form>
</div>


<?php

if(isset($_POST["sub"]))
    {
        
        $us = $_POST["user"];
        $pas= $_POST["pass"];

        $query ="select * from samtb where Username='$us'";

        $result = $con->query($query);

        $row = $result->fetch_array(MYSQLI_NUM);

       if($row)
        {
            if($pas==$row[2])
            {
                header ("location:view.php?name=content.admin.php&cssname=admin&status=1");
                exit;
            }
            else
            {
                echo"wrong password";
            }
        }
        else
        {
            echo"wrong username";
        }



    }





?>
</body>
</html>