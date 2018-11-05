<?php
require_once 'TimeTravel.php';

$travel = new \TimeTravel\TimeTravel();
$travel->setStart();
$interval = 1000000000;
$jump = 'P1M1DT24H';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <title>Retour vers le Futur</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Retour vers le Futur</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p>Date de départ :  <?= $travel->getStart()->format('Y-m-d') ?></p>
            <p>Date à laquelle est le Doc :
            <?= $travel->findDate($interval)->format('Y-m-d') ?></p>
            <h3><?= $travel->getTravelInfo() ?></h3>
        </div>
        <div class="col-md-6">
            <h4>Les étapes du voyage :</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Etapes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($travel->backToFutureStepByStep(new \DateInterval($jump)) as $step) {
                    ?>
                    <tr>
                        <td><?= $step ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
