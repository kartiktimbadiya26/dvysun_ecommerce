<?php
include_once "database/db.php";

if (!$user) {
      header("location:login.php");
}


if (isset($_POST["delete_wash"])) {
      $id = $_POST["delete_wash"];
      $del = "DELETE FROM wishlist WHERE id=$id";
      $chek_result = mysqli_query($conn, $del);
      print_r($chek_result);
}

if (isset($_POST["addtocart"])) {
      $product_id = $_POST["addtocart"];
      $user_id = $_SESSION["userId"];
      $chekToCart = "SELECT * FROM cart WHERE user_id=$user_id and product_id=$product_id";
      $resofchekToCart = mysqli_query($conn, $chekToCart);
      if ($resofchekToCart->num_rows > 0) {
      } else {
            $number = 1;
            $add_pro_query = "INSERT INTO cart (user_id,product_id,quantity) VALUES (?,?,?)";
            $stmt = $conn->prepare($add_pro_query);
            $stmt->bind_param("sss", $user_id, $product_id, $number);
            $stmt->execute();
            $del = "DELETE FROM wishlist WHERE user_id=$user_id and product_id=$product_id";
            $chek_result = mysqli_query($conn, $del);
      }
}

// if (isset($_POST["updatetocart"])) {
//       $user_id = $_SESSION["userId"];
//       $chekToCart = "SELECT * FROM wishlist WHERE user_id=$user_id";
//       $resofchekToCart = mysqli_query($conn, $chekToCart);
//       print_r($resofchekToCart);
// }

if (isset($_POST["updatetocart"])) {
      // Fetch the user ID from the session
      $user_id = $_SESSION["userId"];

      // Select all products from the wishlist for the current user
      $wishlistQuery = "SELECT * FROM wishlist WHERE user_id=$user_id";
      $wishlistResult = mysqli_query($conn, $wishlistQuery);

      // Loop through all wishlist items
      while ($wishlistItem = mysqli_fetch_assoc($wishlistResult)) {
            $product_id = $wishlistItem['product_id'];

            // Check if the product is already in the cart
            $checkCartQuery = "SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id";
            $cartResult = mysqli_query($conn, $checkCartQuery);

            if (mysqli_num_rows($cartResult) == 0) {
                  // Product is not in the cart, so add it
                  $quantity = 1;
                  $addToCartQuery = "INSERT INTO cart (user_id, product_id,quantity) VALUES ($user_id, $product_id,$quantity)";
                  mysqli_query($conn, $addToCartQuery);
            }

            // Remove the product from the wishlist
            $removeFromWishlistQuery = "DELETE FROM wishlist WHERE id=" . $wishlistItem['id'];
            mysqli_query($conn, $removeFromWishlistQuery);
      }

      // Optionally, redirect to a cart page or some other page
      // header("Location: cart.php");
      // exit();
}

if (isset($_SESSION["userId"])) {
      $user_id = $_SESSION["userId"];
      $query = "SELECT wishlist.id ,wishlist.createdate ,product.name,product.id as pro_id , product.product_price ,product.product_selling_price ,product.images FROM wishlist JOIN product ON wishlist.product_id =product.id  WHERE wishlist.user_id=$user_id";
      $wish_res = mysqli_query($conn, $query);
} else {
      header("location:login.php");
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
                                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                              </ol>
                        </nav>
                  </div>
            </div>
      </section>
      <section class="container container-xxl mb-13 mb-lg-15">
            <div class="text-center">
                  <h2 class="mb-13">Wishlist</h2>
            </div>
            <form class="table-responsive-md" method="post">
                  <table class="table" style="min-width: 710px">
                        <tbody>
                              <?php while ($row = $wish_res->fetch_assoc()) {
                                    $img = explode(",", $row["images"]);
                              ?>
                                    <tr class="border">
                                          <th scope="row" class="ps-xl-10 py-6 d-flex align-items-center border-0">
                                                <button type="submit" name="delete_wash" value="<?php echo $row["id"]; ?>"
                                                      class="border-0 bg-transparent d-block text-muted fw-lighter"><i
                                                            class="fas fa-times"></i></button>
                                                <div class="d-flex align-items-center">
                                                      <div class="ms-6 me-7">
                                                            <img src="#"
                                                                  data-src=" ./assets/images/products/<?php echo $img[0]; ?>"
                                                                  class="img-fluid lazy-image" height="100" width="75" alt>
                                                      </div>
                                                      <div>
                                                            <p class="text-body-emphasis fw-semibold mb-5">
                                                                  <?php echo $row["name"]; ?>
                                                            </p>
                                                            <p class="fw-bold fs-14px mb-4 text-body-emphasis">
                                                                  <span
                                                                        class=" fw-normal fs-13px text-decoration-line-through text-secondary pe-3"><?php echo $row["product_price"]; ?></span>
                                                                  <span><?php echo $row["product_selling_price"]; ?></span>
                                                            </p>
                                                            <p class=" mb-0 text-secondary fw-normal">
                                                                  <?php echo $row["createdate"]; ?>
                                                            </p>
                                                      </div>
                                                </div>
                                          </th>
                                          <td class=" align-middle text-end pe-10">
                                                <span class="me-6">In stock</span>
                                                <button type="submit" name="addtocart" value="<?php echo $row["pro_id"]; ?>" class="btn fs-15px px-9 lh-sm btn-outline-dark">Add To Cart</button>
                                          </td>
                                    </tr>
                              <?php } ?>
                              <tr>
                                    <td class="border-0 py-8 px-0">
                                          <a href="grid-layout.php" class="btn px-9 btn-outline-dark">
                                                Countinue Shopping
                                          </a>
                                    </td>
                                    <td class="border-0 text-end py-8 px-0">
                                          <button type="submit" name="updatetocart" <?php if ($wish_res->num_rows <= 0) {
                                                                                          echo "disabled";
                                                                                    } ?>
                                                class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary text-light">
                                                Update Cart
                                          </button>
                                    </td>
                              </tr>
                        </tbody>
                  </table>
            </form>
      </section>
</main>
<?php include_once "footer.php"; ?>