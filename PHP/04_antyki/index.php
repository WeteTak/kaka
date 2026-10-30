<?php
$link = new mysqli('localhost','root','','antyki');

$furniture_id_f = $_POST['furniture-id']??NULL;
if($furniture_id_f){
    $sql = "
        INSERT INTO zakupy (idklienci, idmeble, sztuk)
        VALUES (1, $furniture_id_f, 1);    
    ";
    $result = $link -> query($sql);
    header('location:index.php');
};

$sql = "
SELECT idMeble, nazwa, plik, styl, cena, opis
FROM meble
WHERE kategoria=1;
";
$result = $link -> query($sql);
$furniture_1a = $result -> fetch_all(1);

$sql = "
SELECT idMeble, nazwa, plik, styl, cena, opis
FROM meble
WHERE kategoria=2;
";
$result = $link -> query($sql);
$furniture_1b = $result -> fetch_all(1);

$sql = "
SELECT idMeble, nazwa, plik, styl, cena, opis
FROM meble
WHERE kategoria=3;
";
$result = $link -> query($sql);
$furniture_1c = $result -> fetch_all(1);

$sql = "
SELECT nazwa, cena
FROM meble INNER JOIN zakupy USING(idmeble) 
WHERE idklienci=1;
";
$result = $link -> query($sql);
$shoppings = $result -> fetch_all(1);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedaż antyków</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>

    <main>
        <section>

            <h2>- Sofy -</h2>
            <!-- Skrypt 1a -->
            <!-- SELECT idMeble, nazwa, plik, styl, cena, opis -->
            <!-- <div class='mebel'>
                <div class='obraz'>
                    <img src='sofy/{plik}' alt='mebel'>
                </div>
                <div>
                    <h3>{nazwa}</h3>
                    <h4>Styl: {styl}</h4>
                    <h3>Cena: {cena} zł</h3>
                    <form action='' method='post'>
                        <button name='furniture-id' value='{idmeble}'>Kup</button>
                    </form>
                </div>
                <div class="opis">
                    {opis}
                </div>
            </div> -->
            <?php
            foreach($furniture_1a as $furniture){
                echo "
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='sofy/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>Styl: {$furniture['styl']}</h4>
                        <h3>Cena: {$furniture['cena']} zł</h3>
                        <form action='' method='post'>
                            <button name='furniture-id' value='{$furniture['idMeble']}'>Kup</button>
                        </form>
                    </div>
                    <div class='opis'>
                        {$furniture['opis']}
                    </div>
                </div>
                ";
            };
            ?>
            <h2>- Fotele -</h2>
            <!-- Skrypt 1b -->
             <?php
            foreach($furniture_1b as $furniture){
                echo "
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='fotele/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>Styl: {$furniture['styl']}</h4>
                        <h3>Cena: {$furniture['cena']} zł</h3>
                        <form action='' method='post'>
                            <button name='furniture-id' value='{$furniture['idMeble']}'>Kup</button>
                        </form>
                    </div>
                    <div class='opis'>
                        {$furniture['opis']}
                    </div>
                </div>
                ";
            };
            ?>
            <h2>- Komody -</h2>
            <!-- Skrypt 1c -->
             <?php
            foreach($furniture_1c as $furniture){
                echo "
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='komody/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>Styl: {$furniture['styl']}</h4>
                        <h3>Cena: {$furniture['cena']} zł</h3>
                        <form action='' method='post'>
                            <button name='furniture-id' value='{$furniture['idMeble']}'>Kup</button>
                        </form>
                    </div>
                    <div class='opis'>
                        {$furniture['opis']}
                    </div>
                </div>
                ";
            };
            ?>
            <!-- Skrypt 2 -->

        </section>

        <aside>

            <h2>Koszyk</h2>
            <p>Zalogowano: Anna Kowalska</p>
            <!-- Skrypt 3 -->
            <!-- SELECT nazwa, cena -->
            <!-- <ol>
                <li>{nazwa} cena: {cena}</li>
            </ol>
            Koszt całkowity: $overall_price -->
            <?php
            echo "<ol>";
            $overall_price = 0;
            foreach($shoppings as $shopping){
                echo "
                <li>{$shopping['nazwa']} cena: {$shopping['cena']}</li>
                ";
                $overall_price += $shopping['cena'];
            }
            echo "
            </ol>
            Koszt całkowity: $overall_price";
            ?>

        </aside>
    </main>

    <footer>
        <p>Stronę wykonał: 100</p>
    </footer>
</body>
</html>