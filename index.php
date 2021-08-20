<?php

include("./functions.php");

if (isset($_POST['edit'])) {
    update();
    header("location:./");
    die;
}

if (isset($_POST['create'])) {
    store();
    header("location:./");
    die;
}

if (isset($_POST['destroy'])) {
    destroy();
    header("location:./");
    die;
}

if (isset($_GET['edit'])) {
    $car = find($_GET['edit']);
    // print_r($car);die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <title>Autoplius</title>
</head>
<body>

    <h2>Questionaire:</h2>
    <div class="questionaire">
        <form action="" method="post">
            <div class="input">
                <label for="">Manufacturer: </label>
                <input type="text" name="manufacturer" placeholder="Manufacturer" value = "<?=(isset($car)) ? $car['manufacturer'] : ""?>">
            </div>
            <div class="input">
                <label for="">Car Model: </label>
                <input type="text" name="model" placeholder="Model" value = "<?=(isset($car)) ? $car['model'] : ""?>">
            </div>
            <div class="input">
                <label for="">Fuel: </label>
                <input type="text" name="fuel" placeholder="Fuel" value = "<?=(isset($car)) ? $car['fuel'] : ""?>">
            </div>
            <div class="input">
                <label for="">Year:</label>
                <input type="number" name="year" placeholder="Year" min="1950" max="2021" value = "<?=(isset($car)) ? $car['year'] : ""?>">
            </div>
            <div class="input">
                <label for="">Distance: </label>
                <input type="number" name="distance" placeholder="Distance" value = "<?=(isset($car)) ? $car['distance'] : ""?>">
            </div>
            <div class="buttons" style = "justify-content: center; display: flex;">
                <?php
                if (isset($car)) {
                    echo '<button class = "update" type="submit" value="'.$car['id'].'" name = "edit" style = "background-color: green; padding: 5px 15px; font-size: 15px;">Atnaujinti</button>';
                } else {
                    echo '<button class = "create" type="submit" value="" name = "create" style = "color: white; background-color: rgb(70, 75, 117); padding: 5px 15px; font-size: 15px;">Įrašyti naują įrašą</button>'; //nereikia value paduoti id, nes naują kuriam, tai jis id dar neturi
                }
                ?>
            </div>

        </form>
    </div>

    <div class="results">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manufacturer</th>
                    <th>Car Model</th>
                    <th>Fuel</th>
                    <th>Year</th>
                    <th>Distance</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php
                foreach (all() as $car) {
                    echo '<tr>';
                            echo '<td align="center">' . $car['id'] . '</td>';
                            echo '<td align="center">' . $car['manufacturer'] . '</td>';
                            echo '<td align="center">' . $car['model'] . '</td>';
                            echo '<td align="center">' . $car['fuel'] . '</td>';
                            echo '<td align="center">' . $car['year'] . '</td>';
                            echo '<td align="center">' . $car['distance'] . '</td>';
                            echo '<td align="center"> 
                                    <form action="" method="get">
                                        <button class = "edit" type="submit" name = "edit" value="'. $car['id'] .'" style = "background-color: green; padding: 5px 8px; font-size: 15px;">Edit</button>
                                    </form>
                                </td>';
                            echo '<td align="center"> 
                                    <form action="" method="post">
                                        <button class = "delete" type="submit" name = "destroy" value="'. $car['id'] .'" style = "background-color:#FF6347; padding: 5px 8px; font-size: 15px;">Delete</button>
                                    </form>
                                </td>';
                            echo  '</tr>';  
            }
            ?>
            </tbody>
        </table>


    </div>
    
</body>
</html>
