<?php
//membuat fungsi
function Perkenalan($nama, $salam = "Assalamualaikum")
{
    echo $salam . ", ";
    echo "Perkenalan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

//memanggil fungsi yang sudah dibuat
Perkenalan("Hamdana", "Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi tanpa mengisi parameter salam
Perkenalan($saya);