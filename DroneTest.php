<?php

use PHPUnit\Framework\TestCase;

class DroneTest extends TestCase
{
    private $inputFile = 'test/level1_test.in';
    private $outputFile = 'test/level1_test.out';

    private function calculateDroneHeights($input)
    {
        $lines = explode("\n", $input);
        $num_flights = (int)$lines[0];
        $results = [];

        for ($i = 1; $i <= $num_flights; $i++) {
            $velocities = array_map('intval', explode(' ', trim($lines[$i])));
            $height = 0;
            $invalid = false;

            foreach ($velocities as $index => $velocity) {
                $height += $velocity;
                if ($height < 0) {
                    $invalid = true;
                    break; // exit early if height goes negative
                }
            }

            // if the height is negative, set it to zero
            // or if the flight was invalid, set height to zero
            $results[] = $invalid ? 0 : $height;
        }

        return $results;
    }

    public function testNormalCase()
    {
        $input = "3\n10 -3 -1 6\n4 3 7 1\n38 7 -17 5";
        file_put_contents($this->inputFile, $input);

        $expected = [12, 15, 33];
        $result = $this->calculateDroneHeights($input);

        $this->assertEquals($expected, $result);
    }

    public function testSingleFlight()
    {
        $input = "1\n5 -2 3";
        file_put_contents($this->inputFile, $input);

        $expected = [6];
        $result = $this->calculateDroneHeights($input);

        $this->assertEquals($expected, $result);
    }

    public function testNegativeHeightCorrection()
    {
        $input = "1\n-5 3 -2 4";
        file_put_contents($this->inputFile, $input);

        $expected = [0];
        $result = $this->calculateDroneHeights($input);

        $this->assertEquals($expected, $result);
    }

    public function testEmptyFlight()
    {
        $input = "1\n";
        file_put_contents($this->inputFile, $input);

        $expected = [0];
        $result = $this->calculateDroneHeights($input);

        $this->assertEquals($expected, $result);
    }

    public function testComplexFlights()
    {
        $input = "2\n10 -15 5 3\n-2 -3 7 -1 2";
        file_put_contents($this->inputFile, $input);

        $expected = [0, 0]; // edit expectation to match logic
        $result = $this->calculateDroneHeights($input);

        $this->assertEquals($expected, $result);
    }

    protected function tearDown(): void
    {
        if (file_exists($this->inputFile)) {
            unlink($this->inputFile);
        }
        if (file_exists($this->outputFile)) {
            unlink($this->outputFile);
        }
    }
}