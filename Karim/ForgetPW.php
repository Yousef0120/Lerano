<?php
session_start();
include('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $retypePassword = mysqli_real_escape_string($conn, $_POST["retype_password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email.'); window.location.href = '../Mazen/login.php';</script>";
    } else {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            if ($password !== $retypePassword) {
                echo "<script>alert('Passwords don't match.'); window.location.href = '../Mazen/login.php';</script>";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE user SET password = '$hashedPassword' WHERE email = '$email'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "<script>alert('Password reset successfully.'); window.location.href = '../Mazen/login.php';</script>";
                } else {
                    echo "<script>alert('Error resetting password.'); window.location.href = '../Mazen/login.php';</script>";
                    mysqli_error($conn);
                }
            }
        } else {
            echo "<script>alert('Email not found.'); window.location.href = '../Mazen/login.php';</script>";
        }
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="We offer courses and skills learning." />
    <title>Learno | Forget Your Password</title>
    <link rel="stylesheet" href="ForgetPW.css">
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
    <script src="../Yousef/theme.js"></script>
    <script src="../Yousef/valid.js"></script>
    <special-head></special-head>
</head>

<body>
    <div class="parent">

        <div class="container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Forget Password</h2>
                <div class="input-text">
                    <input type="email" name="email" required>
                    <label>Enter Your Email</label>
                </div>
                <div class="input-text2">
                    <input type="password" name="password" required>
                    <label>Enter Your Password</label>
                </div>
                <div class="input-text3">
                    <input type="password" name="retype_password" required>
                    <label>Re-Enter Your Password</label>
                </div>
                <div class="forget">
                    <label for="remember">
                        <input type="checkbox" id="remember">
                        <p>Remember me</p>
                    </label>
                </div>
                <button type="submit">Reset</button>
            </form>
        </div>
        <span class="up"><span></span></span>
        <script src="../Yousef/up.js"></script>
    </div>
    <div class="Parallax">
        <div class="grid"><img id="object" data-value="3" src="../Yousef/Icons/grid.png" alt="No image!"></div>
        <div class="big-circle" id="object" data-value="-3"></div>
        <div class="small-circle" id="object" data-value="1"></div>
        <div class="zigzag-circle"><img id="object" data-value="-3" src="../Yousef/Icons/zigzag_circle.png"></div>
    </div>
</body>
<special-footer></special-footer>

</html>