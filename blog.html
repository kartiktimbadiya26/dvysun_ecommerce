<?php
include_once "database/db.php";
$page = 1;
$limit = 12;
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
$query = "SELECT * FROM blog LIMIT $limit OFFSET $skip";
$result = mysqli_query($conn, $query);


include_once "header.php";

?>
<main id="content" class="wrapper layout-page">
      <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                  <div class="container">
                        <nav class="py-4 lh-30px" aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center py-1">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Update</li>
                              </ol>
                        </nav>
                  </div>
            </div>
            <div class="text-center py-13">
                  <div class="container">
                        <h2 class="mb-0">Blog Update</h2>
                  </div>
            </div>
      </section>
      <div class="container mb-lg-18 mb-15 pb-3">
            <div class="row gy-50px">
                  <?php while ($row = $result->fetch_assoc()) {
                        // print_r($row);
                  ?>
                        <div class="col-md-6 col-lg-4">
                              <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                                    <figure class="card-img-top position-relative mb-10"><a href="blog-view.php?id=<?php echo $row["id"]; ?>"
                                                class="hover-shine hover-zoom-in d-block"
                                                title="How to Plop Hair for Bouncy, Beautiful Curls">
                                                <img data-src=" ./assets/images/blog/<?php echo $row["image"]; ?>"
                                                      class="img-fluid lazy-image w-100"
                                                      alt="How to Plop Hair for Bouncy, Beautiful Curls" width="370"
                                                      height="450" src="#">
                                          </a>
                                    </figure>
                                    <div class="card-body text-center px-md-9 py-0">
                                          <h4 class="card-title lh-base mb-9">
                                                <a class="text-decoration-none"
                                                      href="blog-view.php?id=<?php echo $row["id"]; ?>"
                                                      title="How to Plop Hair for Bouncy, Beautiful Curls"><?php echo $row["title"]; ?></a>
                                          </h4>
                                          <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                                                <li class="list-inline-item border-end pe-5 me-5">By <a href=""
                                                            title="Admin">Admin</a></li>
                                                <li class="list-inline-item"><?php $date = new DateTime($row["createdate"]);
                                                                              echo $date->format('M jS, Y'); ?>
                                                </li>
                                          </ul>
                                    </div>
                              </article>
                        </div>
                  <?php } ?>
            </div>
            <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp">
                  <ul class="pagination m-0">
                        <li class="page-item">
                              <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                                    href="blog.php?page=<?php
                                                            if ($page > 1)
                                                                  echo $page - 1;
                                                            else
                                                                  echo $page; ?>&limit=<?php echo $limit; ?>" aria-label="Previous">
                                    <svg class="icon">
                                          <use xlink:href="#icon-angle-double-left"></use>
                                    </svg>
                              </a>
                        </li>
                        <?php
                        $query = "SELECT * FROM blog";
                        $for_count = mysqli_query($conn, $query);
                        $count = $for_count->num_rows;
                        $query = "SELECT * FROM blog";
                        for ($i = 1; $i <= ceil($count / $limit); $i++) {
                              if ($page == $i) { ?>
                                    <li class="page-item active mx-3">
                                          <a class="page-link" href="blog.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                                <?php echo $i; ?>
                                          </a>
                                    </li>
                              <?php } else { ?>
                                    <li class="page-item mx-3">
                                          <a class="page-link" href="blog.php?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>">
                                                <?php echo $i; ?>
                                          </a>
                                    </li>
                        <?php }
                        }
                        ?>
                        <li class="page-item">
                              <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                                    href="blog.php?page=<?php
                                                            if ($page < ($i - 1))
                                                                  echo $page + 1;
                                                            else
                                                                  echo $page; ?>&limit=<?php echo $limit; ?>" aria-label="Next">
                                    <svg class="icon">
                                          <use xlink:href="#icon-angle-double-right"></use>
                                    </svg>
                              </a>
                        </li>
                  </ul>
            </nav>
      </div>
</main>
<?php include_once "footer.php"; ?>