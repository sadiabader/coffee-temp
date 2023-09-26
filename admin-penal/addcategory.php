<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');

if(isset($_POST['addcat'])){
    $cat_id = $_POST['catid'];
    $cat_name = $_POST['catname'];
    $cat_type = $_POST['cattype'];
    $cat_des = $_POST['catdes'];
    $cat_status = $_POST['catstatus'];

    $cat = "SELECT * from category where cname = '$cat_name'";
    $result = mysqli_query($conn, $cat);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('category already exist'); </script>";
    } else {
        $insert_cat = "INSERT INTO `category` (`Cid`, `Cname`, `Ctype`, `Cdescription`, `Cstatus`) VALUES ('$cat_id', '$cat_name', '$cat_type','$cat_des', '$cat_status')";
        $connection_insert = mysqli_query($conn, $insert_cat);
        if($connection_insert){
            echo "<script> alert('category added successfully'); </script>";

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
          <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration Form</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-group">
            <div>
              <label for="id"> ID </label>
              <input type="number" name="catid" class="form-control">
            </div>

           <div class="row">
              <div class="col-md-6">
                <label for="catname"> Category Name </label>
                <input type="text" name="catname" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="cattype"> Type </label>
                <input type="text" name="cattype" class="form-control">
              </div>
              <label for="floatingTextarea">Description</label>
              <div class="form-floating">
                <textarea name="catdes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="catstatus">
                <option selected>Open this select menu</option>
                <option value="1">Active</option>
                <option value="2">Deactivate</option>
                
            </select>

           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addcat" class="btn btn-primary">Add Category</button>
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
          <h1 class="m-0">Category Page</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Category Page </li>
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
    font-weight: bold;">Registered Users Table</h3>
      <a href="" class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#AddUserModal"> Add Category </a>
    </div>

    <!-- /.card-header -->
  </div>
</div>

<?php
include('admin/includes/footer.php');
?>