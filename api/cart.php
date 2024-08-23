<?php
include_once "database/db.php";

if (!$user) {
      header("location:login.php");
}


if (isset($_POST["removepro"])) {
      $id = intval($_POST["removepro"]);
      $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      $total_price = 0;
}

if (isset($_POST['order'])) {


      $user_id = $_SESSION['userId'];
      $cartQuery = "SELECT c.id as cart_id, c.product_id, c.quantity, p.stock , p.selled_total, p.name
                    FROM cart c
                    JOIN product p ON c.product_id = p.id
                    WHERE c.user_id = $user_id";
      $cartResult = mysqli_query($conn, $cartQuery);

      while ($row = mysqli_fetch_assoc($cartResult)) {
            $cart_id = $row['cart_id'];
            $product_id = $row['product_id'];
            $cart_quantity = $row['quantity'];
            $product_name = $row['name'];
            $available_quantity = $row['stock'] - $row['selled_total'];

            $orderCheckQuery = "SELECT * FROM orders WHERE user_id = $user_id AND product_id = $product_id";
            $orderCheckResult = mysqli_query($conn, $orderCheckQuery);

            if ($cart_quantity <= $available_quantity) {

                  $orderInsertQuery = "INSERT INTO orders (user_id, product_id, quantity) VALUES ($user_id, $product_id, $cart_quantity)";

                  if (mysqli_query($conn, $orderInsertQuery)) {
                        $deleteCartQuery = "DELETE FROM cart WHERE id = $cart_id";
                        mysqli_query($conn, $deleteCartQuery);
                  }
            }
      }

      header("location: checkout.php ");
}



if (isset($_SESSION["userId"])) {
      $user_id = $_SESSION["userId"];
      $query = "SELECT cart.id , cart.quantity,product.name,product.id as pro_id ,product.stock,product.selled_total, product.product_price ,product.product_selling_price ,product.images FROM cart JOIN product ON cart.product_id =product.id  WHERE cart.user_id=$user_id";
      $wish_res = mysqli_query($conn, $query);
}

include_once "header.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
      $(document).ready(function() {
            $('.shop-quantity').on('click', function(e) {
                  e.preventDefault();

                  var $row = $(this).closest('tr');
                  var $quantityInput = $row.find('input[type="number"]');
                  var quantity = parseInt($quantityInput.val());
                  var productId = $row.data('id');
                  var action = $(this).data('action');
                  var price = parseFloat($row.data('price'));

                  if (action === 'increase') {
                        quantity++;
                  } else if (action === 'decrease' && quantity > 1) {
                        quantity--;
                  }

                  $quantityInput.val(quantity);

                  var totalPrice = price * quantity;
                  $row.find('.total-price').text('$' + totalPrice.toFixed(2));

                  $.ajax({
                        url: 'update_cart.php',
                        type: 'POST',
                        data: {
                              id: productId,
                              quantity: quantity
                        },
                        success: function(response) {
                              updateTotalPrice();
                        }
                  });
            });

            function updateTotalPrice() {
                  var subtotal = 0;
                  $('.total-price').each(function() {
                        subtotal += parseFloat($(this).text().replace('$', ''));
                  });
                  $('#subtotal').text('$' + subtotal.toFixed(2));
                  $('#total-price').text('$' + subtotal.toFixed(2));
            }
      });
</script>

<main id="content" class="wrapper layout-page">
      <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                  <div class="container">
                        <nav class="py-4 lh-30px" aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center py-1 mb-0">
                                    <li class="breadcrumb-item"><a title="Home" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                              </ol>
                        </nav>
                  </div>
            </div>
      </section>
      <section class="container">
            <div class="shopping-cart">
                  <h2 class="text-center fs-2 mt-12 mb-13">Shopping Cart</h2>
                  <form class="table-responsive-md pb-8 pb-lg-10" method="post">
                        <table class="table border">
                              <thead class="bg-body-secondary">
                                    <tr class="fs-15px letter-spacing-01 fw-semibold text-uppercase text-body-emphasis">
                                          <th scope="col" class="fw-semibold border-1 ps-11">products</th>
                                          <th scope="col" class="fw-semibold border-1">quantity</th>
                                          <th colspan="2" class="fw-semibold border-1">Price</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    $total_price = 0;
                                    while ($row = $wish_res->fetch_assoc()) {
                                          $img = explode(",", $row["images"]);
                                          $in_stock = ($row["stock"] - $row["selled_total"]) > 0;
                                          $total_price += $row["product_selling_price"] * $row["quantity"];
                                          if ($in_stock) {
                                    ?>
                                                <tr class="position-relative" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['product_selling_price']; ?>">
                                                      <th scope="row" class="pe-5 ps-8 py-7 shop-product">
                                                            <div class="d-flex align-items-center">
                                                                  <div class="ms-6 me-7">
                                                                        <img src="./assets/images/products/<?php echo $img[0]; ?>" class="lazy-image" width="75" height="100" alt="Natural Coconut Cleansing Oil">
                                                                  </div>
                                                                  <div>
                                                                        <p class="fw-500 mb-1 text-body-emphasis"><?php echo $row["name"]; ?></p>
                                                                        <p class="card-text">
                                                                              <span class="fs-13px fw-500 text-decoration-line-through pe-3">$<?php echo $row["product_price"]; ?></span>
                                                                              <span class="fs-15px fw-bold text-body-emphasis">$<?php echo $row["product_selling_price"]; ?></span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </th>
                                                      <td class="align-middle">
                                                            <div class="input-group position-relative shop-quantity">
                                                                  <a href="#" class="shop-down position-absolute z-index-2" data-action="decrease"><i class="far fa-minus"></i></a>
                                                                  <input type="number" class="form-control form-control-sm px-10 py-4 fs-6 text-center border-0" value="<?php echo $row["quantity"]; ?>" required readonly>
                                                                  <a href="#" class="shop-up position-absolute z-index-2" data-action="increase"><i class="far fa-plus"></i></a>
                                                            </div>
                                                      </td>
                                                      <td class="align-middle">
                                                            <p class="mb-0 text-body-emphasis fw-bold mr-xl-11 total-price">$<?php echo $row["product_selling_price"] * $row["quantity"]; ?></p>
                                                      </td>
                                                      <td class="align-middle text-end pe-8">
                                                            <button type="submit" name="removepro" value="<?php echo $row["id"]; ?>" class=" border-0 bg-transparent text-secondary">
                                                                  <i class="fa fa-times"></i>
                                                            </button>
                                                      </td>
                                                </tr>
                                          <?php
                                          } else {
                                          ?>
                                                <tr class="position-relative opacity-50">
                                                      <th scope="row" class="pe-5 ps-8 py-7 shop-product">
                                                            <div class="d-flex align-items-center">
                                                                  <div class="ms-6 me-7">
                                                                        <img src="#" data-src="../assets/images/products/product-04-75x100.jpg" class="lazy-image" width="75" height="100" alt="Natural Coconut Cleansing Oil">
                                                                  </div>
                                                                  <div>
                                                                        <p class="fw-500 mb-1 text-body-emphasis">Cleansing Balm</p>
                                                                        <p class="card-text">
                                                                              <span class="fs-13px fw-500 text-decoration-line-through pe-3">₹39.00</span>
                                                                              <span class="fs-15px fw-bold text-body-emphasis">₹29.00</span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                            <div class="position-absolute top-0 start-0">
                                                                  <span class="badge rounded-0 text-uppercase fs-14px px-5 py-4 product-stock ls-1 fw-semibold p-0">out of stock</span>
                                                            </div>
                                                      </th>
                                                      <td class="align-middle">
                                                            <div class="input-group position-relative shop-quantity">
                                                                  <a href="#" class="shop-down position-absolute z-index-2"><i class="far fa-minus"></i></a>
                                                                  <input name="number" type="number" class="form-control form-control-sm px-10 py-4 fs-6 text-center border-0" value="1" required disabled>
                                                                  <a href="#" class="shop-up position-absolute z-index-2"><i class="far fa-plus"></i></a>
                                                            </div>
                                                      </td>
                                                      <td class="align-middle">
                                                            <p class="mb-0 text-body-emphasis fw-bold mr-xl-11"></p>
                                                      </td>
                                                      <td class="align-middle text-end pe-8">
                                                            <button type="submit" name="removepro" class=" border-0 bg-transparent text-secondary">
                                                                  <i class="fa fa-times"></i>
                                                            </button>
                                                      </td>
                                                </tr>
                                    <?php
                                          }
                                    } ?>

                              </tbody>
                        </table>
                  </form>
                  <div class="row pt-8 pt-lg-11 pb-16 pb-lg-18">
                        <div class="col-lg-4 pt-lg-0 pt-11">
                              <form method="post">
                                    <!-- <div class="card border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.1)">
                                          <div class="card-body px-9 pt-6">
                                                <div class="d-flex align-items-center justify-content-between mb-5">
                                                      <span>Subtotal:</span>
                                                      <span class="d-block ml-auto text-body-emphasis fw-bold"><?php echo $total_price; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                      <span>Shipping:</span>
                                                      <span class="d-block ml-auto text-body-emphasis fw-bold">$0</span>
                                                </div>
                                          </div>
                                          <div class="card-footer bg-transparent px-0 pt-5 pb-7 mx-9">
                                                <div class="d-flex align-items-center justify-content-between fw-bold mb-7">
                                                      <span class="text-secondary text-body-emphasis">Total pricre:</span>
                                                      <span
                                                            class="d-block ml-auto text-body-emphasis fs-4 fw-bold"><?php echo $total_price; ?></span>
                                                </div>
                                                <button type="submit" name="order"
                                                      class="btn w-100 btn-dark btn-hover-bg-primary btn-hover-border-primary"
                                                      title="Check Out">Check Out</button>
                                          </div>
                                    </div> -->
                                    <div class="card border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.1)">
                                          <div class="card-body px-9 pt-6">
                                                <div class="d-flex align-items-center justify-content-between mb-5">
                                                      <span>Subtotal:</span>
                                                      <span id="subtotal" class="d-block ml-auto text-body-emphasis fw-bold"><?php echo $total_price; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                      <span>Shipping:</span>
                                                      <span class="d-block ml-auto text-body-emphasis fw-bold">$0</span>
                                                </div>
                                          </div>
                                          <div class="card-footer bg-transparent px-0 pt-5 pb-7 mx-9">
                                                <div class="d-flex align-items-center justify-content-between fw-bold mb-7">
                                                      <span class="text-secondary text-body-emphasis">Total Price:</span>
                                                      <span id="total-price" class="d-block ml-auto text-body-emphasis fs-4 fw-bold"><?php echo $total_price; ?></span>
                                                </div>
                                                <button type="submit" name="order" class="btn w-100 btn-dark btn-hover-bg-primary btn-hover-border-primary" title="Check Out">Check Out</button>
                                          </div>
                                    </div>

                              </form>
                        </div>
                  </div>
            </div>
      </section>
</main>


<?php include_once "footer.php"; ?>