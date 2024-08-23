<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["save"])) {
      $id = $_GET["id"];
      $name = $_POST["name"];
      $slug = $_POST["slug"];
      $query = "UPDATE category SET name = ?, slug = ? WHERE id = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ssi", $name, $slug, $id);
      $stmt->execute();
      header("location: category.php");
}

if (isset($_GET["id"])) {
      $id = $_GET["id"];
      if ($id != "") {
            $query = "SELECT * FROM category where id=$id";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
      } else {
            header("location: category.php");
      }
} else {
      header("location: category.php");
}

include_once "header.php";

?>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">Update category</h2>
                  </div>
                  <div class="col-sm-6 mb-8 mb-sm-0 text-end">
                        <h6><a href="category.php">Back To category Table</a></h6>
                  </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body pt-7 pb-0 px-0">
                        <div class="mx-n8">
                              <div class="px-8">
                                    <section class="p-xl-8">
                                          <form action="update-category.php?id=<?php echo $_GET["id"]; ?>" method="post"
                                                class="form-border-1">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <div class="col-6 mb-6">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="name">Category Name</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="name" name="name"
                                                                              value="<?php echo $row["name"]; ?>">
                                                                  </div>
                                                                  <div class="col-6 mb-6">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="slug">Category Slug</label>
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