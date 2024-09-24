<?php
//Nilai Numerik
$nilaiNumerik = 92;

echo "- Nilai Numerik";
echo "<br>";
if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
echo "Nilai huruf: A";
echo "<br>";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
echo "Nilai huruf: B";
echo "<br>";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
echo "Nilai huruf: C";
echo "<br>";
} elseif ($nilaiNumerik < 70) {
echo "Nilai huruf: D";
echo "<br>";
}
echo "<br>";

//jarak
echo "- Menghitung Jarak";
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
$jarakSaatIni += $peningkatanHarian;
$hari++;
}
echo "<br>";
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br>";

//Jumlah lahan
echo "<br>";
echo "- Menghitung Buah yang Dipanen";
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
$jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}
echo "<br>";
echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";
echo "<br>";

//Skor Ujian
echo "<br>";
echo "- Menghitung Skor Ujian";
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;
foreach ($skorUjian as $skor) {
$totalSkor += $skor;
}
echo "<br>";
echo "Total skor ujian adalah: $totalSkor";
echo "<br>";

//Nilai Siswa
echo "<br>";
echo "- Mengitung Nilai Siswa";
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];
foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
    echo "Nilai: $nilai (Tidak lulus) <br>";
    continue;
    }
    echo "<br>";
    echo "Nilai: $nilai (Lulus) <br>";
}
?>
