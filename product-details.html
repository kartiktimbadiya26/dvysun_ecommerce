<?php
include_once "database/db.php";

if (isset($_GET["id"])) {
      $id = $_GET["id"];

      if (isset($_POST["save"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $rate = $_POST["rate"];
            $title = $_POST["title"];
            $message = $_POST["message"];
            $query = "INSERT INTO reviews(name,email,rate,title,message,product_id) VALUES(?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $name, $email, $rate, $title, $message, $id);
            $stmt->execute();
      }

      $query = "SELECT * FROM product WHERE id=$id";
      $result = mysqli_query($conn, $query);
      $row = $result->fetch_assoc();

      $reviews_query = "SELECT COUNT(id) , AVG(rate), SUM(rate) FROM reviews WHERE product_id=$id";
      $reviews_result = mysqli_query($conn, $reviews_query);
      $rate_row = $reviews_result->fetch_assoc();

      $reviews_query = "SELECT * FROM reviews WHERE product_id=$id";
      $reviews_result_data = mysqli_query($conn, $reviews_query);

} else {
      header("location:grid-layout.php");
}

if (isset($_POST["addBag"])) {
      if (isset($_SESSION["userId"])) {
            $user_id = $_SESSION["userId"];
            $product_id = $_GET["id"];
            $number = $_POST["number"];
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
            $product_id = $_GET["id"];
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
      $product_id = $_GET["id"];
      $del = "DELETE FROM cart WHERE user_id=$user_id and product_id=$product_id";
      $chek_result = mysqli_query($conn, $del);

}

$avelable_cart = false;
$avelable_wishlist = false;
if (isset($_SESSION["userId"])) {
      $user_id = $_SESSION["userId"];
      $product_id = $_GET["id"];
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

include_once "header.php";
?>
<main id="content" class="wrapper layout-page">
      <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                  <div class="container">
                        <nav class="py-4 lh-30px" aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center py-1 mb-0">
                                    <li class="breadcrumb-item"><a title="Home" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details
                                    </li>
                              </ol>
                        </nav>
                  </div>
            </div>
      </section>
      <section class="container pt-6 pb-14 pb-lg-20">
            <div class="row ">
                  <div class="col-md-6 pe-lg-13">
                        <div class="position-relative">
                              <div class="position-absolute z-index-2 w-100 d-flex justify-content-end">
                                    <div class="p-6">
                                          <form method="post">
                                                <?php if (!$avelable_wishlist) { ?>
                                                      <button type="submit" name="wishlist"
                                                            class="d-flex align-items-center border-0 justify-content-center product-gallery-action rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            data-bs-title="Add to wishlist">
                                                            <svg class="icon fs-4 color-black">
                                                                  <use xlink:href="#icon-star-light"></use>
                                                            </svg>
                                                      </button>
                                                <?php } else { ?>
                                                      <button type="submit" name="wishlist"
                                                            class="d-flex align-items-center border-0 justify-content-center product-gallery-action rounded-circle"
                                                            style="background-color: <?php echo "#000"; ?>;"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            data-bs-title="Add to wishlist">
                                                            <svg class="icon fs-4 text-white">
                                                                  <use xlink:href="#icon-star-light"></use>
                                                            </svg>
                                                      </button>
                                                <?php } ?>
                                          </form>
                                    </div>
                              </div>
                              <div id="slider"
                                    class="slick-slider slick-slider-arrow-inside slick-slider-dots-inside slick-slider-dots-light g-0"
                                    data-slick-options="{&#34;arrows&#34;:false,&#34;asNavFor&#34;:&#34;#slider-thumb&#34;,&#34;dots&#34;:false,&#34;slidesToShow&#34;:1}">
                                    <?php
                                    $arr = explode(",", $row["images"]);
                                    foreach ($arr as $key => $value) { ?>
                                          <a href="./assets/images/products1/<?php echo $value; ?>" data-gallery="gallery1"
                                                data-thumb-src="./assets/images/products1/<?php echo $value; ?>"
                                                class=" overflow-hidden">
                                                <img src="#" data-src="./assets/images/products1/<?php echo $value; ?>"
                                                      class="h-auto lazy-image" width="540" height="720" alt>
                                          </a>
                                    <?php } ?>
                              </div>
                        </div>
                        <div class="mt-6">
                              <div id="slider-thumb" class="slick-slider slick-slider-thumb ps-1 ms-n3 me-n4"
                                    data-slick-options="{&#34;arrows&#34;:false,&#34;asNavFor&#34;:&#34;#slider&#34;,&#34;dots&#34;:false,&#34;focusOnSelect&#34;:true,&#34;slidesToShow&#34;:5,&#34;vertical&#34;:false}">
                                    <?php foreach ($arr as $key => $value) { ?>
                                          <img src="#" data-src="./assets/images/products1/<?php echo $value; ?>"
                                                class="mx-3 px-0 h-auto cursor-pointer lazy-image overflow-hidden" width="75"
                                                height="100" alt>
                                    <?php } ?>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-6 pt-md-0 pt-10">
                        <p class="d-flex align-items-center mb-6">
                              <span class="text-decoration-line-through"><?php echo $row["product_price"]; ?></span>
                              <span
                                    class="fs-18px text-body-emphasis ps-6 fw-bold"><?php echo $row["product_selling_price"]; ?></span>
                              <span class="badge text-bg-primary fs-6 fw-semibold ms-7 px-6 py-3">
                                    <?php echo round((($row["product_price"] - $row["product_selling_price"]) / $row["product_price"]) * 100, 2); ?>%
                              </span>
                        </p>
                        <h1 class="mb-4 pb-2 fs-4"><?php echo $row["name"]; ?></h1>
                        <div class="d-flex align-items-center fs-15px mb-6">
                              <p class="mb-0 fw-semibold text-body-emphasis">
                                    <?php echo round($rate_row["AVG(rate)"], 2); ?>
                              </p>
                              <div
                                    class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
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
                                          <div class="filled-stars"
                                                style="width: <?php echo ($rate_row["AVG(rate)"] * 20); ?>%">
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
                                    </div>
                              </div>
                              <a href="#review" class="border-start ps-6 text-body">Read
                                    <?php echo $rate_row["COUNT(id)"]; ?>
                                    reviews</a>
                        </div>
                        <p class="fs-15px"><?php echo $row["product_detail"]; ?></p>
                        <p class="mb-4 pb-2 text-body-emphasis">
                              <svg class="icon fs-5 me-4 pe-2 align-text-bottom">
                                    <use xlink:href="#icon-Timer"></use>
                              </svg>
                              Only <?php echo ($row["stock"] - $row["selled_total"]); ?> left in stock
                        </p>
                        <div class="progress mb-7" style="height: 4px;">
                              <div class="progress-bar"
                                    style="width: <?php echo (($row["stock"] - $row["selled_total"]) / $row["stock"]) * 100; ?>%;"
                                    role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?php if (!$avelable_cart) { ?>
                              <form class="mb-9 pb-2" method="post">
                                    <div class="row align-items-end">
                                          <div class="form-group col-sm-4">
                                                <label class=" text-body-emphasis fw-semibold fs-15px pb-6"
                                                      for="number">Quantity: </label>
                                                <div class="input-group position-relative w-100 input-group-lg">
                                                      <a href="#"
                                                            class="shop-down position-absolute translate-middle-y top-50 start-0 ps-7 product-info-2-minus"><i
                                                                  class="far fa-minus"></i></a>
                                                      <input name="number" type="number" id="number"
                                                            class="product-info-2-quantity form-control w-100 px-6 text-center"
                                                            value="1" min="1" required>
                                                      <a href="#"
                                                            class="shop-up position-absolute translate-middle-y top-50 end-0 pe-7 product-info-2-plus"><i
                                                                  class="far fa-plus"></i>
                                                      </a>
                                                </div>
                                          </div>
                                          <div class="col-sm-8 pt-9 mt-2 mt-sm-0 pt-sm-0">
                                                <button type="submit" name="addBag"
                                                      class="btn-hover-bg-primary btn-hover-border-primary btn btn-lg btn-dark w-100">Add
                                                      To Bag
                                                </button>
                                          </div>
                                    </div>
                              </form>
                        <?php } else { ?>
                              <div class="row align-items-end mb-5">
                                    <form method="post">
                                          <div class="col">
                                                <button type="submit" name="removeBag"
                                                      class="btn-hover-bg-primary btn-hover-border-primary btn btn-lg btn-dark w-100">Remove
                                                      To Bag
                                                </button>
                                          </div>
                                    </form>
                              </div>
                        <?php } ?>
                        <p class="mb-4 pb-2">
                              <span class="text-body-emphasis">
                                    <svg class="icon fs-28px me-2 pe-4">
                                          <use xlink:href="#icon-delivery-1"></use>
                                    </svg>Get it approx:
                              </span> In 3 Day
                        </p>
                        <p class="mb-4 pb-2">
                              <span class="text-body-emphasis">
                                    <svg class="icon fs-28px me-2 pe-4">
                                          <use xlink:href="#icon-Package"></use>
                                    </svg>Free Shipping
                              </span>
                        </p>
                        <div class="card border-0 bg-body-tertiary rounded text-center mt-7">
                              <div class="pt-8 px-5">
                                    <img class="img-fluid" src="./assets/images/shop/product-info-2.png" alt="pay"
                                          width="357" height="28">
                              </div>
                              <div class="card-body pt-5 pb-7">
                                    <p class="fs-14px fw-normal mb-0">Guarantee safe &amp; secure checkout</p>
                              </div>
                        </div>
                        <ul class="single-product-meta list-unstyled border-top pt-7 mt-7">
                              <li class="d-flex mb-4 pb-2 align-items-center">
                                    <span class="text-body-emphasis fw-semibold fs-14px">Sku:</span>
                                    <span class="ps-4"><?php echo $row["sku"]; ?></span>
                              </li>
                              <li class="d-flex mb-4 pb-2 align-items-center">
                                    <span class="text-body-emphasis fw-semibold fs-14px">Categories:</span>
                                    <span class="ps-4"><?php echo $row["subcategory"]; ?></span>
                              </li>
                        </ul>
                        <ul class="list-inline d-flex justify-content-start mb-0 fs-6">
                              <li class="list-inline-item">
                                    <a class="text-body text-decoration-none product-info-share product-info-share"
                                          href="#"><i class="fab fa-facebook-f me-4"></i> Facebook</a>
                              </li>
                              <li class="list-inline-item ms-7">
                                    <a class="text-body text-decoration-none product-info-share product-info-share"
                                          href="#"><i class="fab fa-instagram me-4"></i> Instagram</a>
                              </li>
                              <li class="list-inline-item ms-7">
                                    <a class="text-body text-decoration-none product-info-share product-info-share"
                                          href="#"><i class="fab fa-youtube me-4"></i> Youtube</a>
                              </li>
                        </ul>
                  </div>
            </div>
      </section>
      <div class="border-top w-100 h-1px"></div>
      <section class="container pt-15 pb-12 pt-lg-17 pb-lg-20">
            <div class="collapse-tabs">
                  <ul class="nav nav-tabs border-0 justify-content-center pb-12 d-none d-md-flex" id="productTabs"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                              <button
                                    class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis active"
                                    id="product-details-tab" data-bs-toggle="tab" data-bs-target="#product-details"
                                    type="button" role="tab" aria-controls="product-details"
                                    aria-selected="true">Product Details
                              </button>
                        </li>
                        <li class="nav-item" role="presentation">
                              <button
                                    class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis"
                                    id="how-to-use-tab" data-bs-toggle="tab" data-bs-target="#how-to-use" type="button"
                                    role="tab" aria-controls="how-to-use" aria-selected="false">How To Use
                              </button>
                        </li>
                        <li class="nav-item" role="presentation">
                              <button
                                    class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis"
                                    id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients"
                                    type="button" role="tab" aria-controls="ingredients"
                                    aria-selected="false">Ingredients
                              </button>
                        </li>
                  </ul>
                  <div class="tab-content">
                        <div class="tab-inner">
                              <div class="tab-pane fade active show" id="product-details" role="tabpanel"
                                    aria-labelledby="product-details-tab" tabindex="0">
                                    <div class="card border-0 bg-transparent">
                                          <div
                                                class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
                                                <h5 class="mb-0">
                                                      <button
                                                            class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-product-detail"
                                                            aria-expanded="false"
                                                            aria-controls="collapse-product-detail">
                                                            Product Detail
                                                      </button>
                                                </h5>
                                          </div>
                                          <div class="collapse show border-md-0 border p-md-0 p-6"
                                                id="collapse-product-detail">
                                                <div class="row">
                                                      <div class="col-12 col-lg-6 pe-lg-10 pe-xl-20">
                                                            <img src="#"
                                                                  data-src="./assets/images/shop/product-details-img.jpg"
                                                                  class="w-100 lazy-image" alt width="470" height="540">
                                                      </div>
                                                      <div class="pb-3 col-12 col-lg-6 pt-12 pt-lg-0">
                                                            <p class="fw-semibold text-body-emphasis mb-2 pb-4">
                                                                  <?php echo $row["product_details_title"]; ?>
                                                            </p>
                                                            <p class="mb-2 pb-4">
                                                                  <?php echo $row["product_details_description"]; ?>
                                                            </p>
                                                            <p class="fw-semibold text-body-emphasis mb-2 pb-4">Benefits
                                                            </p>
                                                            <ul class="mb-7 ps-6">
                                                                  <li class="mb-1">Buildable medium-to-full coverage
                                                                  </li>
                                                                  <li class="mb-1">Weightless, airy feel—no caking!</li>
                                                                  <li class="mb-1">Long-wearing</li>
                                                                  <li class="mb-1">Evens skin tone</li>
                                                                  <li>Available in 07 shades (all exclusive to
                                                                        Makeaholic!)</li>
                                                            </ul>
                                                            <div class="row">
                                                                  <div class="col-6 col-md-3 text-center mb-9 pb-2">
                                                                        <img class="lazy-image light-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-3-1.png"
                                                                              width="66" height="77" alt>
                                                                        <img class="lazy-image dark-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-white-3-1.png"
                                                                              width="66" height="77" alt>
                                                                  </div>
                                                                  <div class="col-6 col-md-3 text-center mb-9 pb-2">
                                                                        <img class="lazy-image light-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-3-2.png"
                                                                              width="66" height="77" alt>
                                                                        <img class="lazy-image dark-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-white-3-2.png"
                                                                              width="66" height="77" alt>
                                                                  </div>
                                                                  <div class="col-6 col-md-3 text-center mb-9 pb-2">
                                                                        <img class="lazy-image light-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-3-3.png"
                                                                              width="66" height="77" alt>
                                                                        <img class="lazy-image dark-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-white-3-3.png"
                                                                              width="66" height="77" alt>
                                                                  </div>
                                                                  <div class="col-6 col-md-3 text-center mb-9 pb-2">
                                                                        <img class="lazy-image light-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-3-4.png"
                                                                              width="66" height="77" alt>
                                                                        <img class="lazy-image dark-mode-img" src="#"
                                                                              data-src="./assets/images/shop/product-info-white-3-4.png"
                                                                              width="66" height="77" alt>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="how-to-use" role="tabpanel"
                                    aria-labelledby="how-to-use-tab" tabindex="0">
                                    <div class="card border-0 bg-transparent">
                                          <div
                                                class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
                                                <h5 class="mb-0">
                                                      <button
                                                            class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-to-use" aria-expanded="false"
                                                            aria-controls="collapse-to-use">How To Use
                                                      </button>
                                                </h5>
                                          </div>
                                          <div class="collapse border-md-0 border p-md-0 p-6" id="collapse-to-use">
                                                <div class="pb-3">
                                                      <p class="fw-semibold text-body-emphasis mb-2 pb-4">Follow these
                                                            safety guidelines
                                                            when
                                                            using cosmetics products of any type:</p>
                                                      <ul class="ps-6 mb-8">
                                                            <li class="mb-3">Read the label.
                                                                  Follow all directions and heed all warnings.
                                                            </li>
                                                            <li class="mb-3">Wash your hands
                                                                  before you use the product.
                                                            </li>
                                                            <li class="mb-3">Do not share
                                                                  makeup.
                                                            </li>
                                                            <li class="mb-3">Keep the
                                                                  containers clean and tightly closed when not in use,
                                                                  and protect them from temperature extremes.
                                                            </li>
                                                            <li class="mb-3">Throw away
                                                                  cosmetics if there are changes in color or smell.
                                                            </li>
                                                            <li>Use aerosols or sprays cans in well-ventilated areas. Do
                                                                  not use them while
                                                                  you are smoking or near an open flame. It could start
                                                                  a fire.
                                                            </li>
                                                      </ul>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="ingredients" role="tabpanel"
                                    aria-labelledby="ingredients-tab" tabindex="0">
                                    <div
                                          class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
                                          <h5 class="mb-0">
                                                <button
                                                      class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
                                                      type="button" data-bs-toggle="collapse"
                                                      data-bs-target="#collapse-ingredients" aria-expanded="false"
                                                      aria-controls="collapse-ingredients">Ingredients
                                                </button>
                                          </h5>
                                    </div>
                                    <div class="collapse border-md-0 border p-md-0 p-6" id="collapse-ingredients">
                                          <div class="pb-3">
                                                <div class="table-responsive mb-5">
                                                      <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              CAS
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["cas"]; ?>
                                                                        </td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              INCI
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["inci"]; ?>
                                                                        </td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              Composition
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["composition"]; ?>
                                                                        </td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              Appearance
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["appearance"]; ?>
                                                                        </td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              Solubility
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["solubility"]; ?>
                                                                        </td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td class="ps-0 py-5 pe-5 text-body-emphasis">
                                                                              Storage
                                                                        </td>
                                                                        <td class="text-end py-5 ps-5 pe-0">
                                                                              <?php echo $row["storage"]; ?>
                                                                        </td>
                                                                  </tr>
                                                            </tbody>
                                                      </table>
                                                </div>
                                                <p class="mb-0">
                                                      <?php echo $row["ingredients_detail"]; ?>
                                                </p>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <div class="border-top w-100 h-1px"></div>
      <div class="border-top w-100 h-1px" id="review"></div>
      <section class="container pt-15 pb-15 pt-lg-17 pb-lg-20">
            <div class="text-center">
                  <h2 class="mb-12">Customer Reviews</h2>
            </div>
            <div class="mb-11">
                  <div class=" d-md-flex justify-content-between align-items-center">
                        <div class=" d-flex align-items-center">
                              <h4 class="fs-1 me-9 mb-0"><?php echo round($rate_row["AVG(rate)"], 2); ?></h4>
                              <div class="p-0">
                                    <div class="d-flex align-items-center fs-6 ls-0 mb-4">
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
                                                <div class="filled-stars"
                                                      style="width: <?php echo ($rate_row["AVG(rate)"] * 20); ?>%">
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
                                          </div>
                                    </div>
                                    <p class="mb-0"><?php echo $rate_row["COUNT(id)"]; ?> Reviews</p>
                              </div>
                        </div>
                        <div class="text-md-end mt-md-0 mt-7">
                              <a href="#customer-review" class="btn btn-outline-dark" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="customer-review"><svg
                                          class="icon">
                                          <use xlink:href="#icon-Pencil"></use>
                                    </svg>
                                    Wire A Review
                              </a>
                        </div>
                  </div>
            </div>
            <div class="collapse mb-14" id="customer-review">
                  <form class="product-review-form" method="post">
                        <div class="row">
                              <div class="col-sm-4">
                                    <div class="form-group mb-7">
                                          <label class="mb-4 fs-6 fw-semibold text-body-emphasis"
                                                for="reviewName">Name</label>
                                          <input id="reviewName" class="form-control" type="text" name="name">
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                          <label class="mb-4 fs-6 fw-semibold text-body-emphasis"
                                                for="reviewEmail">Email</label>
                                          <input id="reviewEmail" type="email" name="email" class="form-control">
                                    </div>
                              </div>
                        </div>
                        <div>
                              <p class="mt-4 mb-5 fs-6 fw-semibold text-body-emphasis">Your Rating*</p>
                              <div class="form-group mb-6 d-flex justify-content-start">
                                    <div class="rate-input">
                                          <input type="radio" id="star5" name="rate" value="5" style>
                                          <label for="star5" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="far fa-star"></i>
                                          </label>
                                          <input type="radio" id="star4" name="rate" value="4" style>
                                          <label for="star4" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="far fa-star"></i>
                                          </label>
                                          <input type="radio" id="star3" name="rate" value="3" style>
                                          <label for="star3" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="far fa-star"></i>
                                          </label>
                                          <input type="radio" id="star2" name="rate" value="2" style>
                                          <label for="star2" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="far fa-star"></i>
                                          </label>
                                          <input type="radio" id="star1" name="rate" value="1" style>
                                          <label for="star1" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="far fa-star"></i>
                                          </label>
                                    </div>
                              </div>
                        </div>
                        <div class="form-group mb-7">
                              <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewTitle">Title of
                                    Review:</label>
                              <input id="reviewTitle" type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-10">
                              <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewMessage">How was your
                                    overall experience?</label>
                              <textarea id="reviewMessage" class="form-control" name="message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                              <input type="submit" class="btn btn-outline-dark" name="save">
                        </div>
                  </form>
            </div>
            <div class="mt-12">
                  <h3 class="fs-5"><?php echo $rate_row["COUNT(id)"]; ?> Reviews</h3>
                  <?php while ($data = mysqli_fetch_assoc($reviews_result_data)) { ?>
                        <div class="border-bottom pb-7 pt-10">
                              <div class="d-flex align-items-center mb-6">
                                    <div class="d-flex align-items-center fs-15px ls-0">
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
                                                <div class="filled-stars" style="width: <?php echo ($data["rate"] * 20) ?>%">
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
                                          </div>
                                    </div>
                                    <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                                    <span class="fs-14">
                                          <?php
                                          $date_now1 = new DateTime($data["createdate"]);
                                          $date_now = new DateTime();
                                          $deff = $date_now1->diff($date_now);
                                          print_r($deff->d);
                                          ?>
                                          day ago</span>
                              </div>
                              <div class="d-flex justify-content-start align-items-center mb-5">
                                    <div class>
                                          <p class="mb-0">Name</p>
                                          <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1"><?php echo $data["name"]; ?></h5>
                                    </div>
                              </div>
                              <p class="fw-semibold fs-6 text-body-emphasis mb-5"><?php echo $data["title"]; ?></p>
                              <p class="mb-10 fs-6"><?php echo $data["message"]; ?></p>
                        </div>
                  <?php } ?>
                  <!-- <div class="border-bottom"></div> -->
            </div>
      </section>
</main>
<?php include_once "footer.php"; ?>