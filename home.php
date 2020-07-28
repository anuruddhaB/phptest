<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">       
<h2>Home Page</h2>
<h3>Table Details</h3>
<form id='reg_form'>
                <div class='row'>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label for="id">ID :</label>
                            <input type="text" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div> 
                    <div class='col-md-4'>   
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address">
                        </div>

                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact">
                        </div>
                        <button type="button" class="btn btn-success" id='btn_addrow'>Add Row</button>
                    </div>
                </div>
        </form>
  <table class="table table-bordered" id='tbl_data' >
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact No</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody >

    </tbody>
  </table>
</div>
</body>
</html>
<script>
$(document).on("click", "#btn_addrow", function() {
    var id = $("#id").val();
    var name= $("#name").val();
    var email = $("#email").val();
    var address = $("#address").val();
    var contact = $("#contact").val();
    var htmlAppend ='<tr><td>'+id+'</td><td>'+name+'</td><td>'+email+'</td><td>'+address+'</td><td>'+contact+'</td><td><button class="btn btn-default" id="btn_edit">Edit</button><button class="btn btn-default" id="btn_delete">Delete</button></td></tr>';
    $("table tbody").append(htmlAppend);
    $("#id").val("");
    $("#name").val("");
    $("#email").val("");
    $("#address").val("");
    $("#contact").val("");
});
$(document).on("click", "#btn_edit", function() {
    var currentRow = $(this).closest("tr");
    var id = currentRow.find("td:eq(0)").text();
});
$(document).on("click", "#btn_delete", function() {
    $(this).closest('tr').remove();
    return false;

});
</script>
