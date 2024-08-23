<?php

include_once "../database/db.php";
include_once "chek_login.php";


if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $query = "SELECT * FROM product where id=$id";
      $product_result = mysqli_query($conn, $query);
      $row = $product_result->fetch_assoc();

      $query = "SELECT * FROM subcategory";
      $subcat_result = mysqli_query($conn, $query);

      $image_arr = explode(",", $row["images"]);
} else {
      header("location: product.php");
}


if (isset($_POST["save"])) {
      $id = $_GET["id"];
      $name = $_POST["name"];
      $subcategory = $_POST["subcategory"];
      $product_detail = $_POST["product_detail"];
      $product_price = $_POST["product_price"];
      $product_selling_price = $_POST["product_selling_price"];
      $product_details_title = $_POST["product_details_title"];
      $sku = $_POST["sku"];
      $cas = $_POST["cas"];
      $inci = $_POST["inci"];
      $composition = $_POST["composition"];
      $appearance = $_POST["appearance"];
      $solubility = $_POST["solubility"];
      $ingredients_detail = $_POST["ingredients_detail"];
      $product_details_description = $_POST["product_details_description"];
      $storage = $_POST["storage"];
      $query = "UPDATE product SET 
      name=? ,
       subcategory=? ,
        product_detail=? , 
        product_price=? ,
         product_selling_price=? ,
          product_details_title=? ,
           sku=? ,
            cas=? ,
             inci=? ,
              composition=? , 
              appearance=? ,
               solubility=? , 
               storage=? ,
                ingredients_detail=? ,
                 product_details_description=?
                  WHERE id=?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param(
            "sssssssssssssssi",
            $name,
            $subcategory,
            $product_detail,
            $product_price,
            $product_selling_price,
            $product_details_title,
            $sku,
            $cas,
            $inci,
            $composition,
            $appearance,
            $solubility,
            $storage,
            $ingredients_detail,
            $product_details_description,
            $id,
      );
      $stmt->execute();
      header("location: product.php");
}



include_once "header.php";

?>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">add product</h2>
                  </div>
                  <div class="col-sm-6 mb-8 mb-sm-0 text-end">
                        <h6><a href="product.php">Back To product Table</a></h6>
                  </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body pt-7 pb-0 px-0">
                        <div class="mx-n8">
                              <div class="px-8">
                                    <section class="p-xl-8">
                                          <form method="post" class="form-border-1">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="name">Product Name</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="name" name="name"
                                                                              value="<?php echo $row["name"]; ?>">
                                                                  </div>
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="subcategory">Select Sub
                                                                              Category</label>
                                                                        <select class="form-select" name="subcategory"
                                                                              required id="subcategory">
                                                                              <option value="" disabled>
                                                                                    --Select Sub Category--
                                                                              </option>
                                                                              <?php
                                                                              while ($subcat_row = mysqli_fetch_assoc($subcat_result)) {
                                                                                    if ($subcat_row["id"] == $row["subcategory"]) { ?>
                                                                                          <option
                                                                                                value="<?php echo $subcat_row["id"]; ?>"
                                                                                                selected>
                                                                                                <?php echo $subcat_row["name"]; ?>
                                                                                          </option>
                                                                                          <?php
                                                                                    } else { ?>
                                                                                          <option
                                                                                                value="<?php echo $subcat_row["id"]; ?>">
                                                                                                <?php echo $subcat_row["name"]; ?>
                                                                                          </option>
                                                                                    <?php }
                                                                              }
                                                                              ?>
                                                                        </select>
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_detail">Product
                                                                              Detail</label>
                                                                        <textarea class="form-control" type="text"
                                                                              required id="product_detail"
                                                                              name="product_detail" cols="2"
                                                                              rows="2"><?php echo $row["product_detail"]; ?></textarea>
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_price">Product Price</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="product_price"
                                                                              name="product_price"
                                                                              value="<?php echo $row["product_price"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_selling_price">Product
                                                                              Selling Price</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="product_selling_price"
                                                                              name="product_selling_price"
                                                                              value="<?php echo $row["product_selling_price"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_details_title">Product
                                                                              Details Title</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="product_details_title"
                                                                              name="product_details_title"
                                                                              value="<?php echo $row["product_details_title"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_details_description">Product
                                                                              Details Description</label>
                                                                        <textarea class="form-control"
                                                                              name="product_details_description"
                                                                              id="product_details_description" cols="2"
                                                                              rows="2"><?php echo $row["product_details_description"]; ?></textarea>
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="sku">Product Sku</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="sku" name="sku"
                                                                              value="<?php echo $row["sku"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="cas">Product CAS</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="cas" name="cas"
                                                                              value="<?php echo $row["cas"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="inci">Product INCI</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="inci" name="inci"
                                                                              value="<?php echo $row["inci"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="composition">Product
                                                                              Composition</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="composition" name="composition"
                                                                              value="<?php echo $row["composition"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="appearance">Product
                                                                              Appearance</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="appearance" name="appearance"
                                                                              value="<?php echo $row["appearance"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="solubility">Product
                                                                              Solubility</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="solubility" name="solubility"
                                                                              value="<?php echo $row["solubility"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="storage">Product Storage</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="storage" name="storage"
                                                                              value="<?php echo $row["storage"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="ingredients_detail">Product
                                                                              Ingredients
                                                                              Detail</label>
                                                                        <textarea class="form-control"
                                                                              name="ingredients_detail"
                                                                              id="ingredients_detail" cols="2"
                                                                              rows="2"><?php echo $row["ingredients_detail"]; ?></textarea>
                                                                  </div>
                                                                  <div class="col-10 mb-4">
                                                                        <?php foreach ($image_arr as $key => $value) { ?>
                                                                              <img class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                                    src="../assets/images/products1/<?php echo $value; ?>"
                                                                                    height="75" alt="" srcset="">
                                                                        <?php } ?>
                                                                  </div>
                                                                  <div
                                                                        class="col-2 mb-4 d-flex justify-content-center align-items-center">
                                                                        <a href="update-product-images.php?id=<?php echo $_GET["id"]; ?>"
                                                                              class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4">
                                                                              <i class="far fa-pen me-2">
                                                                              </i> Edit Images
                                                                        </a>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <br>
                                                <button class="btn btn-primary" type="submit" name="save">Save
                                                      Data</button>
                                          </form>
                                    </section>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <?php include_once "small_footer.php" ?>
</main>

<?php

include_once "footer.php";

?>