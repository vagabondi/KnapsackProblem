<?php include 'src/KnapsackController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Knapsack problem</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Knapsack problem</h1>
        <form method="post" action="index.php" enctype="multipart/form-data">
            <label>Choose algorithm and see the best way to pack your knapsack</label>
            <select name="algorithm" required>
                <option name="algorithm" value="greedy_decide" selected>Greedy Decide Algorithm</option>
            </select>
            <label>Choose a size of knapsack</label>
            <input type="number" required name="size" min="0" max="10000" step="1">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit">Send</button>
        </form>
        <div class="result">
            <p><?php KnapSackController::fileUpload() ?></p>
        </div>
        <div class="fileInfo">
            <h4>About your data:</h4>
            <p>File should have CVS extension.</p>
            <p>Data format like in example file (download example file: <a href="example.csv">example</a>).</p>
            <p>Size must be less than 500KB.</p>
        </div>
    </div>
</body>
</html>