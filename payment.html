<?php

include_once "database/db.php";


if (!$user) {
      header("location:login.php");
}

$user_id = $_SESSION["userId"];
$temp_query = " SELECT  *  FROM  order_details WHERE user_id=$user_id AND payment= false";
$temp_query_result = mysqli_query($conn, $temp_query);

if ($temp_query_result->num_rows == 0) {
      header("location:login.php");
      exit();
}
$row = $temp_query_result->fetch_assoc();

if (isset($_POST["paymentMethod"])) {

      $method = $_POST["paymentMethod"];
      $payment = $_POST["payment"];
      $stmt = $conn->prepare("INSERT INTO order_payments (order_id, payment_method) VALUES (?, ?)");
      $stmt->bind_param("is", $payment, $method);
      $stmt->execute();
      $stmt->close();
      $_SESSION["order_id"] = $conn->insert_id;
      if ($method == "COD") {
            header("location:orderd.php");
      } else {
            header("location:onlinepayment.php");
      }
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
            <div class="row pt-8 pt-lg-11">
                  <div class="col-lg-6 pt-lg-0 pt-11">
                        <div class="card border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.1)">
                              <div class="card-body px-9 pt-6">
                                    <div class="d-flex align-items-center justify-content-between mb-5">
                                          <span>Subtotal:</span>
                                          <span class="d-block ml-auto text-body-emphasis fw-bold"><?php echo $row["total"]; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                          <span>Shipping:</span>
                                          <span class="d-block ml-auto text-body-emphasis fw-bold"><?php echo $row["total"] - $row["totalAfterCoupen"]; ?></span>
                                    </div>
                              </div>
                              <div class="card-footer bg-transparent px-0 pt-5 pb-7 mx-9">
                                    <div class="d-flex align-items-center justify-content-between fw-bold mb-7">
                                          <span class="text-secondary text-body-emphasis">Total pricre:</span>
                                          <span class="d-block ml-auto text-body-emphasis fs-4 fw-bold"><?php echo $row["totalAfterCoupen"]; ?></span>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-6 pt-lg-2">
                        <h4 class="fs-24 mb-6">Select Your Payment Method</h4>
                        <form method="post">
                              <div class="d-flex mb-5">
                                    <div class="form-check me-6 me-lg-9">
                                          <input class="form-check-input form-check-input-body-emphasis" type="radio" name="paymentMethod" id="flexRadioDefault1" value="Online" checked>
                                          <label class="form-check-label" for="flexRadioDefault1">Online Payment</label>
                                    </div>
                                    <div class="form-check">
                                          <input class="form-check-input form-check-input-body-emphasis" type="radio" name="paymentMethod" id="flexRadioDefault2" value="COD">
                                          <label class="form-check-label" for="flexRadioDefault2">COD</label>
                                    </div>
                              </div>
                              <button type="submit" name="payment" class="btn w-100 btn-dark btn-hover-bg-primary btn-hover-border-primary mt-10 " title="Check Out" value="<?php echo $row["id"]; ?>">Continue</button>
                        </form>
                  </div>
            </div>
      </section>
</main>

<?php include_once "footer.php"; ?>