<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $query = "SELECT * FROM blog WHERE id=$id";
      $result = mysqli_query($conn, $query);
      $row = $result->fetch_assoc();
} else {
      header("location:blog.php");
}

if (isset($_POST["save"])) {
      $title = $_POST["title"];
      $blog = $_POST["blog"];
      $id = $_GET["id"];
      if (isset($_FILES['image']['name'])) {
            $path = $_FILES['image']['name'];
            $upload_path = "../assets/images/blog/$path";
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
            $im = $row["image"];
            print_r(unlink("../assets/images/blog/$im"));
            // UPDATE category SET name = ?, slug = ? WHERE id = ?
            $query = "UPDATE blog SET title = ? , image = ? , description = ? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $title, $path, $blog, $id); ?>
            <script>
                  alert("call")
            </script>
      <?php } else {
            $query = "UPDATE blog SET title = ? , description = ? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $title, $blog, $id);
      }
      $stmt->execute();
      header("location: blog.php");
}

if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $query = "SELECT * FROM blog WHERE id=$id";
      $result = mysqli_query($conn, $query);
      $row = $result->fetch_assoc();
} else {
      header("location:blog.php");
}

include_once "header.php";

?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0">update blog</h2>
                  </div>
                  <div class="col-sm-6 mb-8 mb-sm-0 text-end">
                        <h6><a href="blog.php">Back To blog Table</a></h6>
                  </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body pt-7 pb-0 px-0">
                        <div class="mx-n8">
                              <div class="px-8">
                                    <section class="p-xl-8">
                                          <form action="" method="post" class="form-border-1"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <div class="row gx-9">
                                                                  <div class="col-6 mb-6">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="title">Title</label>
                                                                        <input class="form-control" type="text" required
                                                                              id="title" name="title"
                                                                              value="<?php echo $row["title"]; ?>">
                                                                  </div>
                                                                  <div class="col-6 mb-6">
                                                                        <label class="mb-5 me-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="image"> Thumbnail Image</label>
                                                                        <img src="../assets/images/blog/<?php echo $row["image"]; ?>"
                                                                              alt="" srcset="" height="100">
                                                                  </div>
                                                                  <div class="col-12 mb-6">
                                                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                              for="image">Select Thumbnail Image</label>
                                                                        <input class="form-control" type="file"
                                                                              accept="image/*" id="image" name="image"
                                                                              required>
                                                                  </div>
                                                                  <div class="col-12 mb-6">
                                                                        <textarea id="blog_part"
                                                                              name="blog"><?php echo $row["description"]; ?></textarea>
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