<?php
session_start();
if(isset($_SESSION['unm'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Product | Dashboard</title>
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
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item"><a href="products.php">Product</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluserid -->
    
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PRODUCTS ADD</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <?php
                      include_once('include/config.php');
                      $qry="select* from  categories order by id  desc"; 
                      $result=mysqli_query($con,$qry) or exit("category select fail".mysqli_error($con));     
               ?>
              <form action="product_add_db.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                     <div class="form-group">
                            <label for="exampleInputEmail1">Select Category Name</label>
                                <select class="form-control" name="catid" id="catid">
                                    <option value=""selected disabled>Select Category</option>
                                    <?php
                                    while($row=mysqli_fetch_array($result)){
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['catname'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                    </div>
                    <div class="form-group">
                         <label for="exampleInputEmail1">Select Sub Category</label>
                         <select class="form-control" name="subcatid" id="subcatid">
                            <option value="" selected disabled>Select Category First</option>
                         </select>
                  </div>
                    <div class="form-group">
                         <label for="exampleInputEmail1">Product Name</label>
                         <input type="text" class="form-control" id="productname" name="productname" placeholder="Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Description</label>
                    <textarea name="productdescription" class="form-control" id="productcatdescription"></textarea>
                  </div>
                  <div class="form-group">
                         <label for="exampleInputEmail1">Product Price</label>
                         <input type="text" class="form-control" id="productprice" name="productprice" placeholder="Product Price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Select Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ADD </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
 <script>
    $(document).ready(function(){
        $("#catid").change(function(){
            var catid=$(this).val();
            $.ajax({
                url:"getsubcat.php",
                type:"GET",
                cache:false,
                data:{
                    "id":catid
                },
                success:function(result){
                    $("#subcatid").html(result);
                }
            });
        });
    });
 </script>

</body>
</html>
<?php
}else{
  $_SESSION['error']="not access without login";
  header("location:index.php");
}