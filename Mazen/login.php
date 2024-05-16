<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Learno | Registration</title>
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
      <div class="signup-section">
        <header>Sign up</header>
        <br>
        <form id="signupForm" method="post" action="register.php">
          <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
          <input type="email" id="email" name="email" placeholder="Email" required>
          <input type="password" id="password" name="password" placeholder="Password" required>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Retype Password" required>
          <input type="hidden" name="signup" value="1">
          <button type="submit" class="btn">Sign up</button>
        </form>
      </div>

      <div class="login-section">
        <header>Log in</header>
        <form id="loginForm" method="post" action="register.php">
          <input type="email" id="loginEmail" name="email" placeholder="Email" required>
          <input type="password" id="loginPassword" name="password" placeholder="Password" required>
          <input type="hidden" name="login" value="1">
          <a href="../Karim/ForgetPW.php">Forget Password?</a>
          <button type="submit" class="btn">Log in</button>
        </form>
      </div>
    </div>
    <div class="Parallax">
      <div class="grid"><img id="object" data-value="3" src="../Yousef/Icons/grid.png" alt="No image!"></div>
      <div class="big-circle" id="object" data-value="-3"></div>
      <div class="small-circle" id="object" data-value="1"></div>
      <div class="zigzag-circle"><img id="object" data-value="-3" src="../Yousef/Icons/zigzag_circle.png"></div>
    </div>
    <script src="login.js"></script>
    <span class="up"><span></span></span>
    <script src="../Yousef/up.js"></script>
  </div>
</body>
<special-footer></special-footer>

</html>