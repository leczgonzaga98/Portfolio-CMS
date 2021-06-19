<?php
    @session_start();
    include 'Connection.php';
   
if(isset($_GET['display']))/*Display*/
{
    $resultPermission = $con->query("SELECT * FROM permissiontable") or die($con->error);
    
    $myArray = array();
    while($row = $resultPermission -> fetch_array(MYSQLI_ASSOC)){
        $myArray[] = $row;
    }
    echo json_encode ($myArray);
}

if(isset($_GET['SubmitPermission'])) /*Add*/
{
$namePermission=$_GET['namePermission'];
$emailAddress=$_GET['emailPermission'];
$addPermission=$con->query("INSERT INTO permissiontable (permissionName,permissionEmail) VALUES ('$namePermission','$emailAddress')");
}



/*Delete*/
if (isset($_GET['delete']))
{
$DeleteID=$_GET['delete'];
$con->query("DELETE from permissiontable where id=$DeleteID");
$_SESSION['stat']="Deleted successfully !";
$_SESSION['icon']="success";

header ("location:view.php?name=content.permission&cssname=permission&status=1");
}


?>
