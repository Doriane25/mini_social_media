
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><Connexion>
  <Registration></Registration></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- partial:index.partial.html -->
  <div id="info">
    <h2>Welcome to Dretic where you kwoledge meets fun<br><br>
    <p id="credit">Based on an idea from Dribbble </p>
  </div>
  <div id="container_welcome">
    <!-- Cover Box -->
    <div id="cover">
      <!-- Sign Up Section -->
      <h1 class="sign-up">Hello, Friend!</h1>
      <p class="sign-up">Enter your personal details<br> and start a journey with us</p>
      <a class="button sign-up" href="#cover">Sign Up</a>
      <!-- Sign In Section -->
      <h1 class="sign-in">Welcome Back!</h1>
      <p class="sign-in">To keep connected with us please<br> login with your personal info</p>
      <br>
      <a class="button sub sign-in" href="#">Sign In</a>
    </div>
    <!-- Login Box -->

    <div id="login">
      <h1>Sign In</h1>
      <a href="#"><img class="social-login" src="images/youtube.png"></a>
      <a href="#"><img class="social-login" src="images/instagram.png"></a>
      <a href="#"><img class="social-login" src="images/twitter.png"></a>
      <p>or use your email account:</p>
      <form action="login_action.php" method="POST">
        <input type="email" placeholder="Email"name="email" autocomplete="off">
        <br>
        <input type="password" placeholder="Password" name="password"  autocomplete="off">
        <br>
        <a id="forgot-pass" href="#">Forgot your password?</a>
        <br>
        <input class="submit-btn" type="submit" name='submit' value="Sign In">
      </form>
    </div>
    <!-- Register Box -->
    <?php
$success = '';
$error = '';
require_once "configure.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    echo 'bonjour tout le monde';
    $fullname = trim($_POST['firstName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["confirm_password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
        $error = '';
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$query->bind_param('s', $email);
	$query->execute();
	// Store the result so we can check if the account exists in the database.
	$query->store_result();
        if ($query->num_rows > 0) {
            $error .= '<p class="error">The email address is already registered!</p>';
        } else {
            // Validate password
            if (strlen($password ) < 6) {
                $error .= '<p class="error">Password must have atleast 6 characters.</p>';
            }

            // Validate confirm password
            if (empty($confirm_password)) {
                $error .= '<p class="error">Please enter confirm password.</p>';
            } else {
                if (empty($error) && ($password != $confirm_password)) {
                    $error .= '<p class="error">Password did not match.</p>';
                }
            }
            if (empty($error) ) {
                $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $insertQuery->bind_param("sss",$fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                    $success .= '<p class="success">Your registration was successful!</p>';
                } else {
                    $error .= '<p class="error">Something went wrong!</p>';
                }
                $insertQuery->close();
            }
        }
    }
    $query->close();
    
    // Close DB connection
    mysqli_close($db);
}
?>
    <div id="register">
      <h1>Create Account</h1>
      <a href="#"><img class="social-login" src="images/youtube.png"></a>
      <a href="#"><img class="social-login" src="images/instagram.png"></a>
      <a href="#"><img class="social-login" src="images/twitter.png"></a>
      <p>or use your email for registration:</p>
      <form action="" method="post">
        <input type="text" placeholder="Name" name="firstName" autocomplete="off">
        <br>
        <input type="email" placeholder="Email" name="email" autocomplete="off">
        <br>
        <input type="password" placeholder="Password" name="password" autocomplete="off">
        <br>
        <input type="password" placeholder="confirm_Password" name="confirm_password" autocomplete="off">
        <br>
        <input class="submit-btn" type="submit" name="submit" value="Sign Up">

        <?php echo $success ? $success : "";  ?>
        <?php echo $error ? $error : ""; ?>
      </form>
    </div>
  </div>
  <!-- END Container -->
  <!-- partial -->
</body>

</html>
