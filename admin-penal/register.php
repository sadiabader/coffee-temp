<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');
  
$limit = 2;
if(isset($_GET['page'])){
  
  $getpgno = $_GET['page'];
}else{
  $getpgno = 1;
}
$offset = ($getpgno - 1) * $limit;

$fetch = "SELECT * FROM `user-admin` where status = '1' limit {$offset}, {$limit}";

$data = mysqli_query($conn, $fetch);

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
          <form action="adduser.php" method="post" class="form-group">
            <div>
              <label for="name"> Name </label>
              <input type="text" name="name" class="form-control">
            </div>

            <div>
              <label for="email"> Email </label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="pass"> Password </label>
                <input type="password" name="pass" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="cpass"> Confirm Password </label>
                <input type="password" name="cpass" class="form-control">
              </div>
            </div>

            <div>
              <label for="phone"> Phone </label>
              <input type="number" name="phone" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="adduser" class="btn btn-primary">Add User</button>
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
          <h1 class="m-0">Registered Users</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Registered users</li>
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
      <a href="" class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#AddUserModal"> Add
        User</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-primary table-bordered  text-center table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($data)) {

            ?>
            <tr>
              <td>
                <?php echo $row['id'] ?>
              </td>
              <td>
                <?php echo $row['name'] ?>
              </td>
              <td>
                <?php echo $row['email'] ?>
              </td>
              <td>
                <?php echo $row['phone'] ?>
              </td>

              <td>

                <a href="Updateuser.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><?php echo 'Update' ?></a>
                <a href="Trash.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><?php echo 'Trash' ?></a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <div class="container mt-4">
        

      <?php
        $fetchpage = "SELECT * from  `user-admin`";
        $query = mysqli_query($conn, $fetchpage);
        
          if(mysqli_num_rows($query) > 0){
            $totalRecords = mysqli_num_rows($query);
            $totalpages = ceil($totalRecords / $limit);
            echo '<ul class="pagination">';
            if($getpgno > 1){
              echo '<li class="page-item"><a class="page-link" href="registeredusers.php?page='.($getpgno - 1).'">prev</a></li>';

            }
            for($i = 1; $i <= $totalpages; $i++){
              $active = $i == $getpgno? "active" : "";
              echo '<li class="'.$active.' page-item"><a class="page-link" href="registeredusers.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($getpgno < $totalpages){
              echo '<li class="page-item"><a class="page-link" href="registeredusers.php?page='.($getpgno + 1).'">next</a></li>';

            }

          }
      ?>
  </div>

    </div>
  </div>
  
</div>

<?php
include('admin/includes/footer.php');
?>