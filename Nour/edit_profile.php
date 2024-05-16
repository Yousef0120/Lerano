<?php
session_start();
include('connect.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $fetch = mysqli_fetch_assoc($result);
} else {
    die(mysqli_error($conn));
}

$message = [];

if (isset($_POST['edit_profile'])) {
    $newName = mysqli_real_escape_string($conn, $_POST['newName']);
    if ($fetch['fullname'] !== $newName) {
        if (empty($newName)) {
            $message[] = 'Name cannot be empty';
        } elseif (!preg_match("/^[a-zA-Z\s]{3,}$/", $newName)) {
            $message[] = 'Name should contain only letters and spaces with a minimum length of 3 characters';
        } else {
            $sql = "UPDATE user SET fullname = '$newName' WHERE id = '$user_id'";
            mysqli_query($conn, $sql);
            $message[] = 'Name updated successfully';
        }
    }
    $email = $fetch['email'];

    $oldPasswordDB = $fetch['password'];
    $oldPasswordInput = mysqli_real_escape_string($conn, $_POST['updatePassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if (!empty($oldPasswordInput) || !empty($newPassword) || !empty($confirmPassword)) {
        if (!password_verify($oldPasswordInput, $oldPasswordDB)) {
            $message[] = 'current password is incorrect';
        } elseif ($newPassword !== $confirmPassword) {
            $message[] = 'New password and confirm password do not match';
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $newPassword)) {
            $message[] = 'Password should contain at least one uppercase letter, one lowercase letter, and one digit with a minimum length of 8 characters';
        } else {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = '$hashedPassword' WHERE id = '$user_id'";
            mysqli_query($conn, $sql);
            $message[] = 'Password updated successfully';
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
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
    <span class="warning-container">
        <div class="message-container">
            <?php
            if (!empty($message)) {
                foreach ($message as $msg) {
                    echo '<div class="message">' . htmlspecialchars($msg) . '</div>';
                }
            }
            ?>
        </div>
    </span>

    <div class="edit-profile">

        <form method="POST" action="">
            <div class="flex">
                <div class="inputBox">
                    <h1>Edit Profile</h1>
                    <?php echo '<img src="user.png">'; ?>

                    <span for="newName">Your Name:</span>
                    <input type="text" id="name" name="newName" value="<?php echo htmlspecialchars($fetch['fullname']); ?>" class="Box">

                    <span for="email">Your Email:</span>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($fetch['email']); ?>" class="Box" readonly>

                    <input type="hidden" name="oldPasswordDB" value="<?php echo htmlspecialchars($fetch['password']); ?>">
                    <span for="updatePassword">Current Password:</span>
                    <input type="password" name="updatePassword" placeholder="Enter your current password" class="Box">

                    <span for="newPassword">New Password:</span>
                    <input type="password" name="newPassword" placeholder="Enter your new password" class="Box">

                    <span for="confirmPassword">Retype Password:</span>
                    <input type="password" name="confirmPassword" placeholder="Retype your new password" class="Box">
                </div>
            </div>
            <input type="submit" name="edit_profile" value="edit Profile" class="btn">
        </form>
    </div>
    <span class="up"><span></span></span>
    <script src="../Yousef/up.js"></script>
</body>
<special-footer></special-footer>


</html>