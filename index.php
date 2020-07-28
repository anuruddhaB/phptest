<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class='container'>
            <form id='reg_form'>
                <div class='row'>
                <h3>Registration Form</h3>
                <hr/>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="email">NIC:</label>
                            <input type="text" class="form-control" id="nic">
                        </div>

                    </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="name">Contact No :</label>
                            <input type="text" class="form-control" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="name">Home Address :</label>
                            <input type="text" class="form-control" id="hAddress">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                    </div>
                    <div class='col-md-12'>
                    <button type="button" class="btn btn-success" id='btn_register'>Register</button>
                        <a id='link_login'>&nbsp;Login</a>
                    </div>
                </div>
        </form>
        <form id='login_form'> 
            <div class='row'>
                    <h3>Login Form</h3>
                    <hr/>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" class="form-control" id="login_username">
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Password:</label>
                                <input type="password" class="form-control" id="login_userpassword">
                            </div>
                            <button type="button" class="btn btn-success" id='btn_login'>Login</button>
                        <a id='link_register'>&nbsp;Register</a>
                        </div>
            </div>
        </form>
    </div>
  </body>
</html>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_register", function() {
            var name = $("#name").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var nic = $("#nic").val();
            var address = $("#hAddress").val();
            var contact = $("#contact").val();
            var password = $("#password").val();
            var cpassword = $("#confirmPassword").val();

            var nameResult= isName(name);
            var usernameResult = isUsername(username);
            var addressResult = isAddress(address);
            var emailResult = isEmail(email);
            var nicResult = isNic(nic);
            var contactResult = isContactNumber(contact);
            var matchResult = isMatch(password,cpassword);
            if(!nameResult){
                alert("Enter Valid Name");
            }else if(!emailResult){
                alert("Enter valid email");
            }else if(!nic){
                alert("Enter valid nic");
            }else if(!contactResult){
                alert("Enter valid Mobile number");
            }else if(!addressResult){
                alert("Enter valid Address");
            }else if(!usernameResult){
                alert("Enter valid Username");
            }else if(!matchResult){
                alert("Please check password again");
            }else{
                $.ajax({
                    url: "main_class.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        name:name,
                        email:email,
                        nic:nic,
                        address:address,
                        contact:contact,
                        password:password,
                        username:username,
                        path: 'registration'
                    },
                    success: function(data) {
                        alert(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                        console.log(errorThrown);
                    }
                });
            }

        });
    });
</script> 
<script>
function isEmail(email) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(String(email).toLowerCase());
}
function isNic(nic) {
    var regex = /^[0-9]{9}[vVxX]$/;
    return regex.test(nic);
}
function isContactNumber(contact) {
    var regex = /[0-9]{10}/;
    return regex.test(contact);
}
function isMatch(pswd,cpswd) {
    if(pswd == cpswd){
        return true
    }
    return false;
}
function isName(name) {
    if(name == "" || name== null){
        return false;
    }
    return true;
}
function isAddress(address) {
    if(address == "" || address== null){
        return false;
    }
    return true;
}
function isUsername(username) {
    if(username == "" || username== null){
        return false;
    }
    return true;
}
</script>
<script>
$( document ).ready(function() {
    $("#login_form").hide();
});
$("#link_login").click(function(e) {
    $("#login_form").show();
    $("#reg_form").hide();
    e.preventDefault();
});
$("#link_register").click(function(e) {
    $("#login_form").hide();
    $("#reg_form").show();
    e.preventDefault();
});
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_login", function() {
            var username = $("#login_username").val();
            var password = $("#login_userpassword").val();
            var usernameResult = isName(username);
            if(!usernameResult){
                alert("Enter valid username");
            }else{
                $.ajax({
                    url: "main_class.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        username:username,
                        password:password,
                        path: 'login'
                    },
                    success: function(data) {
                        if (data==true) {
                            window.location.replace('home.php');
                        }
                        else {
                            alert('Invalid Credentials');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                        console.log(errorThrown);
                    }
                });
            }

            });
        });
</script>