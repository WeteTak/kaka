<?php
$zebra = $_POST["zebra"];
$zyrafa = $_POST["zyrafa"];
$staszic = $_POST["staszic"];
$kontener = $_POST["baterie"];
// echo $zebra. ' zeber ';
// echo $zyrafa. ' zyraf ';
// echo $staszic. ' Breloków Staszic ';
// echo $kontener. ' kontenerów na baterie ';
echo<<<END
$zebra zeber <br>
$zyrafa żyraf <br>
$staszic Breloków Staszic <br>
$kontener kontenerów na baterie <br>
<input type="button" onclick="location.href='index.php';" value="Powrót">
END;