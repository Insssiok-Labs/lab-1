<?php

// Part 1: Function to calculate the average grade of a student
function calculateAverage($grades) {
    $total = array_sum($grades);
    $count = count($grades);
    return $count > 0 ? $total / $count : 0;
}

// Part 2: Function to filter students by age
function filterByAge($students, $age) {
    return array_filter($students, function($student) use ($age) {
        return $student['age'] > $age;
    });
}

// Part 3: Function to capitalize the names of all students
function capitalizeNames(&$students) {
    foreach ($students as &$student) {
        $student['name'] = ucwords($student['name']);
    }
}

// Part 4: Function to display the list of students with their average grade
function displayStudents($students) {
    foreach ($students as $student) {
        $average = calculateAverage($student['grades']);
        echo "Name: {$student['name']}, Age: {$student['age']}, Average Grade: " . number_format($average, 2) . "\n";
    }
}

// Bonus: Function to sort students by name
function sortByName(&$students) {
    usort($students, function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });
}

// Sample data: array of students
$students = [
    [
        "name" => "john doe",
        "age" => 20,
        "grades" => [85, 90, 78]
    ],
    [
        "name" => "alice smith",
        "age" => 21,
        "grades" => [92, 88, 86]
    ],
    [
        "name" => "bob johnson",
        "age" => 22,
        "grades" => [75, 70, 83]
    ],
    [
        "name" => "claire martin",
        "age" => 18,
        "grades" => [80, 85, 88]
    ],
    [
        "name" => "david brown",
        "age" => 19,
        "grades" => [90, 88, 92]
    ]
];

// Example Usage:

// 1. Filter students older than 18
$filteredStudents = filterByAge($students, 18);

// 2. Capitalize the names of all students
capitalizeNames($filteredStudents);

// 3. Sort the students by name
sortByName($filteredStudents);

// 4. Display the list of students with their average grades
displayStudents($filteredStudents);
