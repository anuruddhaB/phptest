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
      <tr>
        <td><input class="form-control" type="text" id='id'></td>
        <td><input class="form-control" type="text" id='name'></td>
        <td><input class="form-control" type="text" id='email'></td>
        <td><input class="form-control" type="text" id='address'></td>
        <td><input class="form-control" type="text" id='contact'></td>
        <td>
            <button class='btn btn-default' id="btn_insert">Insert</button>
            <button class='btn btn-default'>Edit</button>
            <button class='btn btn-default'>Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
<script>
$(document).on("click", "#btn_insert", function() {
    var currentRow = $(this).closest("tr");
    var itemCode = currentRow.find("td:eq(0)").val();
    alert(itemCode);
    $('#id').prop('readonly', true);
    $('#name').prop('readonly', true);
    $('#email').prop('readonly', true);
    $('#address').prop('readonly', true);
    $('#contact').prop('readonly', true);
    var newTableRow = '<tr><td><input class="form-control" type="text" id="id"></td><td><input class="form-control" type="text" id="name"></td><td><input class="form-control" type="text" id="email"></td><td><input class="form-control" type="text" ></td><td><input class="form-control" type="text" ></td><td><button class="btn btn-default" id="btn_insert">Insert</button><button class="btn btn-default">Edit</button><button class="btn btn-default">Delete</button></td></tr>';
    $('#tbl_data tr:last').after(newTableRow);
});
</script>
