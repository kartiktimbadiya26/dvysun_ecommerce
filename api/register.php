<?php
include_once "database/db.php";

include_once "header.php";
?>

<main id="content" class="wrapper layout-page">
      <section class="pb-lg-20 pb-16">
            <div class="bg-body-secondary py-5">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                              <li class="breadcrumb-item"><a class="text-decoration-none text-body"
                                          href="index.php">Home</a>
                              </li>
                              <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                                    Register
                              </li>
                        </ol>
                  </nav>
            </div>
            <div class="container">
                  <div class=" text-center pt-13 mb-12 mb-lg-15">
                        <div class="text-center">
                              <h2 class="fs-36px mb-11 mb-lg-14">Register</h2>
                        </div>
                  </div>
                  <div class="col-lg-5 col-md-8 mx-auto">
                        <form method="post">
                              <div class="mb-6">
                                    <label for="first_name" class="visually-hidden">Email address</label>
                                    <input name="firstname" id="first_name" type="text" class="form-control"
                                          placeholder="First name" required>
                              </div>
                              <div class="mb-6">
                                    <label for="last_name" class="visually-hidden">Email address</label>
                                    <input name="lastname" id="last_name" type="text" class="form-control"
                                          placeholder="Last name" required>
                              </div>
                              <div class="mb-6">
                                    <label for="email" class="visually-hidden">Email address</label>
                                    <input name="email" id="email" type="email" class="form-control"
                                          placeholder="Your email" required>
                              </div>
                              <div class="mb-7">
                                    <label for="password" class="visually-hidden">Email address</label>
                                    <input name="password" id="password" type="password" class="form-control"
                                          placeholder="Password" required>
                              </div>
                              <button type="submit" value="wishlist.php" name="register" class="btn btn-primary w-100">Sign
                                    Up</button>
                        </form>
                  </div>
            </div>
      </section>
</main>
<?php include_once "footer.php"; ?>