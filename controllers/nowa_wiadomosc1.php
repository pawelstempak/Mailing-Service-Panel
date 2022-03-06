<?php
function upload_ftp($k)
{

	$plik_tmp = $_FILES['file-'.$k]['tmp_name'];
	$plik_nazwa = $_FILES['file-'.$k]['name'];
	$plik_rozmiar = $_FILES['file-'.$k]['size'];	
	$path = FILED; 
		if(is_uploaded_file($plik_tmp)) 
		{
			move_uploaded_file($plik_tmp, $path.$plik_nazwa);
			return $plik_nazwa;
		}
}

	$query = mysql_query('select * from t_mail_grupy where `index` = \''.$user_login.'\' limit 1');
	$result = mysql_fetch_array($query);
	(isset($_POST['filtr_grupa']))?$filtr = $_POST['filtr_grupa']:$filtr=$result['id'];
	$kat_user= new sql();
	$res=$kat_user->query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$filtr.'\' and g.index = \''.$user_login.'\' order by d.email');
	$wyswietl=$kat_user->fetch_asc($res);
	$smarty->assign('kontakty',$wyswietl);
	
if (isset($_POST['nowa_wiadomosc']))
{
		$date=date("Y-m-d H:i:s");
		if ($_FILES['file-1']['name']!="" or $_FILES['file-2']['name'] != "" or $_FILES['file-3']['name'] != "" or $_FILES['file-4']['name'] != "" or $_FILES['file-5']['name'] != "" or $_FILES['file-6']['name'] != "") 
		{
				$id_konto = $_POST['konto'];
				$grupa1 = $_POST['filtr_grupa'];
				$subject = $_POST['temat'];
				$body = $_POST['tresc'];
				if($_POST['czy_podpis']=="tak") {$body .= "\n\n\n".$_POST['podpis']."\n\n";}
				$subject=iconv("UTF-8","ISO-8859-2", $subject);
				$subject='=?UTF-8?B?'.base64_encode($subject).'?='; 
				$body = nl2br($body);
				
						for($n=1;$n<25;$n++)
						{
							if($_FILES['file-'.$n]['name']!="") 
							{
							$uploaded = upload_ftp($n);
							$file=fopen(FILED.$uploaded,"r");
							$data = fread($file, filesize(FILED.$uploaded));
							$tab[$n]['uploaded']=$uploaded;
							$tab[$n]['data']=$data;
							$tab[$n]['type']=$_FILES['file-'.$n]['type'];
							}
						}
				
				$q = mysql_query('select nazwa, opis from t_mail_wlasne where id=\''.$id_konto.'\' and `index` = \''.$user_login.'\'');
				$r = mysql_fetch_array($q);
		 	   for ($i=0;$i<count($_POST["email"]);$i++) 
				{
   			  		$email = $_POST["email"][$i];
						$hist = "";
						$opis = iconv("UTF-8","ISO-8859-2", $r['opis']);
						if ($_POST['czy_potwierdzic'] == "tak") {$rodzaj_wiadomosci = "2";} else {$rodzaj_wiadomosci = "0";}
						if ($_POST['czy_wypisywanie'] == "tak") {$body .= "<br /><br />Jeżeli nie chcesz otrzymywać więcej takich wiadomości E-mail kliknij w link poniżej lub skopiuj go do paska adresu swojej przeglądarki i kliknij Enter.<br /><a href=\"".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."\">".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."</a>";}
						$wiadomosc = new eMail($rodzaj_wiadomosci,''.$opis.' <'.$r['nazwa'].'>',''.$r['opis'].' <'.$r['nazwa'].'>');
						$wiadomosc->eMailContent($subject, $body);
						for($n=1;$n<25;$n++)
						{
							if ($_FILES['file-'.$n]['name']!="") 
							{
							$plik_typ = $tab[$n]['type'];
							$uploaded = $tab[$n]['uploaded'];
							$data=$tab[$n]['data'];
							$wiadomosc->eMailAttachment($plik_typ,$uploaded,$data);
							$hist .= "<a href=\"".TEMP.$uploaded."\">".$uploaded."</a>";
							}
						}
						$wiadomosc->eMailSend($email);
						$smarty->assign('note','ok');
						$smarty->assign('typ',$plik_typ);
				}
		$query=mysql_query('select * from '.$cfg['db_prefix'].'mail_dane d, '.$cfg['db_prefix'].'grupy g where d.id = g.id_mail and g.id_grupa=\''.$grupa1.'\' and g.index = \''.$user_login.'\'');
		$ilosc_grupa = mysql_num_rows($query);
		$query1=mysql_query('select * from '.$cfg['db_prefix'].'mail_grupy where id=\''.$grupa1.'\' and `index` = \''.$user_login.'\'');
		$result1 = mysql_fetch_array($query1);
		$historia= new sql();
		$historia->set_table('historia');
		$historia->set('tytul',$_POST['temat']);
		$historia->set('tresc',$_POST['tresc']);
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
				$grupa1 = $_POST['filtr_grupa'];
				$subject = $_POST['temat'];
				$body = $_POST['tresc'];
				if($_POST['czy_podpis']=="tak") {$body .= "\n\n\n".$_POST['podpis']."\n\n";}
				//$subject=iconv("UTF-8","ISO-8859-2", $subject);
				//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?='; 
				//$body=iconv("UTF-8","ISO-8859-2", $body);
				//$tresc_stala=iconv("ISO-8859-2","UTF-8", $tresc_stala);
				//$body .= $tresc_stala;
				$body = nl2br($body);

		$q = mysql_query('select nazwa, opis from t_mail_wlasne where id=\''.$id_konto.'\' and `index` = \''.$user_login.'\'');
		$r = mysql_fetch_array($q);
 	   for ($i=0;$i<count($_POST["email"]);$i++) {
   			$email1 = $_POST["email"][$i];
				if (isset($form))
				{
								$opis = iconv("UTF-8","ISO-8859-2", $r['opis']);
								if ($_POST['czy_potwierdzic'] == "tak") {$rodzaj_wiadomosci = "3";} else {$rodzaj_wiadomosci = "1";}
								if ($_POST['czy_wypisywanie'] == "tak") {$body .= "<br /><br />Jeżeli nie chcesz otrzymywać więcej takich wiadomości E-mail kliknij w link poniżej lub skopiuj go do paska adresu swojej przeglądarki i kliknij Enter.<br /><a href=\"".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."\">".DIR."?strona=100&h=1&mail=".$result['id']."&grupa=".$grupa1."</a>";}	
								$wiadomosc = new eMail($rodzaj_wiadomosci,''.$opis.' <'.$r['nazwa'].'>',''.$opis.' <'.$r['nazwa'].'>');
								$email = $email1;
								$wiadomosc->eMailContent($subject, $body);
								$wiadomosc->eMailSend($email);
					$smarty->assign('note','ok');
				}
		}
		$query=mysql_query('select * from '.$cfg['db_prefix'].'grupy where id_grupa=\''.$grupa1.'\' and `index` = \''.$user_login.'\'');
		$ilosc_grupa = mysql_num_rows($query);
		$query1=mysql_query('select * from '.$cfg['db_prefix'].'mail_grupy where id=\''.$grupa1.'\' and `index` = \''.$user_login.'\'');
		$result1 = mysql_fetch_array($query1);
		$historia= new sql();
		$historia->set_table('historia');
		$historia->set('tytul',$_POST['temat']);
		$historia->set('tresc',$_POST['tresc']);
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
		$smarty->assign('konto1',$_POST['konto']);
		$smarty->assign('konto',$wyswietl_wlasne);
		$smarty->assign('grupa',$wyswietl_grupy);
		$smarty->assign('filtr_grupa',$_POST['filtr_grupa']);
		
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
?>
