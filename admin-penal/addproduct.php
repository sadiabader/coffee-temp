<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config.php');

if(isset($_POST['addpro'])){
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmp = $_FILES['pimage']['tmp_name'];
    $pimage_size = $_FILES['pimage']['size'];
   


    $check_product = "SELECT * from product where pname = '$pname'";
    $result = mysqli_query($conn, $check_product);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Product already exist'); </script>";
    } else {
        $insert_pro = "INSERT INTO `product` (`pname`, `pcategory`, `pdescription`, `price`, `pimage`) 
        VALUES ('$pname', '$pcat', '$pdesc', '$price', '$pimage')
        ";
        $connection_insert = mysqli_query($conn, $insert_pro);
        move_uploaded_file($pimage_tmp, 'images/' . $pimage);
        if($connection_insert){
            echo "<script> alert('Product added successfully'); </script>";

        }
        // header('location:addcat.php');
    }


}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Modal -->
  <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Products Page</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="form-group">
           

           <div class="row">
              <div class="col-md-6">
                <label for="pname"> Product Name </label>
                <input type="text" name="pname" class="form-control">
              </div>
              <div class="col-md-12">

                <?php
                $product = "SELECT * from category";
                $result1 = mysqli_query($conn, $product);
                if(mysqli_num_rows($result1) > 0) {

                
                ?>
                <select class="form-select" name="pcat" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result1)){
                    ?>
                    <option value="<?php echo $row['Cid']?>"><?php echo  $row['Cname']?></option>
                    <?php
                    }  
                    }                
                    ?>
                </select>
                </div>

              <label for="floatingTextarea">Description</label>
              <div class="form-floating">
                <textarea name="pdesc" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>
            

            <div class="row">
              <div class="col-md-6">
                <label for="price"> Price </label>
                <input type="text" name="price" class="form-control">
              </div>

                <label for="image"> Image </label>
                <input type="file" name="pimage" class="form-control">
              <!-- <div class="col-md-6">
                <label for="pimage"> Choose Image </label>
                <input type="file" name="pimage" class="form-control">
              </div>
            </div> -->
            </div>
                       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addpro" class="btn btn-primary">Add Product</button>
        </div>
        </form>



      </div>
    </div>
  </div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product Page</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Product Page </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="
    color: black;
    font-size: 25px;
    font-family: 'Times New Roman', Times, serif;
    font-style: italic;
    font-weight: bold;">Products Table</h3>
      <a href="" class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#AddUserModal"> Add Product </a>
    </div>

    <!-- /.card-header -->
    <?php
     $limit = 4;
     if(isset($_GET['pageno'])){
      $getpageno = $_GET['pageno'];
     }else{
       $getpageno = 1;
     }
     $offset = ($getpageno - 1) * $limit;
    $fetching_pro = "SELECT * from product as p INNER JOIN category as c on p.pcategory = c.Cid  order by pid desc limit {$offset}, {$limit}";
    $pro_result = mysqli_query($conn, $fetching_pro);
    if (mysqli_num_rows($pro_result) > 0) {
       
    
    
    
    ?>

    <div class="card-body">
      <table id="example1" class="table table-dark table-bordered text-center table-striped">
        <thead>
          <tr>
           
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($pro_data = mysqli_fetch_assoc($pro_result)) {

            ?>
            <tr>
              <td>
                <?php echo $pro_data['pid'] ?>
              </td>
              <td>
                <?php echo $pro_data['pname'] ?>
              </td>
              <td>
                <?php echo $pro_data['Cname'] ?>
              </td>
              <td>
                <?php echo $pro_data['pdescription'] ?>
              </td>
              <td>
                <?php echo $pro_data['price'] ?>
              </td>
              <td>
                <img src="<?php echo 'images/' . $pro_data['image'] ?>" alt="" height="50px" width="50px">
                
              </td>

              
            </tr>
            <?php
          }
        }
          ?>
        </tbody>
      </table>
      <?php
      $pagination = "SELECT * from `product`";
      $product = mysqli_query($conn, $pagination);

      if(mysqli_num_rows($product) > 0){
        $total_records = mysqli_num_rows($product);
        $pages = ceil($total_records / $limit);
        echo '  <ul class="pagination">';
        if($getpageno > 1){

          echo "<li class='page-item'><a class='page-link' href='addproduct.php?.($getpageno - 1).''> Prev </a></li>";
        }
        for($i = 1; $i <= $pages; $i++){
          $active = $i == $getpageno? "active" : "";
          echo " <li class='page-item'>
          <a class='page-link {$active}' href='addproduct.php?pageno={$i}'>{$i}</a>
          </li>";
        }
        if($pages > $getpageno){
  
          echo "<li class='page-item'><a class='page-link' href='addproduct.php?.($getpageno + 1).''> next </a></li>";
        }
      }
      
      
      ?>
    
    </div>
  </div>
</div>


<?php
include('includes/footer.php');
?>