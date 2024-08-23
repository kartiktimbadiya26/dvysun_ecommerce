<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["delete"])) {
      $id = $_GET["id"];
      $arr = explode(",", $_POST["delete"]);
      $img_unlink = $arr[count($arr) - 1];
      unlink("../assets/images/products/$img_unlink");
      unset($arr[count($arr) - 1]);
      if (count($arr) > 1)
            $img = implode(",", $arr);
      $query = "UPDATE product SET images=? WHERE id=?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "si", $img, $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
}

if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $query = "SELECT images FROM product WHERE id=$id";
      $result = mysqli_query($conn, $query);
      $str_img = $result->fetch_assoc();
      $arr_img = explode(",", $str_img["images"]);
      // print_r($arr_img);
} else {
      header("location:index.php");
}

include_once "header.php";

?>
<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-md-6 mb-8 mb-md-0">
                        <h2 class="fs-4 mb-0">product List</h2>
                  </div>
            </div>

            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body px-0 pt-7 pb-0">
                        <form enctype="multipart/form-data" method="post" class="form-border-1">
                        </form>
                        <form enctype="multipart/form-data" method="post" class="form-border-1">
                              <div class="table-responsive">
                                    <table class="table table-hover align-middle table-nowrap mb-0">
                                          <thead>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Delete</th>
                                          </thead>
                                          <tbody>
                                                <?php
                                                for ($i = 0; $i < count($arr_img); $i++) {
                                                      if ($arr_img[$i] !== "") { ?>
                                                            <tr>
                                                                  <td>#<?php echo $i + 1; ?></td>
                                                                  <td><img src="../assets/images/products/<?php echo $arr_img[$i]; ?>"
                                                                              alt="" srcset="" height="100"></td>
                                                                  <td>
                                                                        <button type="submit"
                                                                              class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"
                                                                              name="delete" value="<?php
                                                                              $new_arr = array(implode(",", array_diff($arr_img, [$arr_img[$i]])), $arr_img[$i]);
                                                                              print_r(implode(",", $new_arr));
                                                                              ?>">
                                                                              <i class="far fa-trash me-2"></i> Delete
                                                                        </button>
                                                                  </td>
                                                            </tr>
                                                      <?php }
                                                } ?>
                                          </tbody>
                                    </table>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
      <?php include_once "small_footer.php" ?>
</main>



<?php
include_once "footer.php";
?>