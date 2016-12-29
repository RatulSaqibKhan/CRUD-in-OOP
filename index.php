<?php
require_once './header.php';
require_once './Database_connection.php';

$db_obj = new Database_connection();

$all_data = $db_obj->retrieve();
//print_r($all_data->fetch_assoc());
?>

<body>
    <div class="container">
        <div class="col-md-12">
            <h1 class="header-css">All User Information</h1>
        </div>
        <div class="col-md-12 body-css">
            <div class="col-md-2"></div>
            <div class="col-md-9 col-sm-12">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($all_data)) {
                            while ($val = $all_data->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $val['id']; ?></td>
                                    <td><?php echo $val['name']; ?></td>
                                    <td><?php echo $val['age']; ?></td>
                                    <td><?php echo ($val['gender'] == 1 ? 'Male' : 'Female'); ?></td>
                                    <td><?php echo $val['address']; ?></td>
                                    <td>
                                        <a href="./edit.php?id=<?php echo $val['id']; ?>">Edit</a> |
                                        <a href="./delete.php?id=<?php echo $val['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="col-md-12">
            <h2 class="footer-css"><a href="./form.php" class="link-css">Add New Data</a></h2>
        </div>
    </div>
</body>
</html>