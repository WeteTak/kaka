<?php
$river_f = $_POST['river']??NULL;
// var_dump($river_f);
if($river_f){
    if($river_f=='all'){
        $sql="
            SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
            FROM wodowskazy INNER JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id
            WHERE datapomiaru='2022-05-05';
            ";
    }
    elseif($river_f=='warning'){
        $sql="
        SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
        FROM wodowskazy INNER JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id
        WHERE datapomiaru='2022-05-05' AND stanWody > stanOstrzegawczy;
        ";
    }
    else{
        $sql="
        SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
        FROM wodowskazy INNER JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id
        WHERE datapomiaru='2022-05-05' AND stanWody > stanAlarmowy;
        ";
    }
    $result = $link -> query($sql);
    
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziom rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section>
            <img src="obraz1.png" alt="Mapa polski">
        </section>

        <section>
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>

    <nav>
        <form action="" method="post">
            <input value="all" type="radio" name="river" id="all">
            <label for="all">Wszystkie</label>
            <input value="warning" type="radio" name="river" id="warning">
            <label for="warning">Ponad stan ostrzegawczy</label>
            <input value="alarm" type="radio" name="river" id="alarm">
            <label for="alarm">Ponad stan alarmowy</label>
            <button>Pokaż</button>  
        </form>
    </nav>

    <main>
        <section class="left"></section>

        <section class="right"></section>
    </main>

    <footer></footer>
</body>
</html>