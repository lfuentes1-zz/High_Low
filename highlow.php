<?php

	if ($argc != 3) {
		die ("Incorrect number of arguments passed.  Pass a min and a max" . PHP_EOL);
	}
	if ($argc == 3) {

		$filename = $argv[0];
		$min = $argv[1];
		$max = $argv[2];

		if (!((is_numeric($min)) && (is_numeric($max)))) {
			die ("Arguments to $filename must be numeric representing min and max." . PHP_EOL);
		}
		
		//mt_rand generates a better random value by using an algorithm that allows random numbers to be generated much faster
		if ($min > $max)
		{
			$random_number = mt_rand ($max, $min);
			echo "Guess a number between {$max} and {$min}." . PHP_EOL;

		} else {
			$random_number = mt_rand ($min, $max);
			echo "Guess a number between {$min} and {$max}." . PHP_EOL;
		}
	}
	
	$try_number = 1;
	do {
		fwrite(STDOUT, "Can you guess my number? ");

		$users_guess = trim(fgets(STDIN));
		// var_dump($users_guess);
		
		//is_numeric is a PHP function that checks if the $users_guess is a numeric value or a numeric string value
		//ctype-digit is also another function PHP that can provide the same desired results
		if (is_numeric($users_guess))
		{	
			if ($users_guess < $random_number) {
				fwrite(STDOUT, "You guessed too low, guess higher! " . PHP_EOL);
				$try_number++;
			} elseif ($users_guess > $random_number) {
				fwrite(STDOUT, "You guessed too high, guess lower!\n");	
				$try_number++;
			} else {
				fwrite(STDOUT, "You guessed correctly!\n");
				fwrite(STDOUT, "It took you $try_number guesses to get it correctly." . PHP_EOL);
			}
		} else {
			fwrite(STDOUT, "You entered a NaN, enter a number! " . PHP_EOL);
		}
	}		
	while ($random_number != $users_guess);

	exit (0);
?>