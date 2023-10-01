<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$fetch = "SELECT * from product as p INNER JOIN category as c on p.pcategory = c.id where p.status = '1' ";
$data = mysqli_query($conn, $fetch);
if (mysqli_num_rows($data) > 0) {

?>
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>

<body>
    
    <!-- Outer Row -->
    <div class="Page Wrapper">
    <div class="Content Wrapper">
        
            
        <div class="container">
            
            <!-- Outer Row -->
            <div class="row justify-content-center">
                
                <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="Main Content">
                <h2>View Products</h2>
                <hr>
                <table class="table table-warning">
                    <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Trash</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($data)) {

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $row['id'] ?>
                                </th>
                                <td>
                                    <?php echo $row['pname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pdescription'] ?>
                                </td>
                                <td>
                            <?php echo $row['price'] ?>
                        </td>
                        <td>
                            <img src="<?php echo 'img/' . $row['pimage'] ?>" alt="" height="50px" width="50px">

                        </td>
                                <td><a href="updateproduct.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Update</a>
                                </td>
                                <td><a href="trashproduct.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Trash</a></td>
                                <?php
                        }
                    }
                        ?>
                    </tbody>
                </table>

            

    








        <?php
include('admin/includes/footer.php');


?>