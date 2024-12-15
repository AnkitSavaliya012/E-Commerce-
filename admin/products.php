<?php
session_start();
if (isset($_SESSION['unm'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products| Dashboard</title>
    <?php
    include_once('include/style.php');
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->

      <!-- add header -->
      <?php
      include_once('include/header.php');
      ?>

      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <!-- add sidebar -->
      <?php
      include_once('include/sidebar.php');
      ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                  <li class="breadcrumb-item active">Products</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Product list</h3>
                    <a href="product_add.php"><button class="btn btn-primary float-right">Add New</button></a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product price</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include_once('include/config.php');
                        $qry = "SELECT * FROM products ORDER BY id DESC";
                        $result = mysqli_query($con, $qry) or exit("Product select fail: " . mysqli_error($con));

                        while ($row = mysqli_fetch_array($result)) {

                          // Fetch category name
                          $catqry = "SELECT catname FROM categories WHERE id='" . $row['catid'] . "'";
                          $catresult = mysqli_query($con, $catqry) or exit("Category select fail: " . mysqli_error($con));
                          $catrow = mysqli_fetch_array($catresult);

                        
                        ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="../images/products/<?php echo $row['image']; ?>" alt="" width="200px"></td>
                            <td><?php echo isset($catrow['catname']) ? $catrow['catname'] : 'No Category'; ?></td>
                            <td><?php echo $row['productname']; ?></td>
                            <td><?php echo $row['productdescription']; ?></td>
                            <td><?php echo $row['productprice']; ?></td>
                            <td>
                              <a href="product_delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                              <a href="product_edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>


                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product price</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>




          </div>
          <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- add footer -->
    <?php
    include_once('include/footer.php');
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- add script -->
    <?php
    include_once('include/script.php')
    ?>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>

  </body>

  </html>
<?php
} else {
  $_SESSION['error'] = "not access without login";
  header("location:index.php");
}
?>