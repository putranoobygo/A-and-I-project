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

    <form class="form-horizontal" action="addbookfunction.php" method="post">
        <fieldset>

            <legend>Add book to system</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="title">Book Title</label>
                <div class="col-md-4">
                    <input id="title" name="title" type="text" placeholder="title here m8" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="desc">Description</label>
                <div class="col-md-4">
                    <input id="desc" name="desc" type="text" placeholder="description here" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="state">State</label>
                <div class="col-md-4">
                    <select id="state" name="state" class="form-control">
                        <option value="1">Sale</option>
                        <option value="2">Repair</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="price">Price</label>
                <div class="col-md-4">
                    <input id="price" name="price" type="text" placeholder="0.00" class="form-control input-md" required="">

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