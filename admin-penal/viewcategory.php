<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

$fetch = "SELECT * FROM `category` where status = '1' ";

$data = mysqli_query($conn, $fetch);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>

    <div class="container">

        
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Category</h2>
                <hr>
                <table class="table table-warning">
                    <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 65%;">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Trash</th>
                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($data)) {

                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['type'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <?php
                                if ($row['status'] == 1) {
                                    ?>
                                    <td><?php echo "Active" ?></td>
                                    <?php
                                }
                                ?>
                                <td><a href="updatecat.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                                </td>
                                <td><a href="deletecat.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Trash</a>
                                </td>
                            
                                <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>