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

    </script>
</body>
</html>