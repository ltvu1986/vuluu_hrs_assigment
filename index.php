<?php
// list of input files to test:
// level1_1.in
// level1_2.in
// level1_3.in
// level1_4.in
// level1_5.in

//list of output files to test:
// level1_1.out
// level1_2.out
// level1_3.out 
// level1_4.out
// level1_5.out 

const INPUT_FILE = 'test/level1_5.in';
const OUTPUT_FILE = 'test/level1_5.out';

// read input from file
$input = file(INPUT_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// check if input file is read successfully
if ($input === false) {
    die("Can not read input file.");
}

echo "Input data: ". INPUT_FILE ." <br>";
echo implode("<br>", $input) . "<br>";

// get the number of flights
$num_flights = (int)$input[0];

// array to store results
$results = [];

// process each flight
for ($i = 1; $i <= $num_flights; $i++) {
    // get the velocities for the current flight
    $velocities = array_map('intval', explode(' ', $input[$i]));
    
    // calculate the final height
    $height = 0;
    foreach ($velocities as $velocity) {
        $height += $velocity;
        // make sure height does not go below zero
        if ($height < 0) {
            $height = 0;
        }
    }
    
    // save the final height for the current flight
    $results[] = $height;
}

// output results to file
file_put_contents(OUTPUT_FILE, implode("\n", $results));

// show results
echo "<br> Output data: ". OUTPUT_FILE  ." <br>";
echo implode("<br>", $results);