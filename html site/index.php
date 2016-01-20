<!DOCTYPE html>
<?php
$conn = new mysqli("127.0.0.1", "root", "", "bookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
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
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>State</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM `book`";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['Title']; ?></td>
                    <td><?php echo $row['ProductDescription']; ?></td>
                    <td><?php echo $row['State']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                    <td><a href="edit.php?bookid=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                    <td><a href="delete.php?bookid=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td>No books found</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
        }
        $conn->close();
        ?>
        </tbody>
    </table>

    <div class="row">
        <a href="addbook.php" class="btn btn-info" role="button">Link Button</a>
    </div>

</div>
</body>
</html>