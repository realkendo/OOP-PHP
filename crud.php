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
  