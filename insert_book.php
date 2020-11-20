<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die ("Fatal Error");
    
    if(isset($_POST['isbn']) && isset($_POST['author']) && isset($_POST['title']) && isset($_POST['price']))
    {
        $isbn=htmlspecialchars($_POST['isbn']);
        $author=htmlspecialchars($_POST['author']);
        $title=htmlspecialchars($_POST['title']);
        $price=htmlspecialchars($_POST['price']);

        $query = "INSERT INTO catalogs(isbn, author, title, price) VALUES ('$isbn', '$author', '$title', '$price')" ;
        $result = $conn->query($query);

        if(!$result){
            echo "Insert Fail";
        }else{
            echo $title. "has been inserted successfully";
        }

    }
    $conn->close();

    ?>
</body>
</html>