<?php

function import_csv_from_outlook_express($cvs,$id_grupa) {
	global $user_login;
	global $IMPORT_PATH;
	$separator = ";";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	/*if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}*/
	$data = explode($separator, $data);
	$pola = count($data);
	$data3 = iconv('windows-1250','UTF-8',addslashes($data[3]));
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[5].'\' and `index` = \''.$user_login.'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		if ($i!=1)
		{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[5] . '\',\'' . $data3 . '\',\'\',\''.$user_login.'\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
			if ($id_grupa != "all")
			{
				$query = mysql_query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
				$res = mysql_fetch_array($query);
				mysql_query('insert into t_grupy values (NULL, \''.$res['id'].'\', \''.$id_grupa.'\', \''.$user_login.'\')');
			}
		}
	}
	$i++;
	}
	fclose($handle);
	$n=$i-2;
	$message = '<span style="color: white">Zaimportowano kontakty.</span>';
	return $message;
} 

function import_csv_from_thunderbird($cvs,$id_grupa) {
	global $user_login;
	global $IMPORT_PATH;
	$separator = ",";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	/*if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}*/
	$data = explode($separator, $data);
	$pola = count($data);
	$data2 = iconv('windows-1250','UTF-8',addslashes($data[2]));
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[4].'\' and `index` = \''.$user_login.'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		if ($i!=1)
		{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[4] . '\',\'' . $data2 . '\',\'\',\''.$user_login.'\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
			if ($id_grupa != "all")
			{
				$query = mysql_query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
				$res = mysql_fetch_array($query);
				mysql_query('insert into t_grupy values (NULL, \''.$res['id'].'\', \''.$id_grupa.'\', \''.$user_login.'\')');
			}
		}
	}
	$i++;
	}
	fclose($handle);
	$n=$i-2;
	$message = '<span style="color: white">Zaimportowano kontakty.</span>';
	return $message;
} 

function import_csv_from_thebat($cvs,$id_grupa) {
	global $user_login;
	global $IMPORT_PATH;
	$separator = ",";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	/*if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}*/
	$data = explode($separator, $data);
	$pola = count($data);
	$data2 = iconv('windows-1250','UTF-8',addslashes($data[0]));
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[1].'\' and `index` = \''.$user_login.'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		if ($i!=1)
		{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[1] . '\',\'' . $data2 . '\',\'\',\''.$user_login.'\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
			if ($id_grupa != "all")
			{
				$query = mysql_query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
				$res = mysql_fetch_array($query);
				mysql_query('insert into t_grupy values (NULL, \''.$res['id'].'\', \''.$id_grupa.'\', \''.$user_login.'\')');
			}
		}
	}
	$i++;
	}
	fclose($handle);
	$n=$i-2;
	$message = '<span style="color: white">Zaimportowano kontakty.</span>';
	return $message;
} 

function import_csv_from_excel($cvs,$id_grupa) {
	global $user_login;
	global $IMPORT_PATH;
	$separator = ";";
 	$handle = fopen($IMPORT_PATH.$cvs, "r");
	$i = 1;
	while (($data = fgets($handle, 4092)) !== FALSE)
	{
	/*if ($data[0][0] == '#' || $data[0][0] == '*' || empty($data[0])) 
	{
	continue;
	}*/
	$data = explode($separator, $data);
	$pola = count($data);
	$data1 = iconv('windows-1250','UTF-8',addslashes($data[1]));
	$data2 = iconv('windows-1250','UTF-8',addslashes($data[2]));
	$query = mysql_query('select * from t_mail_dane where email = \''.$data[0].'\' and `index` = \''.$user_login.'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		$sql = 'INSERT INTO t_mail_dane ';

		$sql .= 'VALUES (NULL,';

		$sql .= '\'' . $data[0] . '\',\'' . $data1 . '\',\'' . $data2 . '\',\''.$user_login.'\',\'\'';

		$sql .= ');';
		
		mysql_query($sql)
		or die('<b>Wystapil blad nr:</b> ' . mysql_errno() . '<br /><b>Opis bledu:</b> ' . mysql_error());
			if ($id_grupa != "all")
			{
				$query = mysql_query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
				$res = mysql_fetch_array($query);
				$query1 = mysql_query('select * from t_grupy where id_mail = \''.$res['id'].'\' and `index` = \''.$user_login.'\'');
				$num1 = mysql_num_rows($query1);
				if ($num1==0)
				{
				mysql_query('insert into t_grupy values (NULL, \''.$res['id'].'\', \''.$id_grupa.'\', \''.$user_login.'\')');
				}
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
