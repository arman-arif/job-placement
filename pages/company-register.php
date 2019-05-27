
<?php
    $page_title = "Student Register :";
    require 'includes/header.php';

    error_reporting(E_ALL);

?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">
              <hr>
                <div class="text-center text-uppercase m-4">
                  <a href="/student-register" class="btn btn-secondary">Student register</a>
                  <a href="/company-register" class="btn btn-primary">Company register</a>
                  <a href="/teacher-register" class="btn btn-secondary">Teacher register</a>
                </div><hr>
                <h3 class="text-center text-uppercase m-3">Company Sign up Form</h3>
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <?php if ($password != $confirm_password): ?>
                            <div class="alert alert-danger">
                                <?php echo $stu_err ?>
                            </div>
                        <?php endif; ?>
                        <form class="needs-validation" method="post" novalidate>
                          <div class="form">
                            <div class="mb-3">
                              <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Company Name" required>
                              <div class="invalid-feedback">
                                Please enter your company name.
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" name="username" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                  Please choose a username.
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="password" name="password" class="form-control" id="validationCustomPassword01" placeholder="Choose Password" required>
                              <div class="invalid-feedback">
                                Please choose a password.
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="password" name="confirm_password" class="form-control" id="validationCustomPassword02" placeholder="Confirm Password" required>
                              <div class="invalid-feedback">
                                Please repeat the password.
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="Email Address" required>
                              <div class="invalid-feedback">
                                Please provide a valid email.
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="text" name="phone" class="form-control" id="validationCustom03" placeholder="Phone Number" required>
                              <div class="invalid-feedback">
                                Please provide your phone number.
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="text" name="district" class="form-control" id="validationCustom04" placeholder="Your District" required>
                              <div class="invalid-feedback">
                                Please enter your district.
                              </div>
                            </div>
                            <div class="mb-3">
                              <input type="text" name="department" class="form-control" id="validationCustom05" placeholder="Department" required>
                              <div class="invalid-feedback">
                                Please enter the department you read in.
                              </div>
                            </div>

                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                              <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                              </label>
                              <div class="invalid-feedback">
                                You must agree before submitting.
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-danger btn-block" type="submit" name="stu-reg">Signup</button>
                        </form>
                    </div>
                    <div class="col-md"></div>
                </div>

                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                      }, false);
                    });
                  }, false);
                })();
                </script>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
