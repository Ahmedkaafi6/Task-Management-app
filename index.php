<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'consolas', sans-serif;
}

body{
   background-color: #081b29
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

.sec{
    color: white;
    height: 90vh;
    display: flex;
    align-items: center;
} 
.s1{
    padding-left: 130px;
    font-weight: 300;
    max-width: 600px;

}
.s1 h2{
    font-size: 30px;
    font-weight: 600;
    color: #00abf0;
}
.s1 p{
    color: white;
    font-size: 15px;
    font-weight: 300;

}</style>

</head>
<body>
    <header class="header">
        <a href="#" class="logo">Task Management.</a>

        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="tasks.php">Tasks</a>
            <a href="logout.php"> Logout</a>
        </nav>
        </header> 
     <section class="sec">
         <div class="s1">
            <h2> Welcome to the Task Management App:</h2> <br>
          <p>Are you struggling to keep track of all your tasks and deadlines?  
        The Task Management App is here to help! With our easy-to-use interface,
        you can quickly add, edit, and delete tasks, set due dates, and mark tasks 
        as complete. Plus, our simple and intuitive design ensures that you never lose 
        track of your important tasks again. Try the Task Management App today and streamline your task management process!</p>
        </div>
     </section>
</body>
</html>