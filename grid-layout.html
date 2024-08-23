<?php
include_once "database/db.php";
$page = 1;
$limit = 12;
$skip = 0;
if (isset($_GET["limit"])) {
      if ($_GET["limit"] !== "") {
            $limit = $_GET["limit"];
      }
}
if (isset($_GET["page"])) {
      if ($_GET["page"] !== "") {
            $page = $_GET["page"];
            $skip = ($_GET["page"] - 1) * $limit;
      }
}
$query = "SELECT * FROM product LIMIT $limit OFFSET $skip";
$result = mysqli_query($conn, $query);


if (isset($_POST["addBag"])) {
      if (isset($_SESSION["userId"])) {
            $user_id = $_SESSION["userId"];
            $product_id = $_POST["addBag"];
            $number = 1;
            $chek = "SELECT * FROM cart WHERE user_id=$user_id and product_id=$product_id";
            $chek_result = mysqli_query($conn, $chek);
            if ($chek_result->num_rows == 0) {
                  $add_pro_query = "INSERT INTO cart (user_id,product_id,quantity) VALUES (?,?,?)";
                  $stmt = $conn->prepare($add_pro_query);
                  $stmt->bind_param("sss", $user_id, $product_id, $number);
                  $stmt->execute();
            } else {
            }
      } else {
            $_SESSION["back"] = $_SERVER["REQUEST_URI"];
            header("location:login.php");
      }
}

if (isset($_POST["wishlist"])) {
      if (isset($_SESSION["userId"])) {
            $user_id = $_SESSION["userId"];
            $product_id = $_POST["wishlist"];
            $chek = "SELECT * FROM wishlist WHERE user_id=$user_id and product_id=$product_id";
            $chek_result = mysqli_query($conn, $chek);
            if ($chek_result->num_rows == 0) {
                  $add_pro_query = "INSERT INTO wishlist (user_id,product_id) VALUES (?,?)";
                  $stmt = $conn->prepare($add_pro_query);
                  $stmt->bind_param("ss", $user_id, $product_id);
                  $stmt->execute();
            } else {
                  $del = "DELETE FROM wishlist WHERE user_id=$user_id and product_id=$product_id";
                  $chek_result = mysqli_query($conn, $del);
            }
      } else {
            $_SESSION["back"] = $_SERVER["REQUEST_URI"];
            header("location:login.php");
      }
}

if (isset($_POST["removeBag"])) {
      $user_id = $_SESSION["userId"];
      $product_id = $_POST["removeBag"];
      $del = "DELETE FROM cart WHERE user_id=$user_id and product_id=$product_id";
      $chek_result = mysqli_query($conn, $del);
}


include_once "header.php";

?>
<main id="content" class="wrapper layout-page">
      <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                  <div class="container">
                        <nav class="py-4 lh-30px" aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center py-1">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop Grid Layout</li>
                              </ol>
                        </nav>
                  </div>
            </div>
            <div class="text-center py-13">
                  <div class="container">
                        <h2 class="mb-0">Shop Grid Layout</h2>
                  </div>
            </div>
      </section>
      <section class="container container-xxl">
            <div class="tool-bar mb-11 align-items-center justify-content-between d-lg-flex">
                  <div class="tool-bar-left mb-6 mb-lg-0 fs-18px">We found <span class="text-body-emphasis fw-semibold">
                              <?php
                              $query_count = "SELECT COUNT(id) FROM product";
                              $result_count = mysqli_query($conn, $query_count);
                              $result_count_data = $result_count->fetch_assoc();
                              echo $result_count_data["COUNT(id)"];
                              ?></span>
                        products available for you</div>
                  <div class="tool-bar-right align-items-center d-lg-flex">
                        <ul class="list-unstyled d-flex align-items-center list-inline me-lg-7 me-0 mb-6 mb-lg-0">
                              <li class="list-inline-item me-7">
                                    <a class="fs-32px text-body-emphasis-hovertext-body-emphasis" href="#">
                                          <svg class="icon icon-squares-four">
                                                <use xlink:href="#icon-squares-four"></use>
                                          </svg>
                                    </a>
                              </li>
                              <li class="list-inline-item me-0">
                                    <a class="fs-32px text-body-emphasis-hover  text-muted" href="list-layout.php">
                                          <svg class="icon icon-list">
                                                <use xlink:href="#icon-list"></use>
                                          </svg>
                                    </a>
                              </li>
                        </ul>
                  </div>
            </div>
      </section>
      <div class="container container-xxl pb-16 pb-lg-18 mb-lg-3">
            <form method="post">
                  <div class="row gy-50px">
                        <?php while ($row = $result->fetch_assoc()) {
                              $img = explode(",", $row["images"]);
                        ?>
                              <div class="col-sm-6  col-lg-4 col-xl-3">
                                    <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                                          <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                                <a href="product-details.php?id=<?php echo $row["id"]; ?>"
                                                      class="hover-zoom-in d-block" title="Shield Conditioner">
                                                      <img src="#" data-src=" ./assets/images/products/<?php echo $img[0]; ?>"
                                                            class="img-fluid lazy-image w-100" alt="Shield Conditioner"
                                                            width="330" height="440">
                                                </a>
                                                <?php
                                                $calc = round((($row["product_price"] - $row["product_selling_price"]) / $row["product_price"]) * 100, 2);
                                                if ($calc > 1) { ?>
                                                      <div class="position-absolute product-flash z-index-2 ">
                                                            <span
                                                                  class="badge badge-product-flash on-sale bg-primary">-<?php echo $calc; ?>%</span>
                                                      </div>
                                                <?php } ?>

                                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal">
                                                      <?php
                                                      $avelable_cart = false;
                                                      $avelable_wishlist = false;
                                                      if (isset($_SESSION["userId"])) {
                                                            $user_id = $_SESSION["userId"];
                                                            $product_id = $row["id"];
                                                            $chek = "SELECT * FROM cart WHERE user_id=$user_id and product_id=$product_id";
                                                            $chek_result = mysqli_query($conn, $chek);
                                                            if ($chek_result->num_rows == 1) {
                                                                  $avelable_cart = true;
                                                            }
                                                            $chek = "SELECT * FROM wishlist WHERE user_id=$user_id and product_id=$product_id";
                                                            $chek_result = mysqli_query($conn, $chek);
                                                            if ($chek_result->num_rows == 1) {
                                                                  $avelable_wishlist = true;
                                                            }
                                                      }
                                                      if (!$avelable_cart) { ?>
                                                            <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart"
                                                                  href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                  data-bs-title="Add To Cart">
                                                                  <button type="submit" name="addBag"
                                                                        value="<?php echo $row["id"]; ?>"
                                                                        class="border-0 bg-transparent rounded-circle text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart">
                                                                        <svg class="icon icon-shopping-bag-open-light">
                                                                              <use xlink:href="#icon-shopping-bag-open-light"></use>
                                                                        </svg>
                                                                  </button>
                                                            </a>
                                                      <?php } else { ?>
                                                            <a class="bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart"
                                                                  href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                  data-bs-title="Remove To Cart"
                                                                  style="background-color: <?php echo "#000"; ?>; color: white; ">
                                                                  <button type="submit" name="removeBag"
                                                                        value="<?php echo $row["id"]; ?>"
                                                                        style="background-color: <?php echo "#000"; ?>;  color: white !important;"
                                                                        class="border-0 bg-transparent rounded-circle bg-body  text-light-hover rounded-circle square product-action shadow-sm add_to_cart">
                                                                        <svg class="icon icon-shopping-bag-open-light">
                                                                              <use xlink:href="#icon-shopping-bag-open-light"></use>
                                                                        </svg>
                                                                  </button>
                                                            </a>
                                                      <?php } ?>
                                                      <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                                            href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Quick View" data-product-id="<?php echo $row["id"]; ?>">
                                                            <span data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                                  class="d-flex align-items-center justify-content-center">
                                                                  <svg class="icon icon-eye-light">
                                                                        <use xlink:href="#icon-eye-light"></use>
                                                                  </svg>
                                                            </span>
                                                      </a>

                                                      <?php if (!$avelable_wishlist) { ?>
                                                            <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist"
                                                                  href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                  data-bs-title="Add To Wishlist"
                                                                  style="background-color: <?php echo "#000"; ?>; color: white; ">
                                                                  <button type="submit" name="wishlist"
                                                                        value="<?php echo $row["id"]; ?>"
                                                                        class="border-0 bg-transparent bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm text-body-emphasis wishlist"
                                                                        style="background-color: <?php echo "#000"; ?>; color: white; ">
                                                                        <svg class="icon icon-star-light">
                                                                              <use xlink:href="#icon-star-light"></use>
                                                                        </svg>
                                                                  </button>
                                                            </a>
                                                      <?php } else { ?>
                                                            <a class="bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart"
                                                                  href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                  data-bs-title="Remove To Wishlist"
                                                                  style="background-color: <?php echo "#000"; ?>; color: white; ">
                                                                  <button type="submit" name="wishlist"
                                                                        value="<?php echo $row["id"]; ?>"
                                                                        style="background-color: <?php echo "#000"; ?>;  color: white !important;"
                                                                        class="border-0 bg-transparent rounded-circle bg-body  text-light-hover rounded-circle square product-action shadow-sm add_to_cart">
                                                                        <svg class="icon icon-star-light">
                                                                              <use xlink:href="#icon-star-light"></use>
                                                                        </svg>
                                                                  </button>
                                                            </a>
                                                      <?php } ?>
                                                      <!-- <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare"
                                                            href="compare.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Compare">
                                                            <svg class="icon icon-arrows-left-right-light">
                                                                  <use xlink:href="#icon-arrows-left-right-light"></use>
                                                            </svg>
                                                      </a> -->
                                                </div>
                                          </figure>
                                          <div class="card-body text-center p-0">
                                                <span
                                                      class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                                      <del
                                                            class=" text-body fw-500 me-4 fs-13px">₹<?php echo $row["product_price"]; ?></del>
                                                      <ins
                                                            class="text-decoration-none">₹<?php echo $row["product_selling_price"]; ?></ins></span>
                                                <h4
                                                      class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                      <a class="text-decoration-none text-reset"
                                                            href="product-details.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                </h4>
                                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                                      <div class="rating">
                                                            <div class="empty-stars">
                                                                  <span class="star">
                                                                        <svg class="icon star-o">
                                                                              <use xlink:href="#star-o"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star-o">
                                                                              <use xlink:href="#star-o"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star-o">
                                                                              <use xlink:href="#star-o"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star-o">
                                                                              <use xlink:href="#star-o"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star-o">
                                                                              <use xlink:href="#star-o"></use>
                                                                        </svg>
                                                                  </span>
                                                            </div>
                                                            <?php
                                                            $id = $row["id"];
                                                            $query_review = "SELECT COUNT(id) ,AVG(rate) FROM reviews WHERE product_id=$id";
                                                            $result_review = mysqli_query($conn, $query_review);
                                                            $res = $result_review->fetch_assoc();
                                                            ?>
                                                            <div class="filled-stars" style="width: <?php if ($res["AVG(rate)"] > 0) {
                                                                                                            echo $res["AVG(rate)"];
                                                                                                      } else {
                                                                                                            echo 0;
                                                                                                      }
                                                                                                      ?>%">
                                                                  <span class="star">
                                                                        <svg class="icon star text-primary">
                                                                              <use xlink:href="#star"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star text-primary">
                                                                              <use xlink:href="#star"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star text-primary">
                                                                              <use xlink:href="#star"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star text-primary">
                                                                              <use xlink:href="#star"></use>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="star">
                                                                        <svg class="icon star text-primary">
                                                                              <use xlink:href="#star"></use>
                                                                        </svg>
                                                                  </span>
                                                            </div>
                                                      </div><span
                                                            class="reviews ms-4 pt-3 fs-14px"><?php echo $res["COUNT(id)"]; ?>
                                                            reviews</span>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        <?php } ?>
                  </div>
            </form>
      </div>
      <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp">
            <ul class="pagination m-0">
                  <li class="page-item">
                        <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                              href="grid-layout.php?page=<?php
                                                            if ($page > 1)
                                                                  echo $page - 1;
                                                            else
                                                                  echo $page; ?>&limit=<?php echo $limit; ?>" aria-label="Previous">
                              <svg class="icon">
                                    <use xlink:href="#icon-angle-double-left"></use>
                              </svg>
                        </a>
                  </li>
                  <?php
                  $query = "SELECT * FROM product";
                  $for_count = mysqli_query($conn, $query);
                  $count = $for_count->num_rows;
                  $query = "SELECT * FROM product";
                  for ($i = 1; $i <= ceil($count / $limit); $i++) {
                        if ($page == $i) { ?>
                              <li class="page-item active mx-3">
                                    <a class="page-link" href="grid-layout.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                          <?php echo $i; ?>
                                    </a>
                              </li>
                        <?php } else { ?>
                              <li class="page-item mx-3">
                                    <a class="page-link" href="grid-layout.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                          <?php echo $i; ?>
                                    </a>
                              </li>
                  <?php }
                  }
                  ?>
                  <li class="page-item">
                        <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                              href="grid-layout.php?page=<?php
                                                            if ($page < ($i - 1))
                                                                  echo $page + 1;
                                                            else
                                                                  echo $page; ?>&limit=<?php echo $limit; ?>" aria-label="Next">
                              <svg class="icon">
                                    <use xlink:href="#icon-angle-double-right"></use>
                              </svg>
                        </a>
                  </li>
            </ul>
      </nav>
      </div>
</main>
<?php include_once "footer.php"; ?>