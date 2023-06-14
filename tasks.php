<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
   <style>*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'consolas', sans-serif;
}


body {
    
    background-color: #081b29;
    margin: 0;
    padding: 20px;
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
  h1 {
    color:#00abf0;
    font-size: 2.5rem;
    text-align: center;
    margin-top: 40px;
  }
  
  h2 {
    color: #00abf0;
    font-size: 1.8rem;
    margin-top: 30px;
    margin-bottom: 10px;
  }
  
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #0077cc;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
  }
  
  label {
    color:#00abf0;
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  input[type="text"],
  input[type="date"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
  }
  
  input[type="submit"] {
    background-color: #0077cc;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
  }
  
  input[type="submit"]:hover {
    background-color: #005ea6;
  }
  
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  
  li {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
  
  label[for^="task"] {
    color:#00abf0;
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 0;
  }
  
  input[type="checkbox"] {
    margin-right: 10px;
  }
  
  button {
    background-color: #f8f8f8;
    border: none;
    padding: 10px;
    cursor: pointer;
    margin-right: 10px;
    margin-left: 10px;
    border-radius: 5px;
    transition: background-color 0.2s ease-in-out;
  }
  
  button:hover {
    background-color: #e8e8e8;
  }
  </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Task Management.</a>
    
        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="tasks.php">Tasks</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header> 
    <h1>Task Management App</h1>
    
    <h2>Add Task</h2>
    <form id="task-form">
        <label for="task-name">Task Name:</label>
        <input type="text" placeholder="Enter the task's name" id="task-name" name="task-name" required>
        <br><br>
        <label for="due-date">Due Date:</label>
        <input type="date" id="due-date" name="due-date" required>
        <br><br>
        <input type="submit" value="Add Task">
    </form>
    
    <h2>Task List</h2>
    <ul id="task-list">
    </ul>

    <script>
        document.getElementById('task-form').addEventListener('submit', function(e) {
            e.preventDefault();
            addTask();
        });

        function addTask() {
            var taskName = document.getElementById('task-name').value;
            var dueDate = document.getElementById('due-date').value;

            var taskList = document.getElementById('task-list');
            var taskItem = document.createElement('li');
            taskItem.style.display = 'none'; // Hide the task item initially
            taskItem.innerHTML = `
                <input type="checkbox" id="task-${taskList.childElementCount + 1}" name="task-${taskList.childElementCount + 1}">
                <label for="task-${taskList.childElementCount + 1}">${taskName}</label>
                <span class="due-date">Due Date: <input type="date" class="edit-date" value="${dueDate}"></span>
                <button onclick="editTask(this)">Edit</button>
                <button onclick="deleteTask(this)">Delete</button>
            `;
            taskList.appendChild(taskItem);
            
            taskItem.style.display = 'block'; // Show the task item after adding

            document.getElementById('task-name').value = '';
            document.getElementById('due-date').value = '';
        }

        function editTask(button) {
            var listItem = button.parentNode;
            var label = listItem.querySelector('label');
            var editInput = document.createElement('input');
            var editDate = listItem.querySelector('.edit-date');

            editInput.type = 'text';
            editInput.value = label.textContent;
            listItem.insertBefore(editInput, label);
            listItem.removeChild(label);
            button.innerText = 'Save';

            editDate.style.display = 'inline-block';

            editInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    saveTask(button);
                }
            });
        }

        function saveTask(button) {
            var listItem = button.parentNode;
            var editInput = listItem.querySelector('input[type=text]');
            var label = document.createElement('label');
            var editDate = listItem.querySelector('.edit-date');

            label.textContent = editInput.value;
            listItem.insertBefore(label, editInput);
            listItem.removeChild(editInput);
            button.innerText = 'Edit';

            editDate.style.display = 'none';
            listItem.style.height = 'auto';

            var taskText = label.textContent;
            var taskTextLength = taskText.length;
            var lineHeight = parseInt(window.getComputedStyle(label).lineHeight, 10);
            var numberOfLines = Math.ceil(taskTextLength / 30); // Adjust the character count per line as needed

            listItem.style.height = (lineHeight * numberOfLines) + 'px';
        }

        function deleteTask(button) {
            var listItem = button.parentNode;
            var ul = listItem.parentNode;
            ul.removeChild(listItem);
        }
    </script>
</body>
</html>