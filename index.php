<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Object Oriented Programming with PHP</title>
  <style>
    body{
      display: grid;
      align-items: center;
      justify-content: center;
    }
    h1{
      color: red;
    }
  </style>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <h1>Item Management</h1>

    <form id="itemForm">
        <input type="text" id="name" placeholder="Item Name" required>
        <textarea id="description" placeholder="Item Description"></textarea>
        <button type="submit">Add Item</button>
    </form>

    <h2>Items List</h2>
    <ul id="itemsList"></ul>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "simplecrud";

      // connect to mySQL
      $conn = new mysqli($servername, $username, $password, $dbname);

      // check connection
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }

      // determine the action
      $action = $_GET['action'] ?? '';

      // create functionality
      if($action == 'create'){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
        echo json_encode(["message" => "Item created succesfully"]);

        // read functionality
      }elseif($action == 'read'){
        $result = $conn->query("SELECT * FROM items");
        $items = [];
        while($row = $result->fetch_assoc()){
          $items[] = $row;
        }
        echo json_encode($items);

        // update functionality
      }elseif($action == 'update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $description, $id);
        $stmt->execute();
        echo json_encode(["message" => "Item updated successfully"]);
      }elseif($action == "delete"){
        $id = $_POST["id"];

        $stmt = $conn->prepare("DELETE FROME items WHERE id =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo json_encode(["message" => "item deleted successfully"]);
      }

      $conn->close();
    ?>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
    const itemForm = document.getElementById("itemForm");
    const itemsList = document.getElementById("itemsList");

    // Load items on page load
    fetchItems();

    // Handle form submission
    itemForm.onsubmit = function (event) {
        event.preventDefault();
        const name = document.getElementById("name").value;
        const description = document.getElementById("description").value;

        fetch("crud.php?action=create", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `name=${name}&description=${description}`
        }).then(response => response.json()).then(data => {
            alert(data.message);
            itemForm.reset();
            fetchItems();
        });
    };

    // Fetch and display items
    function fetchItems() {
        fetch("crud.php?action=read")
            .then(response => response.json())
            .then(items => {
                itemsList.innerHTML = "";
                items.forEach(item => {
                    const li = document.createElement("li");
                    li.innerHTML = `${item.name}: ${item.description} 
                    <button onclick="editItem(${item.id}, '${item.name}', '${item.description}')">Edit</button> 
                    <button onclick="deleteItem(${item.id})">Delete</button>`;
                    itemsList.appendChild(li);
                });
            });
    }

    // Edit an item
    window.editItem = function (id, name, description) {
        const newName = prompt("Enter new name:", name);
        const newDescription = prompt("Enter new description:", description);

        if (newName && newDescription) {
            fetch("crud.php?action=update", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id=${id}&name=${newName}&description=${newDescription}`
            }).then(response => response.json()).then(data => {
                alert(data.message);
                fetchItems();
            });
        }
    };

    // Delete an item
    window.deleteItem = function (id) {
        if (confirm("Are you sure you want to delete this item?")) {
            fetch("crud.php?action=delete", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id=${id}`
            }).then(response => response.json()).then(data => {
                alert(data.message);
                fetchItems();
            });
        }
    };
});

    </script>
</body>
</html>