<?php
// Database connection
$servername = "localhost";
$username = "root"; // default username for WAMP
$password = ""; // default password for WAMP (empty)
$dbname = "user_db"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['c_pass'];

    // Validate password match
    if ($password != $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database (no profile image)
        $sql = "INSERT INTO users (name, email, password) 
                VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.html" class="logo">Education</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name">Shaikh Anas</h3>
         <p class="role">Student</p>
         <a href="profile.html" class="btn">View Profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">Login</a>
            <a href="register.html" class="option-btn">Register</a>
         </div>
      </div>
   </section>
</header>

<div class="side-bar">
   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt=""> 
      <h3 class="name">Shaikh Anas</h3>
      <p class="role">Student</p>
      <a href="profile.html" class="btn">View Profile</a>
   </div>

   <nav class="navbar">
      <a href="home.html"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="about.html"><i class="fas fa-question"></i><span>About</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>Courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>Teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>Contact Us</span></a>
   </nav>
</div>

<section class="form-container">
   <form action="register.php" method="post">
      <h3>Register Now</h3>
      <p>Your Name <span>*</span></p>
      <input type="text" name="name" placeholder="Enter your name" required maxlength="50" class="box">
      <p>Your Email <span>*</span></p>
      <input type="email" name="email" placeholder="Enter your email" required maxlength="50" class="box">
      <p>Your Password <span>*</span></p>
      <input type="password" name="pass" placeholder="Enter your password" required maxlength="20" class="box">
      <p>Confirm Password <span>*</span></p>
      <input type="password" name="c_pass" placeholder="Confirm your password" required maxlength="20" class="box">
      <input type="submit" value="Register New" name="submit" class="btn">
   </form>
</section>

<footer class="footer">
   <!-- Footer content -->
</footer>

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>
