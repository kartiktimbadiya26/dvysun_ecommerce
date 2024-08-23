<?php
include_once "../database/db.php";
include_once "chek_login.php";

if (!isset($_GET["id"])) {
      header("location: product.php");
} else {
      $id = $_GET["id"];
      $query = "SELECT * FROM product WHERE id=$id";
      $result = mysqli_query($conn, $query);
      if ($result->num_rows !== 1) {
            header("location: product.php");
      } else {
            $row = $result->fetch_assoc();
      }
}

if (isset($_POST["save"])) {
      $stock = $_POST["stock"];
      $query = "INSERT INTO stock (added_stock,product_id) VALUES (?,?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $stock, $id);
      $stmt->execute();
      $total_stock = (int) $stock + (int) $row["stock"];
      $query = "UPDATE product SET stock=? WHERE id=? ";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("si", $total_stock, $id);
      $stmt->execute();
      header("location: product.php");
}

include_once "header.php";

?>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">add stock</h2>
                  </div>
                  <div class="col-sm-6 mb-8 mb-sm-0 text-end">
                        <h6><a href="product.php">Back To Product Table</a></h6>
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
                                                                  <div class="col-6 mb-6">
                                                                        <label
                                                                              class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Product
                                                                              Name</label>
                                                                        <input class="form-control" type="text"
                                                                              value="<?php echo $row["name"] ?>"
                                                                              readonly>
                                                                  </div>
                                                                  <div class="col-6 mb-6">
                                                                        <label
                                                                              class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Product
                                                                              Current Stock</label>
                                                                        <input class="form-control" type="text"
                                                                              value="<?php echo $row["stock"] ?>"
                                                                              readonly>
                                                                  </div>
                                                                  <div class="col-6 mb-6">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="stock">stock Slug</label>
                                                                        <input class="form-control" type="number"
                                                                              required id="stock" name="stock">
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