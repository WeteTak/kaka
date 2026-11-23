<?php
$link = new mysqli('localhost','root','','biblioteka');

// skrypt 3 obsługa liryki
$liryka_f = $_POST['liryka']?? NULL;
if($liryka_f){
    $sql="
    SELECT tytul
    FROM ksiazka
    WHERE id=$liryka_f;
    ";
    $result = $link -> query($sql);
    $sel_liryka = $result -> fetch_assoc();
}

$sql="
SELECT id, tytul
FROM ksiazka
WHERE gatunek='liryka';
";
$result = $link -> query($sql);
$books_liryka = $result -> fetch_all(1);
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <!-- skrypt 1 -->
        <?php
        for($i = 0; $i < 20; $i++ ){
        echo "
            <img src='obraz.png' alt=''>
        "; 
        };
        ?>
        
         
    </header>

    <main>
        <section>
            <h2>Liryka</h2>
            <form action="" method="post">
                <select name="liryka" id="">
                    <!-- skrypt 2 -->
                     <!-- <option value='[id]'>[tytul]</option> -->
                    <?php
                    foreach($books_liryka as $book){
                        echo "
                        <option value='{$book['id']}'>{$book['tytul']}</option>
                        ";
                    }
                    ?>
                </select>
                <button>Rezerwuj</button>
            </form>
            <!-- Skrypt 3 -->
             <!-- <p>Książka {tytul} została zarezerwowana</p> -->
             <?php
                if($liryka_f){
                echo "
                <p>Książka {$sel_liryka['tytul']} została zarezerwowana</p>
                ";  
                };
             ?>
        </section>

        <section>
            <h2>Epika</h2>
            <form action="" method="post">
                <select name="" id="">
                    <!-- skrypt 2 -->
                </select>
                <button>Rezerwuj</button>
            </form>
            <!-- Skrypt 3 -->
        </section>

        <section>
            <h2>Dramat</h2>
            <form action="" method="post">
                <select name="" id="">
                    <!-- skrypt 2 -->
                </select>
                <button>Rezerwuj</button>
            </form>
            <!-- Skrypt 3 -->
        </section>

        <section>
            <h2>Zaległe książki</h2>
            <ul>
                <!-- skrypt 4 -->
            </ul>
        </section>

    </main>

    <footer>
        <p><strong>Autor: 100</strong></p>  
    </footer>
</body>
</html>


<?php
$link -> close();
?>