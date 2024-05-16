    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        include('connect.php');
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM user WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if ($result !== false && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $fullname = $row['fullname'];
            $email = $row['email'];
            $password = $row['password'];
        } else {
            echo "Error: User not found";
        }
        mysqli_close($conn);
    } else {
        echo "Error: User ID not set";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>My Profile</title>
        <link rel="stylesheet" href="myProfile.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/3ff4d3b607da33fdf736f779bc636648?family=Hiruko+Black+Alternate" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../Yousef/Css/theme.css">
        <link rel="Icon" href="../Yousef/Icons/learn.png">
        <script src="../user/theme.js"></script>
        <special-head></special-head>
    </head>

    <body>
        <div class="container">
            <div class="profile-info">
                <h1>Welcome <?php echo $fullname; ?></h1>
                <?php echo '<img src="user.png">'; ?>
                <h3>Name: <?php echo $fullname; ?></h3>
                <h3>Email: <?php echo $email; ?></h3>
                <a href="edit_profile.php" class="btn">Edit Profile</a>
            </div>
        </div>
        <span class="up"><span></span></span>
        <script src="../Yousef/up.js"></script>
    </body>
    <special-footer></special-footer>

    </html>