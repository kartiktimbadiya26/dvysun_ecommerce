<?php

include_once "database/db.php";
// fetch_product.php
if (isset($_GET['id'])) {
      $productId = $_GET['id'];

      $query = "SELECT * FROM product WHERE id = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param('i', $productId);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      $reviews_query = "SELECT COUNT(id) , AVG(rate), SUM(rate) FROM reviews WHERE product_id=$productId";
      $reviews_result = mysqli_query($conn, $reviews_query);
      $rate_row = $reviews_result->fetch_assoc();

      $reviews_query = "SELECT * FROM reviews WHERE product_id=$productId";
      $reviews_result_data = mysqli_query($conn, $reviews_query);

      if ($row) {
echo '<div class="row">';
    echo '<div class="col-md-6 pe-lg-13">';
        echo '<div class="position-relative">';
            // Main Slider
            $arr = explode(",", $row["images"]);
            foreach ($arr as $value) {
                echo '<a href="./assets/images/products1/' . htmlspecialchars($value) . '" data-gallery="gallery1" data-thumb-src="./assets/images/products1/' . htmlspecialchars($value) . '" class="overflow-hidden">';
                echo '<img src="./assets/images/products1/' . htmlspecialchars($value) . '" class="h-auto lazy-image" width="540" height="720" alt>';
                echo '</a>';
                break;
            }
        echo '</div>';
    echo '</div>';

    // Product Info
    echo '<div class="col-md-6 pt-md-0 pt-10">';
        echo '<p class="d-flex align-items-center mb-6">';
            echo '<span class="text-decoration-line-through">' . htmlspecialchars($row["product_price"]) . '</span>';
            echo '<span class="fs-18px text-body-emphasis ps-6 fw-bold"> ' . htmlspecialchars($row["product_selling_price"]) . '</span>';
            echo '<span class="badge text-bg-primary fs-6 fw-semibold ms-7 px-6 py-3">';
            echo round((($row["product_price"] - $row["product_selling_price"]) / $row["product_price"]) * 100, 2) . ' %';
            echo '</span>';
        echo '</p>';

        echo '<h1 class="mb-4 pb-2 fs-4">' . htmlspecialchars($row["name"]) . '</h1>';

        echo '<div class="d-flex align-items-center fs-15px mb-6">';
            echo '<p class="mb-0 fw-semibold text-body-emphasis">' . round($rate_row["AVG(rate)"], 2) . '</p>';
            echo '<div class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">';
                echo '<div class="rating">';
                    echo '<div class="empty-stars">';
                        for ($i = 0; $i < 5; $i++) {
                            echo '<span class="star"><svg class="icon star-o"><use xlink:href="#star-o"></use></svg></span>';
                        }
                    echo '</div>';
                    echo '<div class="filled-stars" style="width:' . ($rate_row["AVG(rate)"] * 20) . '%">';
                        for ($i = 0; $i < 5; $i++) {
                            echo '<span class="star"><svg class="icon star text-primary"><use xlink:href="#star"></use></svg></span>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<a href="#review" class="border-start ps-6 text-body">Read ' . $rate_row["COUNT(id)"] . ' reviews</a>';
        echo '</div>';

        echo '<p class="fs-15px">' . htmlspecialchars($row["product_detail"]) . '</p>';

        echo '<p class="mb-4 pb-2 text-body-emphasis">';
            echo '<svg class="icon fs-5 me-4 pe-2 align-text-bottom"><use xlink:href="#icon-Timer"></use></svg>';
            echo 'Only ' . ($row["stock"] - $row["selled_total"]) . ' left in stock';
        echo '</p>';

        echo '<div class="progress mb-7" style="height: 4px;">';
            echo '<div class="progress-bar" style="width:' . (($row["stock"] - $row["selled_total"]) / $row["stock"]) * 100 . '%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '</div>';

        echo '<p class="mb-4 pb-2">';
            echo '<span class="text-body-emphasis">';
                echo '<svg class="icon fs-28px me-2 pe-4"><use xlink:href="#icon-delivery-1"></use></svg>Get it approx:';
            echo '</span> In 3 Day';
        echo '</p>';

        echo '<p class="mb-4 pb-2">';
            echo '<span class="text-body-emphasis">';
                echo '<svg class="icon fs-28px me-2 pe-4"><use xlink:href="#icon-Package"></use></svg>Free Shipping';
            echo '</span>';
        echo '</p>';

        echo '<div class="card border-0 bg-body-tertiary rounded text-center mt-7">';
            echo '<div class="pt-8 px-5">';
                echo '<img class="img-fluid" src="./assets/images/shop/product-info-2.png" alt="pay" width="357" height="28">';
            echo '</div>';
            echo '<div class="card-body pt-5 pb-7">';
                echo '<p class="fs-14px fw-normal mb-0">Guarantee safe &amp; secure checkout</p>';
            echo '</div>';
        echo '</div>';

        echo '<ul class="single-product-meta list-unstyled border-top pt-7 mt-7">';
            echo '<li class="d-flex mb-4 pb-2 align-items-center">';
                echo '<span class="text-body-emphasis fw-semibold fs-14px">Sku:</span>';
                echo '<span class="ps-4">' . htmlspecialchars($row["sku"]) . '</span>';
            echo '</li>';
            echo '<li class="d-flex mb-4 pb-2 align-items-center">';
                echo '<span class="text-body-emphasis fw-semibold fs-14px">Categories:</span>';
                echo '<span class="ps-4">' . htmlspecialchars($row["subcategory"]) . '</span>';
            echo '</li>';
        echo '</ul>';

        echo '<ul class="list-inline d-flex justify-content-start mb-0 fs-6">';
            echo '<li class="list-inline-item">';
                echo '<a class="text-body text-decoration-none product-info-share" href="#"><i class="fab fa-facebook-f me-4"></i> Facebook</a>';
            echo '</li>';
            echo '<li class="list-inline-item ms-7">';
                echo '<a class="text-body text-decoration-none product-info-share" href="#"><i class="fab fa-instagram me-4"></i> Instagram</a>';
            echo '</li>';
            echo '<li class="list-inline-item ms-7">';
                echo '<a class="text-body text-decoration-none product-info-share" href="#"><i class="fab fa-youtube me-4"></i> Youtube</a>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
echo '</div>';
      } else {
            echo '<p>Product not found.</p>';
      }
} else {
      echo '<p>No product ID provided.</p>';
}
