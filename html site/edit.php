<?php
if (isset($_GET['bookid'])) {
    $bookid = $_GET['bookid'];
} else {
    header('Location: index.php');
    die();
}

$conn = new mysqli("127.0.0.1", "root", "", "bookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM `book` WHERE `book`.`ID` = " . mysqli_real_escape_string($conn, $bookid);
$result = $conn->query($query);
if ($result->num_rows == 0) {
    header('Location: index.php');
    die();
}

while ($row = $result->fetch_assoc()) {
    $name = $row['Title'];
    $desc = $row['ProductDescription'];
    $state = $row['State'];
    $price = $row['Price'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Rare Books</h1>

    <form class="form-horizontal" action="editbookfunction.php" method="post">
        <fieldset>

            <legend>Edit book</legend>

            <input type="hidden" name="bookid" value="<?php echo $bookid; ?>">

            <div class="form-group">
                <label class="col-md-4 control-label" for="title">Book Title</label>
                <div class="col-md-4">
                    <input id="title" name="title" type="text" value="<?php echo $name; ?>"
                           class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="desc">Description</label>
                <div class="col-md-4">
                    <input id="desc" name="desc" type="text" value="<?php echo $desc; ?>" class="form-control input-md"
                           required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="state">State</label>
                <div class="col-md-4">
                    <select id="state" name="state" class="form-control">
                        <option <?php if ($state == "Sale") {
                            echo "selected=\"selected\"";
                        } ?> value="1">Sale
                        </option>
                        <option <?php if ($state != "Sale") {
                            echo "selected=\"selected\"";
                        } ?> value="2">Repair
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="price">Price</label>
                <div class="col-md-4">
                    <input id="price" name="price" type="text" value="<?php echo $price; ?>"
                           class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary"></input>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>


