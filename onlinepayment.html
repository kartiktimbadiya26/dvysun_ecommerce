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

      if ($method == "COD") {
            header("location:orderd.php");
      } else {
            header("location:onlinepayment.php");
      }
}

include_once "header.php";

?>
<?php
// require('vendor/autoload.php');

// use Razorpay\Api\Api;

// $api = new Api('YOUR_KEY_ID', 'YOUR_SECRET_KEY');

// Amount should be in paisa, so INR 10 = 1000
// $orderData = [
//       'receipt'         => 3456,
//       'amount'          => 1000 * 100, // 1000 rupees in paise
//       'currency'        => 'INR',
//       'payment_capture' => 1 // auto capture
// ];

// $razorpayOrder = $api->order->create($orderData);
// $razorpayOrderId = $razorpayOrder['id'];

// $_SESSION['razorpay_order_id'] = $razorpayOrderId;

// $data = [
//       "key"               => 'YOUR_KEY_ID',
//       "amount"            => $orderData['amount'],
//       "name"              => "Your Company Name",
//       "description"       => "Test Transaction",
//       "image"             => "https://your_logo_url",
//       "prefill"           => [
//             "name"              => "Customer Name",
//             "email"             => "customer@example.com",
//             "contact"           => "9999999999",
//       ],
//       "notes"             => [
//             "address"           => "Your Address",
//             "merchant_order_id" => "12312321",
//       ],
//       "theme"             => [
//             "color"             => "#F37254"
//       ],
//       "order_id"          => $razorpayOrderId,
// ];

// $json = json_encode($data);
?>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <form action="verify.php" method="POST">
            <script
                  src="https://checkout.razorpay.com/v1/checkout.js"
                  data-key="<?php echo $data['key']; ?>"
                  data-amount="<?php echo $data['amount']; ?>"
                  data-currency="INR"
                  data-order_id="<?php echo $data['order_id']; ?>"
                  data-buttontext="Pay with Razorpay"
                  data-name="<?php echo $data['name']; ?>"
                  data-description="<?php echo $data['description']; ?>"
                  data-image="<?php echo $data['image']; ?>"
                  data-prefill.name="<?php echo $data['prefill']['name']; ?>"
                  data-prefill.email="<?php echo $data['prefill']['email']; ?>"
                  data-theme.color="<?php echo $data['theme']['color']; ?>"></script>
            <input type="hidden" name="hidden">
      </form>

<?php include_once "footer.php"; ?>