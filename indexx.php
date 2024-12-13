<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['array'])) {
            $arrName = json_decode($_POST['array'], true);
        } else { 
            $arrName = [];
        }
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            array_push($arrName, $name);
        } else {
            $name = '';
        }
        foreach ($arrName as $val) {
            echo $val . "<br>";
        } 
    ?>
    <form action="indexx.php" method="post">
        <input type="text" name="name">
        <input type="hidden" name="array" value='<?= json_encode($arrName)?>'>
        <button type="submit">enter</button>
    </form>
</body>
</html>