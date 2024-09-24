<?php
// List of grades from 10 students
$grades = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Sort the array in ascending order
sort($grades);

// Remove the two lowest and two highest grades
$validGrades = array_slice($grades, 2, -2); // This removes the first two and last two elements

// Calculate the total of the remaining grades
$totalScore = array_sum($validGrades);

// Display the valid grades and the total score
echo "Grades used for calculation: " . implode(", ", $validGrades) . "<br>";
echo "Total score of the valid grades is: $totalScore";
?>
