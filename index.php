<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

$park = $_GET['park'];
$vote = $_GET['vote'];

if(empty($park)){
    echo "park è vuoto";
}

if($_GET['park'] == 'si') {
    $park = true;
    echo $park. "true";
}elseif($_GET['park'] == 'no'){
    $park = false;
    echo $park. "false";
}

//echo $park. "funziono?"
// echo $park;
// echo $vote;

/*
$hotel['vote'] >= $vote ?
$park == $hotel['parking'] ?
*/

/*
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <title>Hotel</title>
    <style>
        .hide{
            display: none;
        }
        /*
        .visible{
            display: block;
        }
        */

    </style>
</head>

<body>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr class="<?php echo $park == $hotel['parking'] && $hotel['vote'] >= $vote ? "" : "hide"?>">
                        <th scope="row"><?= $hotel['name']; ?></th>
                        <td><?php echo str_replace("Descrizione", "Description", $hotel['description'] ); ?></td>
                        <?php if ($hotel['parking']) : ?>
                            <td>Presente</td>
                        <?php else : ?>
                            <td>Assente</td>
                        <?php endif; ?>
                        <td><?= $hotel['vote']; ?></td>
                        <td><?= $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container p-5">
    <form action="index.php" method="get">
        <div class="mb-3">
                <label for="vote" class="form-label">Inserisci voto minimo</label>
                <input type="text" name="vote" id="vote" class="form-control" placeholder="" aria-describedby="helpId">
                <label for="park" class="form-label">Parcheggio</label>
                <input type="text" name="park" id="park" class="form-control" placeholder="" aria-describedby="helpId">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>

</body>

</html>