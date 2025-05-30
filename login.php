<?php
session_start();
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>

</head>


  <body class="flex font-poppins items-center justify-center">
    <div class="h-screen w-screen flex justify-center items-center bg-white">
    <div class="grid gap-8">
      <div id="back-div" class="bg-gradient-to-r from-[#16a249] to-teal-600 rounded-[26px] m-4">
        <div class="border-4 border-transparent rounded-[16px] bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2">
          <h1 class="pt-8 pb-6 font-bold text-slate-600 text-5xl text-center cursor-default">Log in</h1>
          <form action="login.php" method="post" class="space-y-4">
            <div>
              <label for="email" class="mb-2 text-lg text-slate-600">Email</label>
              <input type="email" name="email" id="email" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full"  placeholder="example@gmail.com" required />
            </div>
            <div>
              <label for="password" class="mb-2 text-slate-600 text-lg">Password</label>
              <input type="password" name="password" id="password" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full" placeholder="Password" required />
            </div>
            
            <button type="submit"  class="bg-gradient-to-r from-[#16a249] to-teal-600 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:from-teal-600 hover:to-[#16a249] transition duration-300 ease-in-out" >LOG IN</button>
          </form>
          <div class="flex flex-col mt-4 items-center justify-center text-sm">
            <h3 class="text-slate-500">Don't have an account?
              <a href="register.php"  class="group text-blue-400 transition-all duration-100 ease-in-out">
                <span class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">Register</span>
              </a>
            </h3>
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
