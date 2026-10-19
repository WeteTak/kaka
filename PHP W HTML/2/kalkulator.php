<?php
$liga = $_POST['klub'];
$rok = date("Y");
while ($liga > 1){
    echo "start w sezonie w sierpniu ". $rok++ ."w polskiej ". $liga-- ."lidze, zakończone awansem do ". $liga ."ligi w czerwcu ". $rok ."<br>";
    echo "start w sezonie w sierpniu '$rok++' w polskiej `$liga--` lidze, zakończone awansem do `$liga$` ligi w czerwcu `$rok` <br>";
}
var_dump($liga);

$slowo = 'cud';
$cookie = 'cookie';
echo "<br>".$slowo; 
$buzia ='slowo';
echo '<br>'.$buzia.'<br>';
echo 'magia albo '.$$buzia;
?>
