<?php
// Define the player's points
$playerPoints = 450; // You can change this to any point value to test different scenarios

// Display the total score
echo "Player's total score is: $playerPoints<br>";

// Check if the player gets additional rewards (if points are greater than 500)
if ($playerPoints > 500) {
    echo "Do players get additional rewards? YES<br>";
} else {
    echo "Do players get additional rewards? NO<br>";
}
?>
