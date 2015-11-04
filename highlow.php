<?php

	define ("MIN", "1");
	define ("MAX", "100"); 

	// $random_number = rand (MIN, MAX);	
	//mt_rand generates a better random value by using an algorithm that allows random numbers to be generated much faster
	$random_number = mt_rand (MIN, MAX);

	do {
		fwrite(STDOUT, "Can you guess my number? ");

		//Typecasting $users_guess to an int since fgets returns a string
		$users_guess = (int)trim(fgets(STDIN));
		// var_dump($users_guess);

		if ($users_guess < $random_number) {
			fwrite(STDOUT, "You guessed too low, guess higher! " . PHP_EOL);
		} elseif ($users_guess > $random_number) {
			fwrite(STDOUT, "You guessed too high, guess lower!\n");		
		} else {
			fwrite(STDOUT, "Right now, you guessed correctly!\n");
		}
	}		
	while ($random_number != $users_guess);

	exit (0);
?>