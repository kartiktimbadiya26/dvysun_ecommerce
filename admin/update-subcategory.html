<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["save"])) {
      $id = $_GET["id"];
      $name = $_POST["name"];
      $slug = $_POST["slug"];
      $category = $_POST["category"];
      $query = "UPDATE subcategory SET cat_id = ?, name = ?, slug = ? WHERE id = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("sssi", $category, $name, $slug, $id);
      $stmt->execute();
      header("location: subcategory.php");
}

if (isset($_GET["id"])) {
      $id = $_GET["id"];
      if ($id != "") {
            $query = "SELECT * FROM subcategory where id=$id";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
      } else {
            header("location: subcategory.php");
      }
} else {
      header("location: subcategory.php");
}

include_once "header.php";

?>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">Update subcategory</h2>
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
                                          <form action="update-subcategory.php?id=<?php echo $_GET["id"]; ?>"
                                                method="post" class="form-border-1">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="category">Category</label>
                                                                        <select class="form-select" name="category"
                                                                              required id="category">
                                                                              <?php
                                                                              $query1 = "SELECT * FROM category";
                                                                              $result1 = mysqli_query($conn, $query1);
                                                                              while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                                    if ($row["cat_id"] == $row1["id"]) {
                                                                                          ?>
                                                                                          <option selected
                                                                                                value="<?php echo $row1["id"]; ?>">
                                                                                                <?php echo $row1["name"]; ?>
                                                                                          </option>
                                                                                    <?php } else { ?>
                                                                                          <option
                                                                                                value="<?php echo $row1["id"]; ?>">
                                                                                                <?php echo $row1["name"]; ?>
                                                                                          </option>
                                                                                    <?php }
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                                  <div class="col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="name">subcategory Name</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="name" name="name"
                                                                              value="<?php echo $row["name"]; ?>">
                                                                  </div>
                                                                  <div class=" col-4 mb-4">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="slug">subcategory Slug</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="slug" name="slug"
                                                                              value="<?php echo $row["slug"]; ?>">
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