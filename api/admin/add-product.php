<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["save"])) {
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
      $storage = $_POST["storage"];
      $ingredients_detail = $_POST["ingredients_detail"];
      $product_details_description = $_POST["product_details_description"];
      $stock = $_POST["stock"];
      $arr_len = count($_FILES["images"]["name"]);
      for ($i = 0; $i < $arr_len; $i++) {
            $path = $_FILES["images"]["name"][$i];
            $upload_path = "../assets/images/products/$path";
            move_uploaded_file($_FILES['images']['tmp_name'][$i], $upload_path);
      }
      $srr_to_str = implode(",", $_FILES["images"]["name"]);
      $query = "INSERT INTO product (name , subcategory , product_detail , product_price , product_selling_price , product_details_title , sku , cas , inci , composition , appearance , solubility , storage , ingredients_detail , product_details_description , images , stock) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param(
            "sssssssssssssssss",
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
            $srr_to_str,
            $stock
      );
      $stmt->execute();
      $product_id = $conn->insert_id;
      $query = "INSERT INTO stock (added_stock,product_id) VALUES (?,?)";
      $stmt1 = $conn->prepare($query);
      $stmt1->bind_param("ss", $stock, $product_id);
      $stmt1->execute();
      header("location:product.php");
}

$query = "SELECT * FROM subcategory";
$result = mysqli_query($conn, $query);
// $row = $result->fetch_assoc();


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
                                          <form action="add-product.php" enctype="multipart/form-data" method="post"
                                                class="form-border-1">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <!-- Start -->
                                                                  <!-- Start : Part - 1 (Item :- 7) -->
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="name">Product Name</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="name" name="name">
                                                                  </div>
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="subcategory">Select Sub
                                                                              Category</label>
                                                                        <select class="form-select" name="subcategory"
                                                                              required id="subcategory">
                                                                              <option value="" selected disabled>
                                                                                    --Select Sub Category--
                                                                              </option>
                                                                              <?php
                                                                              while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                                    <option value="<?php echo $row["id"]; ?>">
                                                                                          <?php echo $row["name"]; ?>
                                                                                    </option>
                                                                              <?php }
                                                                              ?>
                                                                        </select>
                                                                  </div>
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="images">Select Product Images</label>
                                                                        <input class="form-control" type="file"
                                                                              accept="image/*" id="images"
                                                                              name="images[]" multiple required>
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_detail">Product
                                                                              Detail</label>
                                                                        <textarea class="form-control" type="text"
                                                                              required id="product_detail"
                                                                              name="product_detail" cols="2"
                                                                              rows="2"></textarea>
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_price">Product Price</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="product_price"
                                                                              name="product_price">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_selling_price">Product
                                                                              Selling Price</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="product_selling_price"
                                                                              name="product_selling_price">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="sku">Product Sku</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="sku" name="sku">
                                                                  </div>
                                                                  <!-- End : Part - 1 -->

                                                                  <!-- Start : Part - 2 (Items :- 2) -->
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_details_title">Product
                                                                              Details Title</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="product_details_title"
                                                                              name="product_details_title">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="product_details_description">Product
                                                                              Details Description</label>
                                                                        <textarea class="form-control"
                                                                              name="product_details_description"
                                                                              id="product_details_description" cols="2"
                                                                              rows="2"></textarea>
                                                                  </div>
                                                                  <!-- End : Part - 2 -->

                                                                  <!-- Start : Part - 3 (Items :- 7) -->
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="cas">Product CAS</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="cas" name="cas">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="inci">Product INCI</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="inci" name="inci">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="composition">Product
                                                                              Composition</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="composition" name="composition">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="appearance">Product
                                                                              Appearance</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="appearance" name="appearance">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="solubility">Product
                                                                              Solubility</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="solubility" name="solubility">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="storage">Product Storage</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="storage" name="storage">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="ingredients_detail">Product
                                                                              Ingredients
                                                                              Detail</label>
                                                                        <textarea class="form-control"
                                                                              name="ingredients_detail"
                                                                              id="ingredients_detail" cols="2"
                                                                              rows="2"></textarea>
                                                                  </div>
                                                                  <!-- End : Part - 3 -->

                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="stock">Product Stock</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="stock" name="stock">
                                                                  </div>
                                                                  <!-- End -->
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