<?php

namespace PE\TestTaskHotsale;

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
if ($request->isMethod(Request::METHOD_POST)) {
    usleep(300000);//TODO remove
}

$errors = (new Registration())->handle($request);
?>
<?php if ($request->isMethod(Request::METHOD_POST) && empty($errors)) { ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">You successfully registered</h4>
    </div>
<?php } else { ?>
    <div class="card">
        <div id="loader" class="position-absolute w-100 h-100" style="background-color: rgba(255,255,255,0.5); display: none">
            <div class="d-flex w-100 h-100 align-items-center justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty($errors[Registration::GLOBAL_ERROR_KEY])) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><?php echo $errors[Registration::GLOBAL_ERROR_KEY] ?></h4>
                </div>
            <?php } ?>
            <!-- FORM (was-validated must be added only after validation) -->
            <h4 class="card-title border-bottom pb-2">Registration</h4>
            <form data-role="register" action="register.php" novalidate method="post" class="needs-validation">
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_FIRST_NAME ?>">First Name</label>
                    <input id="<?php echo Registration::FIELD_FIRST_NAME ?>" name="<?php echo Registration::FIELD_FIRST_NAME ?>" type="text" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        First Name required
                    </div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_LAST_NAME ?>">Lst Name</label>
                    <input id="<?php echo Registration::FIELD_LAST_NAME ?>" name="<?php echo Registration::FIELD_LAST_NAME ?>" type="text" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Last Name required
                    </div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_EMAIL ?>">Email</label>
                    <input id="<?php echo Registration::FIELD_EMAIL ?>" name="<?php echo Registration::FIELD_EMAIL ?>" type="email" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Email required
                    </div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_PASSWORD ?>">Password</label>
                    <input id="<?php echo Registration::FIELD_PASSWORD ?>" name="<?php echo Registration::FIELD_PASSWORD ?>" type="password" class="form-control is-invalid">
                    <div class="invalid-feedback">
                        Password required
                    </div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>">Repeat Password</label>
                    <input id="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>" name="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>" type="password" class="form-control is-invalid">
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
<?php } ?>