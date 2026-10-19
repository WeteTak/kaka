<?php
$link = new mysqli('localhost','root','','portal');
$login_f = $_POST['login']??NULL;
$password_f = $_POST['haslo']??NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section id="glewy" class="glewy">
        <h2>Nasze osiedle</h2>
        </section>
        <section id="gprawy" class="gprawy">
            <!-- Skrypt 1 -->
        </section>
    </header>

    <main>
        <section id="dlewy" class="dlewy">
        <h3>Logowanie</h3>
        <form action="" method="post">
            <label for="login">Login</label><br>
            <input type="text" name="login" id="login"><br>
            <label for="haslo">Hasło</label><br>
            <input type="password" name="haslo" id="haslo"><br><br>
            <input type="submit" value="Zaloguj">
        </form>
        </section>
        <section id="dprawy" class="dprawy">
            <h3>Wizytówka</h3>
            </section class="wizytowka">
            <?php
            if($login_f AND $password_f){
                $sql = "
                SELECT haslo 
                FROM uzytkownicy
                WHERE login='$login_f';
                ";
                $result = $link -> query($sql);
                if($result -> num_rows == 0){
                    echo "Login nie istnieje";
                }
                else {
                    $password_data = $result -> fetch_assoc();
                    $password_d = $password_data['haslo'];
                    if($password_d != SHA1($password_f)){
                        echo "Hasło nieprawidłowe";
                    }
                    else {
                        $sql = "
                        SELECT login, rok_urodz, przyjaciol, hobby, zdjecie
                        FROM uzytkownicy INNER JOIN dane ON uzytkownicy.id=dane.id
                        WHERE login='$login_f';
                        ";
                        $result = $link -> query($sql);
                        $info = $result -> fetch_assoc();

                        $age = date('Y')-$info['rok_urodz'];
                        echo "
                            <img src='{$info['zdjecie']}' alt='osoba'>
                            <h4>{$info['login']}($age)</h4>
                            <p>Hobby: {$info['hobby']}</p>
                            <h1><img src='icon-on.png' alt=''>{$info['przyjaciol']}</h1>
                            <button><a href='dane.html'>Więcej informacji</a></button>
                        ";

                    }
                }

            }
            ?>
            </section>
            <!-- <img src='{zdjecie}' alt='osoba'>
            <h4>{login}($age)</h4>
            <p>Hobby: {hobby}</p>
            <h1><img src='icon-on.png' alt=''>{przyjaciol}</h1>
            <button><a href='dane.html'>Więcej informacji</a></button> -->
        <section>
        
    </main>

    <footer>
    <p>Strone wykonał: mój numer pesel którego nie ma szans że będe pamiętał na pamięć
    </p>
    </footer>     
</body>
</html>

<?php
$link -> close();
?>

