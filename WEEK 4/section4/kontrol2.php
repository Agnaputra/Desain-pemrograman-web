<?php
// Define the price of the product
$hargaProduk = 120000;

// Define the discount percentage
$persentaseDiskon = 20;

// Check if the price is above Rp 100,000
if ($hargaProduk > 100000) {
    // Calculate the discount amount
    $jumlahDiskon = ($hargaProduk * $persentaseDiskon) / 100;

    // Calculate the price after discount
    $hargaSetelahDiskon = $hargaProduk - $jumlahDiskon;
    
    echo "Harga awal: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
    echo "Diskon: Rp " . number_format($jumlahDiskon, 0, ',', '.') . "<br>";
    echo "Harga yang harus dibayar setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.') . "<br>";
} else {
    echo "Harga produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
    echo "Tidak ada diskon karena harga di bawah Rp 100.000<br>";
}
?>
