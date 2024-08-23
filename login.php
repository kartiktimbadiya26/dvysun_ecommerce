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
                                    Login
                              </li>
                        </ol>
                  </nav>
            </div>
            <div class="container">
                  <div class=" text-center pt-13 mb-12 mb-lg-15">
                        <div class="text-center">
                              <h2 class="fs-36px mb-11 mb-lg-14">My Account</h2>
                        </div>
                  </div>
                  <div class="row no-gutters">
                        <div class="col-lg-10 mx-auto">
                              <div class="row no-gutters">
                                    <div class="col-lg-6 mb-15 mb-lg-0 pe-xl-2">
                                          <h3 class="fs-4 mb-10">Log In</h3>
                                          <form method="post">
                                                <div class="form-group mb-6">
                                                      <label for="user_login_email" class="visually-hidden">Email
                                                            address</label>
                                                      <input type="email" class="form-control" id="user_login_email"
                                                            name="email" placeholder="Email Address">
                                                </div>
                                                <div class="form-group mb-6">
                                                      <label for="user_login_password"
                                                            class="visually-hidden">Password</label>
                                                      <input type="password" class="form-control"
                                                            id="user_login_password" placeholder="Password"
                                                            name="password">
                                                </div>
                                                <button type="submit" name="login" value="wishlist.php"
                                                      class="btn btn-primary w-100 mb-7">Submit</button>
                                          </form>
                                    </div>
                                    <div class="col-lg-6 ps-lg-6 ps-xl-12">
                                          <h3 class="fs-4 mb-8">New Customer</h3>
                                          <p class="mb-8">By creating an account with our store, you will be able
                                                to move through the
                                                checkout process
                                                faster, store multiple shipping addresses, view and track your
                                                orders in your account and
                                                more.</p>
                                          <a href="register.php" class="btn btn-primary">Register</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</main>
<?php include_once "footer.php"; ?>