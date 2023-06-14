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
    //read from database
   
    $query = "select * from Users where user_name = '$user_name' limit 1";

   $result = mysqli_query($con, $query);
   if($result) {
    if($result && mysqli_num_rows($result) > 0) 
       {
        $user_data = mysqli_fetch_assoc($result);
        if($user_data['password'] === $password){
            $_SESSION ['user_id'] = $user_data ['user_id'];
            header("Location: index.php");
            die;

        }


       }
   }
   echo "Wrong user name or password!!";

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
    <title>Login</title>
   <style>*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'consolas', sans-serif;
}


body {
    background-color: #081b29;
  }
  .header{
    background: transparent;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    width: 100;
    padding: 25px 10%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 100;

}

.logo{
    margin-left:0px;
    font-size: large;
    color: aliceblue;
    text-decoration: none;
    font-weight: 600;
}

.logo::before{
    content: '';
    position: relative;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-color: #00abf0;
}

a{
    margin-left: 15px;
    color: aliceblue;
    font-size: large;
    text-decoration: none;
    font-weight: 500;
    transition: 2s;
    
}

a:hover{
    background-color: #00abf0;
    
}
  
  .container {
    align-items: center;
    max-width: 300px;
    height: 350px;
    margin: 0% auto;
    margin-top: 250px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  }
  
   
  h2 {
    text-align: center;
    color: #00abf0;
    margin-bottom: 0%;
  }
  
  form {
    margin-top: 0%;
    max-width: 400px;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    color: #fff;
  }
  
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
  }
  
  input[type="checkbox"] {
    margin-top: 10px;
  }
  
  .actions {
    margin-top: 20px;
    display: flex;
    
    
  }
  
  button {
    padding: 10px 20px;
    background-color: #007075;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 50px;
  }
  
  .forgot-password,
  .not-member {
    margin-top: 10px;
    color: #007075;
    text-decoration: none;
  }
  .forgot-password:hover,
  .not-member:hover{
    color: #072E33;
  }
  
  /* CSS Animation */
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  
  .container {
    animation: fadeIn 1s ease-in-out;
  }

  </style>
</head>
<body>
  <header class="header">
    <a href="#" class="logo">Task Management.</a>


      
    </nav>
</header> 
    <div class="container">
        <h2>Login</h2>
        <form method ="post">
          <label for="user name">User Name:</label>
          <input type="text" id="user_name" name="user_name" required>
    
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
    
          <label>
            <input type="checkbox" name="remember" value="remember"> Do not forget me
          </label>
    
          <div class="actions">
            <button type="submit">Sign In</button>
        </div>

            <div class="links">
                <a href="ForgotPassword.php" class="forgot-password"></a>
            <a href="signup.php" class="not-member">Not a member?</a>
            </div>
            
          
        </form>
      </div>
</body>
</html>