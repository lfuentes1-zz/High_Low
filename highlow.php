<?php

	define ("MIN", "1");
	define ("MAX", "100"); 

	// $random_number = rand (MIN, MAX);	
	//mt_rand generates a better random value by using an algorithm that allows random numbers to be generated much faster
	$random_number = mt_rand (MIN, MAX);
	$try_number = 1;

	do {
		fwrite(STDOUT, "Can you guess my number? ");

		$users_guess = trim(fgets(STDIN));
		var_dump($users_guess);
		
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