<?php
function upload_ftp()
{

	$plik_tmp = $_FILES['file']['tmp_name'];
	$plik_nazwa = $_FILES['file']['name'];
	$plik_rozmiar = $_FILES['file']['size'];
	$path = FILED; 
		if(is_uploaded_file($plik_tmp)) 
		{
			move_uploaded_file($plik_tmp, $path.$plik_nazwa);
			return $plik_nazwa;
		}
}

function upload_ftp1()
{

	$plik_tmp = $_FILES['file1']['tmp_name'];
	$plik_nazwa = $_FILES['file1']['name'];
	$plik_rozmiar = $_FILES['file1']['size'];
	$path = FILED; 
		if(is_uploaded_file($plik_tmp)) 
		{
			move_uploaded_file($plik_tmp, $path.$plik_nazwa);
			return $plik_nazwa;
		}
}

function upload_ftp2()
{

	$plik_tmp = $_FILES['file2']['tmp_name'];
	$plik_nazwa = $_FILES['file2']['name'];
	$plik_rozmiar = $_FILES['file2']['size'];
	$path = FILED; 
		if(is_uploaded_file($plik_tmp)) 
		{
			move_uploaded_file($plik_tmp, $path.$plik_nazwa);
			return $plik_nazwa;
		}
}

function upload_ftp3()
{

	$plik_tmp = $_FILES['file3']['tmp_name'];
	$plik_nazwa = $_FILES['file3']['name'];
	$plik_rozmiar = $_FILES['file3']['size'];
	$path = FILED; 
		if(is_uploaded_file($plik_tmp)) 
		{
			move_uploaded_file($plik_tmp, $path.$plik_nazwa);
			return $plik_nazwa;
		}
}

if (isset($_POST['nowa_wiadomosc']) and $_FILES['file3']['type'] == "text/html")
{
		$date=date("Y-m-d H:i:s");
		if ($_FILES['file']['name']!="" or $_FILES['file1']['name'] != "" or $_FILES['file2']['name'] != "") 
		{
				if ($_FILES['file']['name']!="") {$uploaded = upload_ftp();}
				if ($_FILES['file1']['name']!="") {$uploaded1 = upload_ftp1();}
				if ($_FILES['file2']['name']!="") {$uploaded2 = upload_ftp2();}
				//$plik = apache_lookup_uri($uploaded); nie dziala na tym serwerze php nie jest zainstalwoane jako funkcja Apache
				$plik_typ = $_FILES['file']['type'];
				$plik_typ1 = $_FILES['file1']['type'];
				$plik_typ2 = $_FILES['file2']['type'];
				$form = $_POST['nowa_wiadomosc'];
				$id_konto = $_POST['konto'];
				$grupa1 = $_POST['grupa'];
				$subject = $_POST['temat'];
				$kodowanie = $_POST['kodowanie'];
				//if($_POST['czy_podpis']=="tak") {$body .= "\n\n\n".$_POST['podpis']."\n\n";}
				$subject=iconv("UTF-8","ISO-8859-2", $subject);
				//$subject='=?ISO-8859-2?B?'.base64_encode($subject).'?='; 
				//$tresc_stala=iconv("ISO-8859-2","UTF-8", $tresc_stala);
				//$body .= $tresc_stala;
				//$body = nl2br($body);
				//$body = iconv("UTF-8","ISO-8859-2", $body);
				$q = mysql_query('select nazwa, opis from t_mail_wlasne where id=\''.$id_konto.'\' and `index` = \''.$user_login.'\'');
				$r = mysql_fetch_array($q);
				if (isset($form))
				{
					$query=mysql_query('select * from '.$cfg['db_prefix'].'mail_dane d, '.$cfg['db_prefix'].'grupy g where d.id = g.id_mail and g.id_grupa=\''.$grupa1.'\' and g.index = \''.$user_login.'\'');
					$ilosc_grupa = mysql_num_rows($query);
					$opis = iconv("UTF-8","ISO-8859-2", $r['opis']);
					//if ($_POST['czy_potwierdzic'] == "tak") {$rodzaj_wiadomosci = "3";} else {$rodzaj_wiadomosci = "1";}
					$uploaded3 = upload_ftp3();
					$tresc = "Biuletyn - <a href=\"".TEMP.$uploaded3."\">".$uploaded3."</a>";
					$mail             = new PHPMailer();
					$body             = $mail->getFile(FILED.$uploaded3);
					$body             = eregi_replace("[\]",'',$body);
					$mail->From       = $r['nazwa'];
					$mail->FromName   = $opis;
					$mail->CharSet    = $kodowanie;
					$mail->Subject    = $subject;
					$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
					$hist = "";
					if ($_FILES['file']['name']!="") { 
					$mail->AddAttachment(FILED.$uploaded); 
					$hist .= "<a href=\"".TEMP.$uploaded."\">".$uploaded."</a>";
					}
					if ($_FILES['file1']['name']!="") { 
					$mail->AddAttachment(FILED.$uploaded1); 
					$hist .= ";<a href=\"".TEMP.$uploaded1."\">".$uploaded1."</a>";
					}
					if ($_FILES['file2']['name']!="") { 
					$mail->AddAttachment(FILED.$uploaded2); 
					$hist .= ";<a href=\"".TEMP.$uploaded2."\">".$uploaded2."</a>";
					}
					while ($result = mysql_fetch_array($query))
					{					
					if ($_POST['czy_wypisywanie'] == "tak") {$body .= "<br /><br />Je??eli nie chcesz otrzymywa?? wi??cej takich wiadomo??ci E-mail kliknij w link poni??ej lub skopiuj go do paska adresu swojej przegl??darki i kliknij Enter.<br /><a href=\"".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."\">".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."</a>";}			
					$mail->MsgHTML($body);
					$mail->AddAddress($result['email'], "");
					$mail->Send();
					$mail->ClearAddresses();
					}
					$smarty->assign('note','ok');
				}
		$query1=mysql_query('select * from '.$cfg['db_prefix'].'mail_grupy where id=\''.$grupa1.'\' and `index` = \''.$user_login.'\'');
		$result1 = mysql_fetch_array($query1);
		$historia= new sql();
		$historia->set_table('historia');
		$historia->set('tytul',$_POST['temat']);
		$historia->set('tresc',$tresc);
		$historia->set('adres_wlasny',$r['nazwa']);
		$historia->set('grupa',$result1['grupa']);
		$historia->set('zalacznik',$hist);
		$historia->set('data',$date);
		$historia->set('ilosc_grupa',$ilosc_grupa);
		$historia->set('`index`',$user_login);
		$wyswietl_historia=$historia->insert_db();
			
		}
		else
		{
				$form = $_POST['nowa_wiadomosc'];
				$id_konto = $_POST['konto'];
				$grupa1 = $_POST['grupa'];
				$subject = $_POST['temat'];
				$kodowanie = $_POST['kodowanie'];
				//if($_POST['czy_podpis']=="tak") {$body .= "\n\n\n".$_POST['podpis']."\n\n";}
				//$subject=iconv("UTF-8","ISO-8859-2", $subject);
				//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?='; 
				//$tresc_stala=iconv("ISO-8859-2","UTF-8", $tresc_stala);
				//$body .= $tresc_stala;
				$q = mysql_query('select nazwa, opis from t_mail_wlasne where id=\''.$id_konto.'\' and `index` = \''.$user_login.'\'');
				$r = mysql_fetch_array($q);
				if (isset($form))
				{
					$query=mysql_query('select * from '.$cfg['db_prefix'].'mail_dane d, '.$cfg['db_prefix'].'grupy g where d.id = g.id_mail and g.id_grupa=\''.$grupa1.'\' and g.index = \''.$user_login.'\'');
					$ilosc_grupa = mysql_num_rows($query);
					$opis = iconv("UTF-8","ISO-8859-2", $r['opis']);
					//if ($_POST['czy_potwierdzic'] == "tak") {$rodzaj_wiadomosci = "3";} else {$rodzaj_wiadomosci = "1";}
					$uploaded3 = upload_ftp3();
					$tresc = "Biuletyn - <a href=\"".TEMP.$uploaded3."\">".$uploaded3."</a>";
					$mail             = new PHPMailer();
					$body             = $mail->getFile(FILED.$uploaded3);
					$body             = eregi_replace("[\]",'',$body);
					$mail->From       = $r['nazwa'];
					$mail->FromName   = $opis;
					$mail->CharSet    = $kodowanie;
					$mail->Subject    = $subject;
					$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
					while ($result = mysql_fetch_array($query))
					{
					if ($_POST['czy_wypisywanie'] == "tak") {$body .= "<br /><br />Je??eli nie chcesz otrzymywa?? wi??cej takich wiadomo??ci E-mail kliknij w link poni??ej lub skopiuj go do paska adresu swojej przegl??darki i kliknij Enter.<br /><a href=\"".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."\">".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."</a>";}			
					$mail->MsgHTML($body);
					$mail->AddAddress($result['email'], "");
					$mail->Send();
					$mail->ClearAddresses();
					}
					$smarty->assign('note','ok');
				}
		$query1=mysql_query('select * from '.$cfg['db_prefix'].'mail_grupy where id=\''.$grupa1.'\' and `index` = \''.$user_login.'\'');
		$result1 = mysql_fetch_array($query1);
		$historia= new sql();
		$historia->set_table('historia');
		$historia->set('tytul',$_POST['temat']);
		$historia->set('tresc',$tresc);
		$historia->set('adres_wlasny',$r['nazwa']);
		$historia->set('grupa',$result1['grupa']);
		$historia->set('zalacznik','brak');
		$historia->set('data',$date);
		$historia->set('ilosc_grupa',$ilosc_grupa);
		$historia->set('`index`',$user_login);
		$wyswietl_historia=$historia->insert_db();			
			
		}
}
		$wlasne= new sql();
		$wlasne->set_table('mail_wlasne');
		$wlasne->set('id',"");
		$wlasne->set('nazwa',"");
		$wlasne->set('opis',"");
		$wlasne->filter=" `index` = '".$user_login."'";
		$wyswietl_wlasne=$wlasne->load_db_all();

		$grupa= new sql();
		$grupa->set_table('mail_grupy');
		$grupa->set('id',"");
		$grupa->set('grupa',"");
		$grupa->filter=" `index` = '".$user_login."'";
		$wyswietl_grupy=$grupa->load_db_all();
		$smarty->assign('konto',$wyswietl_wlasne);
		$smarty->assign('grupa',$wyswietl_grupy);
		
	$grupy= new sql();
	$grupy->set_table('mail_wlasne');
	$grupy->set('id',"");
	$filter=" `index` = '".$user_login."' LIMIT 1";	
	$podpis1=$grupy->load_db2($filter);
	isset($_POST['konto'])?$id_konto = $_POST['konto']:$id_konto = $podpis1['id'];
	$grupy= new sql();
	$grupy->set_table('mail_wlasne');
	$grupy->set('podpis',"");
	$grupy->set('id',"");
	$filter=" id='".$id_konto."' and `index` = '".$user_login."'";	
	$podpis=$grupy->load_db2($filter);
	$smarty->assign('podpis',$podpis);
	if(isset($_FILES['file3']['type']) and $_FILES['file3']['type'] != "" and $_FILES['file3']['type'] != "text/html")
	{
		$smarty->assign('blad',"Error: niedozwolony typ pliku.");
	}
?>
