  var trash = document.createElement("img");
  var pin = document.createElement("img");
  var unpin = document.createElement("img");

    document.addEventListener("DOMContentLoaded", () => {
      var clear = document.getElementById("clear");
      var button = document.getElementById("button");
      var textElement = document.getElementById("input");
      var time = document.getElementById("inputt");
      var container = document.getElementById("Task_container");

      // Show all tasks in localStorage on page load
      displayTasks();
    
      // Function to be performed when the button is clicked
      button.onclick = function () {
        var textElementValue = textElement.value.trim();
        var timeValue = time.value.trim();
    
        // Check if the user has typed something
        if (textElementValue === "" || timeValue === "") {
          window.alert('You must type something');
          return;
        }
        
        createTask(textElementValue, timeValue);
        storeTasks();
      }
    
        function createTask(text, time) {
          // Create image elements
          var trash = document.createElement("img");
          var pin = document.createElement("img");
          var unpin = document.createElement("img");
          // Set the source of the images
          trash.src = "trash.png";
          pin.src = "pin.png"; 
          unpin.src = "unpin.png"; 
          // Optionally set styles for images
          trash.style.cursor = "pointer";
          pin.style.cursor = "pointer";
          unpin.style.cursor = "pointer";
          
          // Add event listeners to the images
          trash.onclick = function() {
            // Define what happens when the trash icon is clicked
            task.remove(); 
            storeTasks();  
          };
          pin.onclick = function() {
            // Define what happens when the pin icon is clicked
            pin.style.display = "none";
            unpin.style.display = "block";
            task.appendChild(unpin);
            container.insertBefore(task, container.firstChild);
          };
          unpin.onclick = function() {
            // Define what happens when the unpin icon is clicked
            unpin.style.display = "none";
            pin.style.display = "block";
            container.appendChild(task);
          };
        
          // Create and show the task
          let task = document.createElement('li');
          task.textContent = `${text} At: ${time} `;
        
          // Append images to the task
          task.appendChild(trash);
          task.appendChild(pin);
          task.classList.add("tasks");
          // Display the task to the DOM
          container.appendChild(task);
        
          // Clear input fields
          textElement.value = "";
          document.getElementById("inputt").value = "";
          time.value = "";
        }
      function storeTasks() {
        // Store the tasks in localStorage
        let stored = [];
        container.querySelectorAll("li").forEach(function(item) {
          let [text, time] = item.textContent.split('At:');
          stored.push({ text: text.trim(), time: time.trim() });
        });
        localStorage.setItem('tasks', JSON.stringify(stored));
      }
    
      function displayTasks() {
        // Show all tasks from localStorage
        let storedTasks = JSON.parse(localStorage.getItem('tasks')) || [];
        storedTasks.forEach(task => createTask(task.text, task.time));
      }
    
      // Function to clear all tasks
      clear.onclick = function () {
        if (localStorage.getItem('tasks')) {
          localStorage.removeItem('tasks');
          container.innerHTML = ''; // Clear all tasks from DOM
          window.alert("All tasks have been deleted!");
          clear.classList.add("delete");
        } else {
          window.alert("You have no tasks to delete!");
        }
      }
    });
