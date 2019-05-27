<?php
    $page_title = "Contact Us :";
    $contact = "active";
    require 'includes/header.php';

    // include 'includes/slider.php';
?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">

                <div class="row pb-4">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="md-form mb-0">
                                              <label for="name" class="">Your name</label>
                                              <input type="text" id="name" name="name" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="md-form mb-0">
                                              <label for="email" class="">Your email</label>
                                              <input type="text" id="email" name="email" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="md-form mb-0">
                                              <label for="subject" class="">Subject</label>
                                              <input type="text" id="subject" name="subject" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="md-form">
                                              <label for="message">Your message</label>
                                              <textarea type="text" id="message" name="message" class="form-control"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </form>

                              <div class="text-center mt-3 mb-4">
                                  <a class="btn btn-success text-uppercase text-white pl-5 pr-5 btn-lg">Send</a>
                              </div>

                             <hr><br><br>

                      <div class="row text-center">
                          <div class="col"><i class="fa fa-map-marker fa-2x"></i>
                              <p>Alomnagor, Khalishpur, Khulna</p>
                          </div>

                          <div class="col"><i class="fa fa-phone fa-2x"></i>
                              <p>+8809638045222<br>(24hours)</p>
                          </div>

                          <div class="col"><i class="fa fa-envelope fa-2x"></i>
                              <p>contact@jobsbd.com</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
