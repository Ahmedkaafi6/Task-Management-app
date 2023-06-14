<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{

 $user_name = $_POST['user_name'];
 $password = $_POST['password'];
 if(! empty ($user_name) && ! empty ($password) && !is_numeric($user_name))
 {
    //save to database
    $user_id = random_num(20);
    $query = "insert into Users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
    mysqli_query($con, $query);

    header("Location: login.php");
     die;


 } else 
  { 
    echo "Please enter a valid informations!!";
  }

 }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
   <style>body {
    background-color: #081b29;
    font-family: Arial, sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
  }
  
  .container {
    align-items: center;
    max-width: 300px;
    height: 400px;
    margin: 0% auto;
    margin-top: 200px;
    padding: 20px;
    
  }
  
  h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #00abf0;
    animation: fadeIn 1s ease-in-out;
  }
  
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  form {
    max-width: 400px;
    padding: 40px;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    animation: slideIn 1s ease-in-out;
  }
  
  @keyframes slideIn {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  label {
    display: block;
    margin-bottom: 10px;
    color: #fff;
  }
  
  
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #fff;
    margin-bottom: 15px;
    color: #333;
    transition: background-color 0.3s;
  }
  

  input[type="text"]:focus,
  input[type="password"]:focus {
    background-color: #e1e1e1;
  }
  
  button {
    padding: 10px 20px;
    background-color: #007075;
    color: #fff;
    border: none;
    border-radius: 5px;
    margin-left: 50;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  button:hover {
    background-color: #00484f;
  }
  
  .message {
    text-align: center;
    margin-top: 20px;
    color: #aaa;
  }
  
  .message a {
    color: #00abf0;
    text-decoration: none;
  }
  
  .message a:hover {
    text-decoration: underline;
  }</style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method = "post" >
       
    
          <label for="user_name">User_Name:</label>
          <input type="text" id="text" name="user_name" required>
    
          <label for="password">Password:</label>
          <input type="password" id="text" name="password" required>
    
          <button type="submit">Sign Up</button>
        </form>
        <p class="message">Already a member? <a href="login.php">Sign In</a></p>
      </div>
</body>
</html>