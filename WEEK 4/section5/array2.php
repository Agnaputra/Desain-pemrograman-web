<?php
// List of students and their grades
$daftarSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

// Calculate the total grades and count of students
$totalSkor = 0;
$jumlahSiswa = count($daftarSiswa);

// Iterate through the array to calculate total scores
foreach ($daftarSiswa as $siswa) {
    $totalSkor += $siswa[1];
}

// Calculate the average grade
$average = $totalSkor / $jumlahSiswa;

// Display the average grade
echo "Average grade: " . number_format($average, 2) . "<br>";

// Print students who scored above average
echo "Students who scored above average: <br>";
foreach ($daftarSiswa as $siswa) {
    if ($siswa[1] > $average) {
        echo "Name: {$siswa[0]}, Grade: {$siswa[1]} <br>";
    }
}
?>
