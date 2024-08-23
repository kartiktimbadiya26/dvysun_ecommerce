<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["save"])) {
      $name = $_POST["name"];
      $slug = $_POST["slug"];
      $category = $_POST["category"];
      $query = "INSERT INTO subcategory (cat_id,name,slug) VALUES (?,?,?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("sss", $category, $name, $slug);
      $stmt->execute();
      header("location: subcategory.php");
}

$query = "SELECT * FROM category";
$category_result = mysqli_query($conn, $query);
// $row = $result->fetch_assoc();
// print_r($row);

include_once "header.php";

?>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">add subcategory</h2>
                  </div>
                  <div class="col-sm-6 mb-8 mb-sm-0 text-end">
                        <h6><a href="subcategory.php">Back To subcategory Table</a></h6>
                  </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body pt-7 pb-0 px-0">
                        <div class="mx-n8">
                              <div class="px-8">
                                    <section class="p-xl-8">
                                          <form action="add-subcategory.php" method="post" class="form-border-1">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="category">Category</label>
                                                                        <select class="form-select" name="category"
                                                                              required id="category">
                                                                              <option value="" selected disabled> --Select
                                                                                    category-- </option>
                                                                              <?php
                                                                              while ($row = mysqli_fetch_assoc($category_result)) {
                                                                                    ?>
                                                                                    <option value="<?php echo $row["id"]; ?>">
                                                                                          <?php echo $row["name"]; ?>
                                                                                    </option>
                                                                              <?php }
                                                                              ?>
                                                                        </select>
                                                                  </div>
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="name">subcategory Name</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="name" name="name">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="slug">subcategory Slug</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="slug" name="slug">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <br>
                                                <button class="btn btn-primary" type="submit" name="save">Save
                                                      changes</button>
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