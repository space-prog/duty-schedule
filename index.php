<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>duty-schedule | Графік чергування</title>
</head>
<body>
    <?php

        if(isset($_POST['array'])) {
            $arrName = json_decode($_POST['array'], true);
        } else {
            $arrName = [];
        }
        if(isset($_POST['array_group'])) {
            $arrGroup = json_decode($_POST['array_group'], true);
        } else {
            $arrGroup = [];
        }
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            array_push($arrGroup, $name);
        } else {
            $name = '';
        }
        if(isset($_POST['group'])) {
            $group = $_POST['group'];
            array_push($arrGroup, $name);
        } else {
            $group = '';
        }
        if(isset($_POST['delete'])) {
            $ind = $_POST['delete'];
            array_splice($arrName, $ind, 1);
        }
        if(isset($_POST['deleteGroup'])) {
            $ind = $_POST['deleteGroup'];
            array_splice($arrGroup, $ind, 1);
        }
        foreach ($arrName as $name => $val) {
            echo "<form action='index.php' method='post' class='flex'>
            <input type='hidden' name='array' value='" .json_encode($arrName). "'>
            <table>
                <thead>
                    <th>Ім'я</th>
                </thead>
                <tbody>
                    <td>$val</td>
                </tbody>
            </table>
            <button type='submit' name='delete' value='$name' class='del'>-</button>
            
            </form>";
        }
        foreach ($arrGroup as $group => $value) {
            echo "<form action='index.php' method='post' class='flex'>
            <input type='hidden' name='array' value='" .json_encode($arrGroup). "'>
            <table>
                <thead>
                    <th>Группа</th>
                </thead>
                <tbody>
                    <td>$value</td>
                </tbody>
            </table>
            <button type='submit' name='deleteGroup' value='$group' class='del'>-</button>
            
            </form>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="group" placeholder="group">
            <input type="hidden" name="array" value='<?= json_encode($arrName)?>'>
            <input type="hidden" name="array_group" value='<?= json_encode($arrGroup)?>'>
            <button type="submit">+</button>
        </form>
</body>
</html>