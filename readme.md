Drone Height Calculation
Overview
This project contains a PHP program to solve the Autonomous Drone problem. The drone can only move up or down, and its height is updated based on a sequence of velocities provided in an input file. The program calculates the final height for each flight, ensuring the height never goes negative (if it does, it is reset to 0). The results are written to an output file. Unit tests are included to verify the correctness of the solution.~
Problem Description

The drone starts at height 0.
For each tick, a velocity is given (positive for upward, negative for downward).
The height is updated by adding the velocity, but if it becomes negative, it is reset to 0.
If the height becomes negative at any point during a flight, the final height for that flight is 0.
The input file contains multiple flights, and the program outputs the final height for each flight.

Example
Input (input.txt):
3
10 -3 -1 6
4 3 7 1
38 7 -17 5

Output (output.txt):
12
15
33

Project Structure
project/
├── src/
│   └── drone.php         # Main PHP program
├── tests/
│   └── DroneTest.php     # Unit tests
├── input.txt             # Input file (example)
├── output.txt            # Output file (generated)
├── composer.json         # Composer configuration
└── README.md             # This file

Prerequisites

PHP: Version 8.1 or higher
Composer: For dependency management and PHPUnit installation
PHPUnit: For running unit tests (installed via Composer)

Setup Instructions

Install PHP:

Ensure PHP is installed. Check with:php --version


If not installed, download from php.net.


Install Composer:

Download and install Composer from getcomposer.org.
Verify installation:composer --version




Clone or Set Up the Project:

Create a project directory and place the provided files (drone.php, DroneTest.php, input.txt) in the appropriate folders (src/ and tests/).
Alternatively, clone the repository (if hosted).


Install Dependencies:

In the project root, create or use the provided composer.json:{
    "require-dev": {
        "phpunit/phpunit": "^10"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}


Run:composer install

This creates the vendor/ directory with PHPUnit and autoloader.



Running the Program

Prepare Input File:

Create or edit input.txt in the project root with the format:<number_of_flights>
<velocity_sequence_for_flight_1>
<velocity_sequence_for_flight_2>
...

Example:3
10 -3 -1 6
4 3 7 1
38 7 -17 5




Run the Program:

Execute the main script:php src/drone.php


This reads input.txt, processes the flights, and writes the final heights to output.txt.


Check Output:

Open output.txt to view the results. For the example input above, the output will be:12
15
33





Running Unit Tests

Ensure PHPUnit is Installed:

Verify PHPUnit:vendor/bin/phpunit --version




Run Tests: vendor/bin/phpunit DroneTest.php



Expected Output:

If all tests pass, you will see:OK (5 tests, 5 assertions)


If any test fails, PHPUnit will display details about the failure.



Troubleshooting

PHP Version Error: Ensure PHP 8.1+ is used, as PHPUnit 10 requires it.
PHPUnit Not Found: Run composer install to ensure dependencies are installed.
File Not Found: Verify input.txt exists in the project root before running the program.
Test Failures: Check the test output for details. Ensure the logic in drone.php matches the test expectations in DroneTest.php.

Notes

The program assumes the input file is well-formed (correct number of flights and valid velocity sequences).
If the test case testComplexFlights fails with expected [3, 3] but actual [0, 0], verify the problem requirements, as the logic may need adjustment.
For further assistance, contact the project maintainer or refer to the PHPUnit documentation: phpunit.de.
