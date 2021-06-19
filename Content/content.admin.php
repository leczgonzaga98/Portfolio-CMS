
<div class="Container"> 
    <div class="logOut">
        <h3> Welcome to Expense Management</h3>
        <a href="#">Log-out</a> 
    </div><!--Log-out-->
    <div class="roles">
        <div>
            <p>Roles</p>
        </div>
        <div>
            <p> User Management > Roles</p>
        </div>
    </div><!--Roles-->

    <div>
        <table id="myTable" border="2">
            <thead>
                <tr>                   
                    <th>Display Name</th>
                    <th>Description</th>
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
                                    <form method="GET" action="Process.php">
                                        <input type="hidden" name="idEdit" id="idEdit">
                                        <label for="dname">Display name:</label>
                                        <br>
                                        <input type="text" id="displayNameIDedit">
                                        <br>
                                        <label for="description">Description:</label>
                                        <br>
                                        <input type="text" id="descriptionIDedit">
                                        <br>
                                        <input type="button" onclick="edit()">
                                    </form>
                                </div> <!--Modal-Content DIV-->
                            </div><!-- The Modal-->

    <button id="myBtn" style="color:#e1aa12;cursor: pointer;border:none;background:transparent;"> <li class="fas fa-user-plus fa-2x"></li><br>Add role</button>
        <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
                <span class="close">&times;</span>
            <form method="POST" action="Process.php" id="addForm" >
                <label for="dname">Display name:</label>
                <br>
                <input type="text" name="displayName" id="displayName">
                <br>
                <label for="descript">Description:</label>
                <br>
                <input type="text" name="description" id="description">
                <br>
                <input type="button" id="add" value="Add">
            </form>
        </div> <!--Modal-Content DIV-->

    </div><!-- The Modal-->

    
    
</div><!--Container-->


<script> 

    display();
    $("#add").click(function(){
       
    let displayName = $("#displayName").val();
    let Description = $("#description").val();
   
    if(displayName == '' || Description == '')
    {
        swal({
                title: "Please Fill out all fields",
                icon: "warning",
            });
    }
    else
    {
                swal({
                    title: "Are you sure?",
                    icon: "info",
                    buttons: true,
                  
                    })
                    .then((willAdd) => {
                    if (willAdd) {
                        $.ajax( 
                        {
                            url: 'Process.php',
                            type: 'GET',
                            data: {
                                name: displayName,
                                description: Description,
                                Submit: 1,
                            }
                        }).then((data)=>{
                            display();
                            modal.style.display = "none";
                            swal({
                                title: "Data Added Success",
                                icon: "success",
                                });
                                $("#displayName").val('');
                                $("#description").val('');
                        })  
                    }
                    else 
                    {
                        swal("Your imaginary file is safe!");
                    }
            });
        }
    });
    var roleDatas;
    function display()
    {
        $('#TableID').empty();
        $.ajax({
                    url: 'Process.php',
                    type: 'GET',
                    data: {
                        display: 1
                        },
                    dataType: 'json',
        }).then((data)=>
        {
            roleDatas = data
            for(const val of data)
            {
                $('#TableID').prepend(`<tr><td>${val.displayname}</td><td>${val.descrip}</td><td><button onclick='editFunction(${JSON.stringify(val)})' class='fad fa-edit fa-2x' style='color:#e1aa12;cursor: pointer;border:none;background:transparent;'></button></td></tr>`)
             }
            colnum();
        })
    }



       

        function edit()
    {
        const id=$("#idEdit").val();
        const nameEdit = $('#displayNameIDedit').val();
        const descriptEdit = $('#descriptionIDedit').val();

        swal({
            title: "Are you sure you want to edit?",
            text: "Once edited, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willEdit) => {
            if (willEdit) {
                window.location.href = "Process.php?id="+ id +"&nameEdit=" + nameEdit + "&decriptEdit=" + descriptEdit + "&Edit=1";
            } else {
                swal("Your imaginary file is safe!");
            }
            });
    }

    function deleteFunction(id)
    {
        swal({
            title: "Are you sure you want to delete?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                url:'Process.php',
                type: 'GET',
                data:{
                    delete: id
                },
             })
            .then((deleted)=>{
                display()
                swal({
                    title:"Added successfully!",
                    icon:"success",
                    });     
            })
            } 
            else {
                swal("Your imaginary file is safe!");
            }
            });
    }
   


     // Get the modal EDIT
    var modalEdit = document.getElementById("myModalEdit");
    // Get the <span> element that closes the modal
    var spanEdit = document.getElementsByClassName("close-Edit")[0];
    // When the user clicks on <span> (x), close the modal
    function editFunction(data) {
        $('#displayNameIDedit').val(data.displayname);
        $('#displayNameIDedit').val(data.displayname);
        $('#descriptionIDedit').val(data.descrip);
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
</script>

