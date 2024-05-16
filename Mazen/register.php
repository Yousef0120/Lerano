<?php

$host = 'localhost';
$dbname = 'users';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if (empty($fullname) || empty($email) || empty($password)) {
            die('Please fill all required fields!');
        }
        if ($password !== $confirmPassword) {
            die('Passwords do not match!');
        }

        $stmt = $pdo->prepare("SELECT email FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->fetch()) {
            echo "<script>alert('Email already registered. Please use another email.'); window.location.href = 'login.php';</script>";
            exit;
        }


        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO user (fullname, email, password) VALUES (:fullname, :email, :password)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            $signup_success = true;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } elseif (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if (password_verify($password, $user['password'])) {

                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];

                echo "<script>
                        alert('Login successfully!'); window.location.href = '../user/Home.html';
                        
                </script>";
                exit;
            } else {
                echo "<script>alert('invalid password'); window.location.href = 'login.php';</script>";
            }
        } else {
            echo "<script>alert('user not found'); window.location.href = 'login.php';</script>";
        }
    }
}
$phpVariable = "Hello from PHP!";
if (isset($signup_success)) {
    echo "<script>alert('Signup successfully!'); window.location.href = 'login.php';</script>";
}
?>
