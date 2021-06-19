

<div class="Container"> 
    <div class="logOut">
        <h3> Welcome to Expense Management</h3>
        <a href="#">Log-out</a> 
    </div><!--Log-out-->
    <div class="Permission">
        <div>
            <p>Permission</p>
        </div>
        <div>
            <p> User Management > Permission</p>
        </div>
    </div><!--Roles-->

    <div>
        <table id="myTable" border="2">
            <thead>
                <tr>                   
                    <th>Display name</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="TableID">
            </tbody>
        </table>
    </div> <!-- Table div -->
    
                        <div id="myModalEdit" class="modalEdit">
                                <!-- Modal content -->
                                <div class="modal-content-Edit">
                                        <span class="close-Edit" onclick="closeedit()">&times;</span>
                                    <form method="GET" action="permissionProcess.php">
                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                        <label for="dname">Display Name</label>
                                        <br>
                                        <input type="text" id="permissionNameID" value="<?php echo $row['permissionName']; ?>" name="displayNameEdit">
                                        <br>
                                        <label for="descript">Description</label>
                                        <br>
                                        <input type="text" id="permissionEmailID" value="<?php echo $row['permissionEmail']; ?>" name="descriptionEdit">
                                        <br>
                                        <input type="submit" name="Edit">
                                    </form>
                                </div> <!--Modal-Content DIV-->
                            </div><!-- The Modal-->

    <button id="myBtn" style="color:#e1aa12;cursor: pointer;border:none;background:transparent;"><li class="fas fa-user-plus fa-2x"></li><br>Add user</button> 
        <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST" action="permissionProcess.php">
                <label for="dname">Name</label>
                <br>
                <input type="text" name="namePermission" id="namePermissionId">
                <br>
                <label for="descript">Email Address</label>
                <br>
                <input type="email" name="emailPermission" id="emailPermissionId">
                <br>
                <input type="button"  id="addBtnPermission">
            </form>
        </div> <!--Modal-Content DIV-->

    </div><!-- The Modal-->
    
    
</div><!--Container-->


<script>

    display();
     $("#addBtnPermission").click(function(){
         let namePermissionID = $("#namePermissionId").val();
         let emailPermissionID = $("#emailPermissionId").val();
         if(namePermissionID == '' || emailPermissionID == '' )
         {
        swal({
            title: "Please Fill out all fields",
            icon: "warning",
            });
         }
         else
         {
            swal({
                title:"Are you sure you want to add data?",
                icon:"info",
                buttons:true,
                })
                .then((add)=>{
                    if(add)
                    {
                    $.ajax(
                    {
                        url:'permissionProcess.php',
                        type: 'GET',
                        data:{
                            namePermission : namePermissionID,
                            emailPermission : emailPermissionID,
                            SubmitPermission : 1,
                             }
                    })
                        .then((added)=>
                        {   
                            display();
                            modal.style.display="none";
                            swal({
                                title:"Added successfully!",
                                icon:"success",
                                });     
                        });
                        
                     }
                     else
                     {
                         swal("Safe");
                     }
                 
                 });
        }
     });

    function display()
    {
        $.ajax
        ({
            url: 'permissionProcess.php',
            type: 'GET',
            data: {
                display : 1
            },
            dataType: 'JSON',
        })
        .then((added)=>{
            for(const arr of added)
            {
                $("#TableID").append("<tr><td>"+arr.permissionName+"</td><td>"+arr.permissionEmail+"</td><td>"
                +"<button>edit</button>"+"<button>del</button></td></tr>");
            }
            colnum();

        });
    }



            

    function deleteFunction(id)
    {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = "permissionProcess.php?delete="+id;
            } else {
                swal("Your imaginary file is safe!");
            }
            });
    }



     // Get the modal EDIT
    var modalEdit = document.getElementById("myModalEdit");


    // Get the <span> element that closes the modal
    var spanEdit = document.getElementsByClassName("close-Edit")[0];


    // When the user clicks on <span> (x), close the modal
    function editFunction() {
        modalEdit.style.display = "block";
    }

    function closeedit()
    {
        modalEdit.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalEdit) {
            modalEdit.style.display = "none";
        }
    }
    

    // Get the modal ADD
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        }
    }

    // SCROLL TABLE Jquery//
    var colNumber=3; //number of table columns    

    for (var i=0; i<colNumber; i++) {
    var thWidth=$("#myTable").find("th:eq("+i+")").width();
    var tdWidth=$("#myTable").find("td:eq("+i+")").width();      
    if (thWidth<tdWidth)        
        $("#myTable").find("th:eq("+i+")").width(tdWidth);
    else
        $("#myTable").find("td:eq("+i+")").width(thWidth);         
    }  
</script>
