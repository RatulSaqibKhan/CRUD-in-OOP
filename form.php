<?php
require_once './header.php';
require_once './Database_connection.php';

$db_obj = new Database_connection;
if (isset($_POST['submit'])) {
    $response = $db_obj->insert($_POST);

    if (is_array($response)) {
        extract($response);
    } else {
        echo $response;
    }
}
?>
<body>
    <div class="container">
        <div class="col-md-12">
            <h1 class="header-css">Add User Information</h1>
        </div>
        <div class="col-md-12 body-css">
            <div class="col-md-2"></div>
            <div class="col-md-9">
                <form class="form-group" action="" method="post" enctype="">
                    <p>
                        <label for="name" class="label-text-css">Name:</label>
                        <input type="text" name="name" placeholder="Name" value="<?php echo (!empty($_POST['name'])? $_POST['name']:''); ?>" class="form-control input-css text-css">
                    <h4 class="h4-warning-css"><?php echo (!empty($name_error)? $name_error:''); ?></h4>
                    </p>
                    <p>
                        <label for="age" class="label-text-css">Age:</label>
                        <input type="text" name="age" placeholder="Age" value="<?php echo (!empty($_POST['age'])? $_POST['age']:''); ?>" class="form-control input-css text-css">
                    <h4 class="h4-warning-css"><?php echo (!empty($age_error)? $age_error:''); ?></h4>
                    </p>
                    <p>
                        <label for="gender" class="label-text-css">Gender:</label>
                        <select name="gender" class="form-control input-css">
                            <option class="text-css" value="">Select Gender</option>
                            <option class="text-css" value="1" <?php echo ((@$_POST['gender'] == 1)? 'selected':''); ?>>Male</option>
                            <option class="text-css" value="2" <?php echo ((@$_POST['gender'] == 2)? 'selected':''); ?>>Female</option>
                        </select>
                    <h4 class="h4-warning-css"><?php echo (!empty($gender_error)? $gender_error:''); ?></h4>
                    </p>
                    <p>
                        <label for="address" class="label-text-css">Address:</label>
                        <textarea type="text" name="address" placeholder="Address" class="form-control input-css text-css"><?php echo (!empty($_POST['address'])? $_POST['address']:''); ?></textarea>
                    <h4 class="h4-warning-css"><?php echo (!empty($address_error)? $address_error:''); ?></h4>
                    </p>
                    <p>
                        <button name="submit" class="btn-success label-text-css">Submit</button>
                    </p>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="col-md-12">
            <h2 class="footer-css"><a href="./index.php" class="link-css">View Data</a></h2>
        </div>
    </div>
</body>
</html>