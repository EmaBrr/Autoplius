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

            <?php
            if (isset($car)) {
                echo '<button type="submit" value="'.$car['id'].'" name = "edit">Atnaujinti</button>';
            } else {
                echo '<button type="submit" value="" name = "create">Įrašyti naują įrašą</button>'; //nereikia value paduoti id, nes naują kuriam, tai jis id dar neturi
            }
            ?>

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
                            echo '<td>' . $car['id'] . '</td>';
                            echo '<td>' . $car['manufacturer'] . '</td>';
                            echo '<td>' . $car['model'] . '</td>';
                            echo '<td>' . $car['fuel'] . '</td>';
                            echo '<td>' . $car['year'] . '</td>';
                            echo '<td>' . $car['distance'] . '</td>';
                            echo '<td> 
                                    <form action="" method="get">
                                        <button type="submit" name = "edit" value="'. $car['id'] .'">Edit</button>
                                    </form>
                                </td>';
                            echo '<td> 
                                    <form action="" method="post">
                                        <button type="submit" class = "btn btn-danger" name = "destroy" value="'. $car['id'] .'">Delete</button>
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
