<?php
//TODO main layout, add bootstrap & jquery, form handle in register php (must return html?)
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Test Task</title>
</head>
<body class="h-100 d-flex align-items-center justify-content-center">

<div id="container" class="w-50">
    <!-- IF OK -->
    <div class="alert alert-success d-none" role="alert">
        <h4 class="alert-heading">You successfully registered</h4>
    </div>
    <!-- ELSE -->
    <div class="card">
        <div class="card-body">
            <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(255,255,255,0.5)">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- IF USER EXISTS -->
            <div class="alert alert-danger d-none" role="alert">
                <h4 class="alert-heading">User with same email already exists</h4>
            </div>
            <!-- FORM (was-validated must be added only after validation) -->
            <h4 class="card-title border-bottom pb-2">Registration</h4>
            <form action="register.php" novalidate class="needs-validation">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        First Name required
                    </div>
                </div>
                <div class="form-group">
                    <label>Lst Name</label>
                    <input type="text" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Last Name required
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Email required
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Password required
                    </div>
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Repeat Password required
                    </div>
                    <div class="invalid-feedback">
                        Passwords must be same
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
