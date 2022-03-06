<?php

function import_cvs_from_outlook_express($cvs) {

	global $IMPORT_PATH;
	$separator = ";";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}
	$data = explode($separator, $data);
	$pola = count($data);
	$data3 = iconv('ISO-8859-2','UTF-8',$data[3]);
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[5].'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		if ($i!=1)
		{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[5] . '\',\'' . $data3 . '\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
		}
	}
	$i++;
	}
	fclose($handle);
	$n=$i-2;
	$message = '<span style="color: white">Zaimportowano kontakty.</span>';
	return $message;
} 

function import_cvs_from_thunderbird($cvs) {

	global $IMPORT_PATH;
	$separator = ",";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}
	$data = explode($separator, $data);
	$pola = count($data);
	$data2 = iconv('ISO-8859-2','UTF-8',$data[2]);
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[4].'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		if ($i!=1)
		{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[4] . '\',\'' . $data2 . '\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
		}
	}
	$i++;
	}
	fclose($handle);
	$n=$i-2;
	$message = '<span style="color: white">Zaimportowano kontakty.</span>';
	return $message;
} 

?>
