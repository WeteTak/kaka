<?php
$link = new mysqli('localhost','root','','kupauto');

$brand_f = $_POST['brand']??NULL;

if($brand_f){
    $sql = "
    SELECT model, cena, zdjecie
    FROM samochody INNER JOIN marki ON samochody.marki_id=marki.id
    WHERE nazwa='$brand_f';
    ";
    $result = $link -> query($sql);
    $selected_cars = $result -> fetch_all(1);
};

$sql = "
SELECT model, rocznik, przebieg, paliwo, cena, zdjecie
FROM samochody
WHERE id=10;
";
$result = $link -> query($sql);
$car = $result -> fetch_assoc();

$sql = "
SELECT nazwa, model, rocznik, cena, zdjecie
FROM marki INNER JOIN samochody ON marki.id=samochody.marki_id
WHERE wyrozniony=1
LIMIT 4;  
";
$result = $link -> query($sql);
$offers = $result -> fetch_all(1);

$sql = "
SELECT nazwa 
FROM marki;
";
$result = $link -> query($sql);
$brands = $result -> fetch_all(1);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
    
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    
    <main class="first">

        <!-- Skrypt 1 -->
        <!-- SELECT model, rocznik, przebieg, paliwo, cena, zdjecie -->
        <!-- <img src='{zdjecie}' alt=''>
        <h4>Oferta dnia: Toyota {model}</h4>
        <p>Rocznik: {rocznik}, przebieg: {przebieg}, rodzaj paliwa: {paliwo}</p>
        <h4>Cena: {cena}</h4> -->
        <?php
        echo "
            <img src='{$car['zdjecie']}' alt=''>
            <h4>Oferta dnia: Toyota {$car['model']}</h4>
            <p>Rocznik: {$car['rocznik']}, przebieg: {$car['przebieg']}, rodzaj paliwa: {$car['paliwo']}</p>
            <h4>Cena: {$car['cena']}</h4>
        ";
        ?>
        
    </main>

    <main class="second">
        <h2>Oferty Wyróżnione</h2>
        <!-- Skrypt 2 -->
        <!-- SELECT nazwa, model, rocznik, cena, zdjecie -->
        <!-- <section class='offer'>
            <img src='{zdjecie}' alt='{model}'>
            <h4>{nazwa} {model}</h4>
            <p>Rocznik: {rocznik}</p>
            <h4>Cena: {cena}</h4>
        </section> -->
        <?php
        
        
        foreach($offers as $offer){
            echo "
            <section class='offer'>
            <img src='{$offer['zdjecie']}' alt='{$offer['model']}'>
            <h4>{$offer['nazwa']} {$offer['model']}</h4>
            <p>Rocznik: {$offer['rocznik']}</p>
            <h4>Cena: {$offer['cena']}</h4>
            </section>
            ";
        }
        ?>
    </main>

    <main class="third">
        <h2>Wybierz marke</h2>
        <form action="" method="post">
            <select name="brand" id="brand">
                <!-- Skrypt 3 -->
                <!-- <option value='{nazwa}'>{nazwa}</option> -->
                <?php
                foreach($brands as $brand){
                    echo "
                    <option value='{$brand['nazwa']}'>{$brand['nazwa']}</option>
                    ";
                }
                ?>
            </select>
            <button>Wyszukaj</button>
        </form>
        <!-- Skrypt 4 -->
        <!-- SELECT model, cena, zdjecie -->
        <!-- <section class='offer'>
            <img src='{zdjecie}' alt='{model}'>
            <h4>{$brand_f} {model}</h4>
            <h4>Cena: {cena}</h4>
        </section> -->
        <?php
        if($brand_f){
            foreach($selected_cars as $selected_car){
            echo "
            <section class='offer'>
            <img src='{$selected_car['zdjecie']}' alt='{$selected_car['model']}'>
            <h4>$brand_f {$selected_car['model']}</h4>
            <h4>Cena: {$selected_car['cena']}</h4>
            </section>
            ";
            }
        };
        ?>
    </main>

    <footer>
        <p>Stronę wykonał: 2026</p>
        <p>Znajdź nas także <a href="http://firmy.pl/komis">tutaj</a></p>
    </footer>
</body>
</html>

<?php
$link -> close();
?>