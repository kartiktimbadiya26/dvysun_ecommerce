<?php

include_once "database/db.php";


if (!$user) {
      header("location:login.php");
}


$user_id = $_SESSION["userId"];
$query = "SELECT 
    p.name AS product_name,
    o.quantity,
    p.images,
    (o.quantity * p.product_selling_price) AS total_price
FROM 
    orders o
JOIN 
    product p ON o.product_id = p.id
WHERE 
    o.user_id = $user_id";

$result = mysqli_query($conn, $query);

if (isset($_POST["submit"])) {

      $temp_query = " SELECT  *  FROM  order_details WHERE user_id=$user_id AND payment= false";
      $temp_query_result = mysqli_query($conn, $temp_query);

      if ($temp_query_result->num_rows > 0) {
            header("Location: checkout.php?error=Order already available first compleate your laste order ");
            exit();
      }


      $couponCode = trim($_POST['coupon-code']);
      $firstName = trim($_POST['firstname']);
      $lastName = trim($_POST['lastname']);
      $streetAddress = trim($_POST['streetaddress']);
      $apt = trim($_POST['apt']);
      $city = trim($_POST['city']);
      $state = trim($_POST['state']);
      $zip = trim($_POST['zip']);
      $country = trim($_POST['country']);
      $email = trim($_POST['email']);
      $phone = trim($_POST['phone']);

      $to = 0;
      $query_orderSummary = "SELECT 
p.id,
p.name,
o.quantity,
p.images,
p.product_selling_price,
p.product_price,
(o.quantity * p.product_selling_price) AS total_price
FROM 
orders o
JOIN 
product p ON o.product_id = p.id
WHERE 
o.user_id = $user_id";
      $result_orderSummary = mysqli_query($conn, $query_orderSummary);
      $orderSummaryArray = [];
      if (mysqli_num_rows($result_orderSummary) > 0) {
            while ($row = mysqli_fetch_assoc($result_orderSummary)) {
                  $to += $row["total_price"];
                  $orderSummaryArray[] = $row;
            }
      }
      $jsonOrderSummary = json_encode($orderSummaryArray, JSON_PRETTY_PRINT);
      $stmt = "";
      if ($couponCode !== "") {
            $stmt = $conn->prepare("SELECT * FROM coupons WHERE code = ? AND start_date <= CURDATE() AND expiration_date >= CURDATE()");
            $stmt->bind_param("s", $couponCode);
            $stmt->execute();
            $coupon = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if (!$coupon) {
                  header("Location: checkout.php?error=Invalid or expired coupon code");
                  exit();
            } else {
                  $after_coupen = $to - (($to * $coupon["discount_percentage"]) / 100);
                  $stmt = $conn->prepare("INSERT INTO order_details (first_name, last_name, street_address, apt, city, state, zip, country, email, phone, coupon_code,total,totalAfterCoupen, order_details,user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                  $stmt->bind_param("ssssssssssssssi", $firstName, $lastName, $streetAddress, $apt, $city, $state, $zip, $country, $email, $phone, $couponCode, $to, $after_coupen, $jsonOrderSummary, $user_id);
            }
      } else {
            $stmt = $conn->prepare("INSERT INTO order_details (first_name, last_name, street_address, apt, city, state, zip, country, email, phone,total,totalAfterCoupen ,order_details,user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssi", $firstName, $lastName, $streetAddress, $apt, $city, $state, $zip, $country, $email, $phone, $to, $to, $$jsonOrderSummary, $user_id);
      }

      $stmt->execute();
      $stmt->close();

      $del_query = "DELETE FROM orders WHERE user_id= $user_id";
      $res = mysqli_query($conn, $del_query);

      header("location:payment.php");
}

include_once "header.php";

?>



<main id="content" class="wrapper layout-page">
      <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                  <div class="container">
                        <nav class="py-4 lh-30px" aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center py-1 mb-0">
                                    <li class="breadcrumb-item"><a title="Home" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                              </ol>
                        </nav>
                  </div>
            </div>
      </section>
      <section class="container pb-14 pb-lg-19">
            <div class="text-center">
                  <h2 class="mb-6">Check out</h2>
            </div>
            <form class="pt-12" method="post">
                  <div class="row">
                        <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                              <div class="card border-0 rounded-0 shadow">
                                    <div class="card-header px-0 mx-10 bg-transparent py-8">
                                          <h4 class="fs-4 mb-8">Order Summary</h4>
                                          <?php
                                          $total = 0;
                                          while ($row = $result->fetch_assoc()) {
                                                $total += $row["total_price"];
                                                $img = explode(",", $row["images"]);
                                          ?>
                                                <div class="d-flex w-100 mb-7">
                                                      <div class="me-6">
                                                            <img src="#"
                                                                  data-src="../assets/images/others/<?php echo $img[0]; ?>"
                                                                  class="lazy-image" width="60" height="80"
                                                                  alt="Natural Coconut Cleansing Oil">
                                                      </div>
                                                      <div class="d-flex flex-grow-1">
                                                            <div class="pe-6">
                                                                  <a href="#" class><?php echo $row["product_name"]; ?>
                                                                        <p class="fs-14px text-body-emphasis mb-0 mt-1">Quantity:
                                                                              <span class="text-body"><?php echo $row["quantity"]; ?></span>
                                                                        </p>
                                                                  </a>
                                                            </div>
                                                            <div class="ms-auto">
                                                                  <p class="fs-14px text-body-emphasis mb-0 fw-bold"><?php echo $row["total_price"]; ?>
                                                                  </p>
                                                            </div>
                                                      </div>
                                                </div>
                                          <?php } ?>
                                    </div>
                                    <div class="card-footer bg-transparent py-5 px-0 mx-10">
                                          <div class="d-flex align-items-center fw-bold mb-6">
                                                <span class="text-body-emphasis p-0">Total pricre:</span>
                                                <span
                                                      class="d-block ms-auto text-body-emphasis fs-4 fw-bold"><?php echo $total; ?></span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                              <div class="checkout">
                                    <h4 class="fs-4 pt-4 mb-7">Shipping Information</h4>
                                    <div class="mb-7">
                                          <label
                                                class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">name</label>
                                          <div class="row">
                                                <div class="col-md-6 mb-md-0 mb-7">
                                                      <input type="text" class="form-control" id="first-name"
                                                            name="firstname" placeholder="First Name" required value="1">
                                                </div>
                                                <div class="col-md-6">
                                                      <input type="text" class="form-control" id="last-name"
                                                            name="lastname" placeholder="Last Name" required value="1">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mb-7">
                                          <div class="row">
                                                <div class="col-md-8 mb-md-0 mb-7">
                                                      <label for="street-address"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Street
                                                            Address</label>
                                                      <input type="text" class="form-control" id="street-address"
                                                            name="streetaddress" required value="1">
                                                </div>
                                                <div class="col-md-4">
                                                      <label for="apt"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">APT/Suite</label>
                                                      <input type="text" class="form-control" id="apt" name="apt"
                                                            required value="1">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mb-7">
                                          <div class="row">
                                                <div class="col-md-4 mb-md-0 mb-7">
                                                      <label for="city"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">City</label>
                                                      <input type="text" class="form-control" id="city" name="city"
                                                            required value="1">
                                                </div>
                                                <div class="col-md-4 mb-md-0 mb-7">
                                                      <label for="state"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">State</label>
                                                      <input type="text" class="form-control" id="state" name="state"
                                                            required value="1">
                                                </div>
                                                <div class="col-md-4">
                                                      <label for="zip"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">zip
                                                            code</label>
                                                      <input type="text" class="form-control" id="zip" name="zip"
                                                            required value="1">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mb-7">
                                          <label
                                                class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase" for="country">Country</label>
                                          <div class="dropdown bg-body-secondary rounded">
                                                <select name="country" id="country" class="form-select dropdown-toggle d-flex justify-content-between align-items-center text-decoration-none text-secondary p-5 position-relative d-block">
                                                      <!-- <option value="" selected disabled>-- Select Your Country --</option> -->
                                                      <option value="india" selected>India</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="mb-7">
                                          <label
                                                class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">info</label>
                                          <div class="row">
                                                <div class="col-md-6 mb-md-0 mb-7">
                                                      <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Email" required value="aa@gmail.com">
                                                </div>
                                                <div class="col-md-6">
                                                      <input type="number" class="form-control" id="phone" name="phone"
                                                            placeholder="Phone number" required value="1">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mb-7">
                                          <h4 class="fs-24 mb-6">Coupon Discount</h4>
                                          <p class="mb-7">Enter you coupon code if you have one.</p>
                                          <input type="text" name="coupon-code" class="form-control mb-7" placeholder="Enter coupon code here" value="coupen1">
                                    </div>
                              </div>
                              <button type="submit" name="submit"
                                    class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11 mt-md-7 mt-4">Place
                                    Order</button>
                        </div>
                  </div>
            </form>
      </section>
</main>
<?php include_once "footer.php"; ?>