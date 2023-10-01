<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$fetch = "SELECT * from product as p INNER JOIN category as c on p.pcategory = c.id where p.status='0' ";
$pro_result = mysqli_query($conn, $fetch);
if (mysqli_num_rows($pro_result) > 0) {

?>
    
    <!-- Outer Row -->
    <div class="Page Wrapper">
    <div class="Content Wrapper">
        
            
        <div class="container">
            
            <!-- Outer Row -->
            <div class="row justify-content-center">
                
                <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="Main Content">
    <div class="card-body">
    <h2>Trash Product</h2>
                <hr>
                <table class="table table-warning">
                    <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                        <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($pro_data = mysqli_fetch_assoc($pro_result)) {

                    ?>
                    <tr>
                        <td>
                            <?php echo $pro_data['id'] ?>
                        </td>
                        <td>
                            <?php echo $pro_data['pname'] ?>
                        </td>
                        <td>
                            <?php echo $pro_data['name'] ?>
                        </td>
                        <td>
                            <?php echo $pro_data['pdescription'] ?>
                        </td>
                        <td>
                            <?php echo $pro_data['price'] ?>
                        </td>
                        <td>
                            <img src="<?php echo 'img/' . $pro_data['pimage'] ?>" alt="" height="50px" width="50px">

                        </td>
                        <td><a href="restoreproducts.php?id=<?php echo $pro_data['id']; ?>" class="btn btn-primary">Restore</a>
                        </td>
                        <td><a href="deleteproduct.php?id=<?php echo $pro_data['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>


                    </tr>
                    <?php
                }
}
?>
        </tbody>
    </table>
    
    <?php
include('admin/includes/footer.php');


?>