<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die ("Fatal Error");
    
        if(isset($_POST['searchtype']) && isset($_POST['searchterm'])){
            $searchtype=htmlspecialchars($_POST['searchtype']);
            $searchterm=htmlspecialchars($_POST['searchterm']);

            $sql = "SELECT * from catalogs where $searchtype like '%$searchterm%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc() ){
                    echo "+Book title:" .$row["title"]."<br>+Author: ".$row["author"]."<br>+ISBN: ".$row["isbn"]."<br><br>";
                }
            } else {
                echo "No records found";
            }
        }
        $conn->close();
    ?>
</body>
</html>