<?php
    @session_start();
    include 'Connection.php';
if(isset($_GET['display']))
{
   $result = $con->query("SELECT * FROM sampletb") or die($con->error);

   $myArray = array();
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $myArray[] = $row;
  }
  echo json_encode($myArray);
}

if (isset($_GET['Submit']))
{
 
  $displayName = $_GET['name'];
  $Description = $_GET['description'];
  $added=$con->query("INSERT INTO sampletb (displayname,descrip) VALUES ('$displayName','$Description')");
}


/*Delete*/
if (isset($_GET['delete']))
{
$DeleteID=$_GET['delete'];
$deleteThis=$con->query("DELETE from sampletb where id=$DeleteID");
}
/*Edit*/
if (isset($_GET['Edit']))
{
  $id=$_GET['id'];
  $displayNameEdit=$_GET['nameEdit'];
  $descriptionEdit=$_GET['decriptEdit'];

  if(!empty($displayNameEdit) && !empty($descriptionEdit))
  { 
    $edit=$con->query("UPDATE sampletb SET displayname='$displayNameEdit',descrip='$descriptionEdit' WHERE id=$id");
    $_SESSION['stat']="Edit successfully!";
    $_SESSION['icon']="success";
  }
  else 
  {
    $_SESSION['stat']="Invalid input";
    $_SESSION['icon']="warning";
  }
  header ("location:view.php?name=content.admin&cssname=admin&status=1");
  exit();
}
?>
