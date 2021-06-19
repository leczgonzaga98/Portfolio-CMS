
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($_GET['status'] == 1) { ?>
    <link rel="stylesheet" href="CSS/<?php echo $_GET['cssname']; ?>.css">
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="CSS/h3ader.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
   
      
      <div class="sidenav"> 
            <a href="view.php?name=content.dashboard&cssname=dashboard&status=1" style="display:flex;justify-content:space-between;">Dashboard<i class="fad fa-chart-line fa-2x"></i></a>
            <a href="view.php?name=content.admin&cssname=admin&status=1" style="display:flex;justify-content:space-between;">User Management<i class="fas fa-users"></i></a>
            <!--<a href="view.php?name=content.role&cssname=role&status=1">Roles</a>-->
            <a href="view.php?name=content.permission&cssname=permission&status=1"  style="display:flex;justify-content:space-between;">Permission<i class="fas fa-user-cog"></i></a>
            <a href="view.php?name=content.user&cssname=users&status=1">Users</a>
            <div id="expenseManagement"><h3>Expense Management:</h3> </div>
            <a href="view.php?name=content.expenseCategory&cssname=expenseCategory&status=1"  style="display:flex;justify-content:space-between;">Expense Categories<i class="fas fa-money-check-alt"></i></a>
            <a href="view.php?name=content.expenses&cssname=expenses&status=1"  style="display:flex;justify-content:space-between;">Expenses<i class="fas fa-coins"></i></a>

      </div><!--mySideNav-->
      <?php
        include 'Process.php';
      ?>
      <?php
        include 'permissionProcess.php';
      ?>
      <script>
       // SCROLL TABLE Jquery//
        
      function colnum(){
        var colNumber=3; //number of table columns    

        for (var i=0; i<colNumber; i++) {
        var thWidth=$("#myTable").find("th:eq("+i+")").width();
        var tdWidth=$("#myTable").find("td:eq("+i+")").width();      
        if (thWidth<tdWidth)        
            $("#myTable").find("th:eq("+i+")").width(tdWidth);
        else
            $("#myTable").find("td:eq("+i+")").width(thWidth);         
        }  
      }
      </script>
      
   
    <?php
    include 'footer.php';
?>