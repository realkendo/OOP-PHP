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

switch ($action) {
    case 'create':
        $name = $_POST['name'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
        echo json_encode(["message" => "Item created successfully"]);
        break;

    case 'read':
        $result = $conn->query("SELECT * FROM items");
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        echo json_encode($items);
        break;

    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $description, $id);
        $stmt->execute();
        echo json_encode(["message" => "Item updated successfully"]);
        break;

    case 'delete':
        $id = $_POST["id"];

        $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo json_encode(["message" => "Item deleted successfully"]);
        break;

    default:
        echo json_encode(["error" => "Invalid action"]);
        break;
}


      $conn->close();
    ?>
  