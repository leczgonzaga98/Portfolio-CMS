
<?php
    include 'Connection.php';
?>

<?php
    include 'header.php';
?>
<div id="content">
<?php
    $contentname = $_GET["name"];
    include "Content/$contentname.php";
?>
</div>


<?php
    include 'footer.php';
?>

