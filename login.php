<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="row" style="margin-top:50px;">
    <div class="col-md"></div>
    <div class="col-md rounded bg-light" style="box-shadow : 4px 4 px 5px-4px;padding:10px">

    <form action="proses_login.php" method="post">
        <h3 align="center">LOGIN Perpus Online</h3>
        Username :
        <input type="text" name="username" value="" class="form-control">
        Password : 
        <input type="password" name="password" class="form-control"><br>
        <center>
        don't have an account?
        <a href="register.php">register now</a> 
        </center>
        <center><input type="submit" name="login" value="LOGIN" class="btn btn-success"></center>
</form>
</div>
<div class="col-md"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>