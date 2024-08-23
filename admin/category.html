<?php

include_once "../database/db.php";
include_once "chek_login.php";

if (isset($_POST["delete"])) {
      $id = $_POST["delete"];
      $query = "DELETE FROM category WHERE id=$id";
      $result = mysqli_query($conn, $query);
}

include_once "header.php";

?>



<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
      <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                  <div class="col-md-6 mb-8 mb-md-0">
                        <h2 class="fs-4 mb-0">Category List</h2>
                  </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                  <div class="card-body px-0 pt-7 pb-0">
                        <div class="table-responsive">
                              <table class="table table-hover align-middle table-nowrap mb-0">
                                    <thead>
                                          <th class="text-center">
                                                ID
                                          </th>
                                          <th class="text-center">
                                                Category Name
                                          </th>
                                          <th class="text-center">
                                                Category Slug
                                          </th>
                                          <th class="text-center">
                                                Created Date
                                          </th>
                                          <th class="text-center">
                                                Action
                                          </th>
                                    </thead>
                                    <tbody>
                                          <?php
                                          $page = 1;
                                          $limit = 5;
                                          $skip = 0;
                                          if (isset($_GET["limit"])) {
                                                if ($_GET["limit"] !== "") {
                                                      $limit = $_GET["limit"];
                                                }
                                          }
                                          if (isset($_GET["page"])) {
                                                if ($_GET["page"] !== "") {
                                                      $page = $_GET["page"];
                                                      $skip = ($_GET["page"] - 1) * $limit;
                                                }
                                          }
                                          $query = "SELECT * FROM category LIMIT $limit OFFSET $skip";
                                          $result = mysqli_query($conn, $query);
                                          $temp = 1;
                                          if (isset($_GET["page"])) {
                                                if ($page != 1)
                                                      $temp = $skip + 1;
                                          }
                                          while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                      <td class="text-center">
                                                            <b>#<?php echo $temp; ?></b>
                                                      </td>
                                                      <td class="text-center">
                                                            <?php echo $row["name"] ?>
                                                      </td>
                                                      <td class="text-center">
                                                            <?php echo $row["slug"] ?>
                                                      </td>
                                                      <td class="text-center">
                                                            <?php echo $row["createdate"] ?>
                                                      </td>
                                                      <td class="text-center">
                                                            <div class="d-flex flex-nowrap justify-content-center">
                                                                  <form method="post">
                                                                        <a href="update-category.php?id=<?php echo $row["id"]; ?>"
                                                                              class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4">
                                                                              <i class="far fa-pen me-2">
                                                                              </i> Edit
                                                                        </a>
                                                                        <button
                                                                              class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"
                                                                              name="delete" value="<?php echo $row["id"]; ?>">
                                                                              <i class="far fa-trash me-2"></i> Delete
                                                                        </button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                </tr>
                                                <?php $temp++;
                                          } ?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
            <nav aria-label="Page navigation example" class="mt-6 mb-4">
                  <ul class="pagination justify-content-start">
                        <li class=" page-item mx-3">
                              <a class="page-link" href="category.php?page=<?php
                              if ($page > 1)
                                    echo $page - 1;
                              else
                                    echo $page; ?>&limit=<?php echo $limit; ?>"><i class="far fa-chevron-left"></i></a>
                        </li>
                        <?php
                        $query = "SELECT * FROM category";
                        $for_count = mysqli_query($conn, $query);
                        $count = $for_count->num_rows;
                        $query = "SELECT * FROM category";
                        for ($i = 1; $i <= ceil($count / $limit); $i++) {
                              if ($page == $i) { ?>
                                    <li class="page-item active mx-3">
                                          <a class="page-link"
                                                href="category.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                                <?php echo $i; ?>
                                          </a>
                                    </li>
                              <?php } else { ?>
                                    <li class="page-item mx-3">
                                          <a class="page-link"
                                                href="category.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                                <?php echo $i; ?>
                                          </a>
                                    </li>
                              <?php }
                        }
                        ?>
                        <li class=" page-item mx-3">
                              <a class="page-link" href="category.php?page=<?php
                              if ($page < ($i - 1))
                                    echo $page + 1;
                              else
                                    echo $page; ?>&limit=<?php echo $limit; ?>"><i
                                          class="far fa-chevron-right"></i></a>
                        </li>
                  </ul>
            </nav>
      </div>
      <?php include_once "small_footer.php" ?>
</main>


<?php

include_once "footer.php";

?>