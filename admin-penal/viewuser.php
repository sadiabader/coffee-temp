<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$fetching = "SELECT * FROM `register-user` where status = '1'";

$data = mysqli_query($connection, $fetching);
?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Registerd users</h2>
                <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                             <th scope="col">Id</th>
                            <th scope="col">FirstName</th>
                            <th scope="col">LastName</th>
                            <th scope="col">Email</th>
                            <th scope="col">Update</th>
                            <th scope="col">Trash</th>
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
                                    <?php echo $row['fname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['lname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td><a href="updateuser.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                                </td>
                                <td><a href="trashuser.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Trash</a></td>
                                <?php
                        }
                        ?>
                    
                </tr>
               
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>

            </div>

        </div>

    </div>


</body>

</html>


<?php
include('admin/includes/footer.php');


?>