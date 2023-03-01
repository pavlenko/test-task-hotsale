<?php

namespace PE\TestTaskHotsale;

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
if ($request->isMethod(Request::METHOD_POST)) {
    usleep(200000);// <-- this emulate backend processing time
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
            <h4 class="card-title border-bottom pb-2">Registration</h4>
            <form data-role="register" action="register.php" novalidate method="post" class="needs-validation">
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_FIRST_NAME ?>">First Name</label>
                    <input id="<?php echo Registration::FIELD_FIRST_NAME ?>"
                           name="<?php echo Registration::FIELD_FIRST_NAME ?>"
                           type="text"
                           value="<?php echo $request->get(Registration::FIELD_FIRST_NAME) ?>"
                           class="form-control <?php if (!empty($errors[Registration::FIELD_FIRST_NAME])) echo 'is-invalid' ?>">
                    <div class="invalid-feedback"><?php echo $errors[Registration::FIELD_FIRST_NAME] ?? '' ?></div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_LAST_NAME ?>">Lst Name</label>
                    <input id="<?php echo Registration::FIELD_LAST_NAME ?>"
                           name="<?php echo Registration::FIELD_LAST_NAME ?>"
                           type="text"
                           value="<?php echo $request->get(Registration::FIELD_LAST_NAME) ?>"
                           class="form-control <?php if (!empty($errors[Registration::FIELD_LAST_NAME])) echo 'is-invalid' ?>">
                    <div class="invalid-feedback"><?php echo $errors[Registration::FIELD_FIRST_NAME] ?? '' ?></div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_EMAIL ?>">Email</label>
                    <input id="<?php echo Registration::FIELD_EMAIL ?>"
                           name="<?php echo Registration::FIELD_EMAIL ?>"
                           type="email"
                           value="<?php echo $request->get(Registration::FIELD_EMAIL) ?>"
                           class="form-control <?php if (!empty($errors[Registration::FIELD_EMAIL])) echo 'is-invalid' ?>">
                    <div class="invalid-feedback"><?php echo $errors[Registration::FIELD_EMAIL] ?? '' ?></div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_PASSWORD ?>">Password</label>
                    <input id="<?php echo Registration::FIELD_PASSWORD ?>"
                           name="<?php echo Registration::FIELD_PASSWORD ?>"
                           type="password"
                           value="<?php echo $request->get(Registration::FIELD_PASSWORD) ?>"
                           class="form-control <?php if (!empty($errors[Registration::FIELD_PASSWORD])) echo 'is-invalid' ?>">
                    <div class="invalid-feedback"><?php echo $errors[Registration::FIELD_PASSWORD] ?? '' ?></div>
                </div>
                <div class="form-group">
                    <label for="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>">Repeat Password</label>
                    <input id="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>"
                           name="<?php echo Registration::FIELD_REPEAT_PASSWORD ?>"
                           type="password"
                           value="<?php echo $request->get(Registration::FIELD_REPEAT_PASSWORD) ?>"
                           class="form-control <?php if (!empty($errors[Registration::FIELD_REPEAT_PASSWORD])) echo 'is-invalid' ?>">
                    <div class="invalid-feedback"><?php echo $errors[Registration::FIELD_REPEAT_PASSWORD] ?? '' ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
<?php } ?>