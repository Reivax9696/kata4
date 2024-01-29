
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            text-align: center;
        }
        .container {
            width: fit-content; 
            margin: 0; 
        }

        .box {
            border: 1px solid #000;
            margin: 10px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            display: inline-block; 
            text-align: left; 
        }
    </style>
</head>
<body>
    <h1>Assignació de Estudiants</h1>

    <form method="post">
        <input type="submit" name="shuffle" value="A qui li toca aquesta setmana">
    </form>

    <?php
    if (isset($_POST['shuffle'])) {

        $jsonEstudiants = file_get_contents('noms.json');
        $llistaEstudiants = json_decode($jsonEstudiants, true);

        $estudiants = array_map(function($nom) {
            return $nom['nom']. " " . $nom['cognom'];
        }, $llistaEstudiants['alumnes']);

        $activitats = ["Presentar Masterclass", "Shortcut de la setmana"];

        shuffle($estudiants);

        foreach ($activitats as $activitat) {
            $randomEstudiant = array_shift($estudiants); 

            echo '<div class="box">';
            echo "Al estudiant " . $randomEstudiant . " li toca " . $activitat;
            echo '</div>';
        }
    }
    ?>
</body>
</html>




