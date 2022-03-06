<?php

function createFile($file,$con)
{
  global $rootId;
  global $maxFileSize;
  
  $user = addslashes($_SERVER['PHP_AUTH_USER']);
  $file_name = addslashes($_FILES[$con]['name']);
  $file_type = addslashes($_FILES[$con]['type']);
  $file_path = $_FILES[$con]['tmp_name'];
  $file_size = $_FILES[$con]['size'];
  $file_error = $_FILES[$con]['error'];
  switch ($file_type){
	case 'text/cvs': $im='.cvs';
	break;
	case ' text/plain': $im='.txt';
	break;
  }
  $file_path_w=$file.'/'.$file_name;//sciezka do zapisu zdjec
  if($maxFileSize>$file_size)
  {
		// otwarcie pliku do odczytu
		$fp = fopen($file_path, 'r');
		if(!$fp){
		  
		  return false;
		}else{
			//odczytanie danych
			$contents = fread($fp, $file_size);

			// zamkniêcie pliku
			fclose($fp);
		}

		// stworzenie nowych danych

		$encContents = addslashes(($contents));

		// zapisanie nowych danych

		// otwarcie pliku do zapisu
		$fpw = fopen($file_path_w, "wb");
		if(!$fpw){
			return false;
		}else{
			// zapisanie danych
			fputs($fpw, $contents);

			// zamkniêcie pliku
			fclose($fpw);
		}
   
    }

	
    return $file_name;
}


?>
