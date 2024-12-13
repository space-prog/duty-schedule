<?php
    session_start();
    // session_destroy();
?>
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
        if(isset($_SESSION['Name_group'])) {
            $Name_group = $_SESSION['Name_group'];
        } else {
            $Name_group = $_SESSION['Name_group'] = [
                [
                    "name" => "Петро",
                    "group" => "11-ЕУ",
                ],
                [
                    "name" => "Данііл",
                    "group" => "ПЦБ-11-07",
                ],
                [
                    "name" => "Назар",
                    "group" => "БО-11",
                ],
                [
                    "name" => "Оксана",
                    "group" => "ПЦБ-11-07",
                ],
                [
                    "name" => "Андрій",
                    "group" => "БО-11",
                ],
                [
                    "name" => "Діана",
                    "group" => "11-ЕУ",
                ],
                [
                    "name" => "Олексій",
                    "group" => "БО-11",
                ],
                [
                    "name" => "Жанна",
                    "group" => "ПЦБ-11-07",
                ],
                [
                    "name" => "Людмила",
                    "group" => "БО-11",
                ],
                [
                    'name' => "Валентина",
                    "group" => "11-ЕУ",
                    ]
                ];
            }
            if(isset($_SESSION['group_Grafik'])) {
                $group_Grafik = $_SESSION['group_Grafik'];
            } else {
                $group_Grafik = [
                    "11-ЕУ" => ["09:00", "10:00", "11:00", "12:00", "13:00"],
                    "ПЦБ-11-07" => ["18:00", "17:00", "16:00", "15:00", "14:00"],
                    "БО-11" => ["12:00", "11:00", "13:00", "18:00", "08:00"],
                ]; 
        }
        if(isset($_POST["del"])) {
            $ind = +($_POST["del"]);
            // echo "<pre>";
            // var_dump($Name_group);
            // var_dump($_SESSION['Name_group']);
            array_splice($_SESSION['Name_group'], $ind, 1);
        }
            echo "<table>
                    <thead>
                        <tr>
                            <th rowspan='2'>Ім'я</th>
                            <th rowspan='2'>Група</th>
                            <th colspan='5'>Графік</th>
                        </tr>
                        <th>Понеділок</th>
                        <th>Вівторок</th>
                        <th>Середа</th>
                        <th>Четвер</th>
                        <th>П'ятниця</th>
                    </thead>
                    <tbody>";
            foreach ($Name_group as $nameGroup => $val) {
                // var_dump($val);
                echo "<tr>";
                // var_dump($nameGroup);
                foreach ($val as $nameGroup_Init => $nameGroupString) {
                    // var_dump($nameGroupString);
                    echo "<td>$nameGroupString</td>";
                    // echo "<pre>"; 
                    // var_dump($Name_group[0]["group"]);
                    if($nameGroupString == "11-ЕУ") {
                        foreach ($group_Grafik[$nameGroupString] as $group) {
                            echo "<td>$group</td>";
                        }
                    }
                    if($nameGroupString == "ПЦБ-11-07") {
                        foreach ($group_Grafik[$nameGroupString] as $group) {
                            echo "<td>$group</td>";
                        }
                    }
                    if($nameGroupString == "БО-11") {
                        foreach ($group_Grafik[$nameGroupString] as $group) {
                            echo "<td>$group</td>";
                        }
                    }
                }
                echo "<td>
                    <form action='index.php' method='post'>
                        <button type='submit' name='del' value='$nameGroup'>-</button>
                    </form>
                </td>";
            }
            echo "
            </tr>
                
            </tbody>
        ";
        var_dump($Name_group);
        if(isset($_POST['array'])) {
            $arrName = json_decode($_POST['array'], true);
        } else { 
            $arrName = [];
        }
        if(isset($_POST['name_input'])) {
            $name_input = $_POST['name_input'];
            array_push($Name_group, $name_input);
        } else {
            $name_input = '';
        }
        foreach ($arrName as $value) {
            echo $value . "<br>";
        } 
        ?>
    <form action="index.php" method="post">
        <input type="text" name="name_input">
        <input type="hidden" name="array" value='<?= json_encode($arrName)?>'>
        <button type="submit">enter</button>
    </form>
</body>
</html>