<?php

	if($_GET['v'] && strlen($_GET['v']) >= 3)
	{
		switch($_GET['v'])
		{
			case '1.0':
				require('1-0.php');
				break;
			case '1.1':
				require('1-1.php');
				break;
		}
	} else {
		require('1-0.php');
	}

?>