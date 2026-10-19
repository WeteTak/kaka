<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Podaj dzień tygodnia</h1>
    <form action="" method="get">
        <input type="text" name="tyg" id="tyg">
        <input type="submit" value="Pobierz plan">
    </form>
    <?php
    if (isset($_GET['tyg'])){
        $dzien = $_GET['tyg'];
        $dzien = strtoupper($dzien);
        echo "<br> dzień = $dzien";
    }
    else {
        echo '<br> Witaj pierwszy raz';
    }

    switch(){
        case 0: poniedziałek = 1;
        break;
    }
    ?>
</body>
</html>