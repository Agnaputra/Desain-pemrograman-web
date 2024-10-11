<?php
$pattern = '/[a-z]/';// Cocokan huruf kecil
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}
echo '<br>';
echo '<br>';
$pattern = '/[0-9]/';// Cocokan saru atau lebih derajat
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada huruf kecil!";
}
echo '<br>';
echo '<br>';
$pattern = '/apple/';
$replacement = 'banana' ;
$text = 'I like apple pie. ';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."

echo '<br>';
echo '<br>';
$pattern = '/go*d/'; // Cocokkan "god", "good", "gooood", dll.
$text = 'god is good. ' ;
if (preg_match($pattern, $text, $matches)) {
echo "Cocokkan: " . $matches[0];
} else {
echo "Tidak ada yang cocok!";
}

echo '<br>';
echo '<br>';
$pattern = '/go?d/'; // Match "gd" or "god" (optional "o")
$text = 'god is good.'; // Input text
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

echo '<br>';
echo '<br>';
$pattern = '/go{1,3}d/'; // Match "god", "good", or "gooood"
$text = 'god is good and gooood.'; // Input text
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

?>