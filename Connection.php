<?php

$con= new mysqli ("localhost","root","","sample");

if($con -> connect_errno){
    echo"failed" .$con->connect_error;
    exit();
}

?>