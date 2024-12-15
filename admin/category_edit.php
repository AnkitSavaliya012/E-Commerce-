<?php
  session_start();
  if(isset($_SESSION["unm"]))
  {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Layout | Dashboard</title>

<?php
    include_once('include/style.php');
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
    <?php
        include_once('include/header.php');
    ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
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
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active">Category Edit</li>
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
        <div class="col-md-12">
            <div class="card-title">
                <h3 class="card-title">CATEGORY EDIT</h3>
            </div>

            <?php
                 include_once('include/config.php');
                 $id = $_REQUEST['id'];
                 $qry="select * from categories where id=$id";
                 $result = mysqli_query($con,$qry) or exit("category select fail".mysqli_error($con));
                 $row=mysqli_fetch_array($result);
            ?>


        <form action="category_update_db.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categorie Name</label>
                    <input type="txt" class="form-control" id="catname" name="catname" 
                    placeholder="Categorie Name" value="<?php echo $row['catname']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Categorie Description</label>
                    <textarea class="form-control" name="catdescription" id="catdescription">
                    <?php echo $row['catdescription']; ?>
                    </textarea>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Select Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Image</label>
                        <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                        <img src="../images/categories/<?php echo $row['image'] ?>" alt="" width="200px">                    
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
        </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php
        include_once('include/footer.php');
    ?>

</div>
    <!-- ./wrapper -->
    <?php
        include_once('include/script.php');
    ?>

</body>
</html>
<?php
}
else
{
  $_SESSION["error"] = "you are not autorize to access this page without login";
  header('location:index.php');
}
?>