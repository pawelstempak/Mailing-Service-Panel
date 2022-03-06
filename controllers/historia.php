<?php

switch ($_GET['sort'])
{
	case 'd' :
	$sort = 'data';
	break;
	case '2' :
	$sort = 'tytul';
	break;
	case '2d' :
	$sort = 'tytul';
	$t = 'DESC';
	break;
	case '3' :
	$sort = 'adres_wlasny';
	break;
	case '3d' :
	$sort = 'adres_wlasny';
	$t = 'DESC';
	break;
	case '4' :
	$sort = 'grupa';
	break;
	case '4d' :
	$sort = 'grupa';
	$t = 'DESC';
	break;
	case '5' :
	$sort = 'dzial';
	break;
	case '5d' :
	$sort = 'dzial';
	$t = 'DESC';
	break;
	default :
	$sort = 'data';
	$t = 'DESC';
	break;
}

if (isset($_POST['filtr_drukowania']))
{
header('Location: index.php?strona='.DRUKOWANIE1.'&grupa='.$_POST['filtr'].'');
}

$email = $_POST['email'];
$nazwa = $_POST['nazwa'];
$firma = $_POST['firma'];
$grupa = $_POST['grupa'];

$grupy= new sql();
$grupy->set_table('historia');
$grupy->set('id',"");
$grupy->set('tytul',"");
$grupy->set('tresc',"");
$grupy->set('grupa',"");
$grupy->set('adres_wlasny',"");
$grupy->set('zalacznik',"");
$grupy->set('data',"");
$grupy->set('ilosc_grupa',"");

if ($_GET['action']=='usun')
{
	mysql_query('delete from t_historia where id = \''.$_GET['id'].'\' and `index` = \''.$user_login.'\'');
}

if (isset($_POST['filtr']))
{
	if ($_POST['filtr']=="all")
	{
	$warunek = "0";
	$grupy->filter=' `index` = \''.$user_login.'\' and id>\''.$warunek.'\'';
	$wyswietl=$grupy->load_db_all();
	}
	else
	{
	$warunek = $_POST['filtr'];
	$grupy->filter=' `index` = \''.$user_login.'\' and  grupa=\''.$warunek.'\'';
	$wyswietl=$grupy->load_db_all();
	}
	$cecha = " grupa=";
	$smarty->assign('cecha','1');
}
elseif (isset($_POST['filtr_wlasne']))
{
	if ($_POST['filtr_wlasne']=="all")
	{
	$warunek = "0";
	$grupy->filter=" `index` = \''.$user_login.'\' and  id>'".$warunek."'";
	$wyswietl=$grupy->load_db_all();
	}
	else
	{
	$warunek = $_POST['filtr_wlasne'];
	$grupy->filter=" `index` = \''.$user_login.'\' and  adres_wlasny='".$warunek."'";
	$wyswietl=$grupy->load_db_all();
	}
	$cecha = " adres_wlasny=";
	$smarty->assign('cecha','2');
}
else
{
	$warunek = "0";
	$cecha = " id>";
	$grupy->filter=" `index` = '".$user_login."' and".$cecha."'".$warunek."' order by ".$sort." ".$t."";
	$wyswietl=$grupy->load_db_all();
}

$grupy= new sql();
$grupy->set_table('mail_grupy');
$grupy->set('id',"");
$grupy->set('grupa',"");
$grupy->filter=" `index` = '".$user_login."'";
$wyswietl_grupy=$grupy->load_db_all();

$wlasne= new sql();
$wlasne->set_table('mail_wlasne');
$wlasne->set('nazwa',"");
$wlasne->filter=" `index` = '".$user_login."'";
$wyswietl_wlasne=$wlasne->load_db_all();

$smarty->assign('grupy',$wyswietl);

if (isset($_POST['raport']) and $_POST['raport']!="")
{
				if ($_GET['cecha'] == "1") {$cecha1 = " grupa=";} elseif  ($_GET['cecha'] == "2") {$cecha1 = " adres_wlasny=";} else {$cecha1 = " id>";}
				$subject="Raport mailingowy";
				//$subject=iconv("UTF-8","ISO-8859-2", "Raport mailingowy");
				//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?='; 
				$q = mysql_query("select * from t_historia where ".$cecha1."'".$_POST['warunek1']."' and `index` = '".$user_login."'");
					$body .= '<table style="font-size: 12; font-family: Verdana"><tr><td><span style="font-weight: bold">Data</span></td><td width="10px"></td><td><span style="font-weight: bold">Tytul</span></td><td width="10px"></td><td><span style="font-weight: bold">Adres wlasny</span></td><td width="10px"></td><td><span style="font-weight: bold">Grupa</span></td></tr>';
					while ($r = mysql_fetch_array($q))
					{
						$body .= ' <tr><td>'.$r['data'].'</td><td width="10px"></td><td>'.$r['tytul'].'</td><td width="10px"></td><td>'.$r['adres_wlasny'].'</td><td width="10px"></td><td>'.$r['grupa'].'</td></tr>';
					}
					$body .= '</table>';
					//$body=iconv("UTF-8","ISO-8859-2", $body);
					$email = $_POST['raport'];
					$wiadomosc = new eMail('2','<Mailing Service Panel>','<Mailing Service Panel>');
					$wiadomosc->eMailContent($subject, $body);
					$wiadomosc->eMailSend($email);
					$smarty->assign('note',$email);
}

$grupy1= new sql();
$grupy1->set_table('historia');
$grupy1->set('id',"");
$grupy1->set('tytul',"");
$grupy1->set('tresc',"");
$grupy1->set('grupa',"");
$grupy1->set('adres_wlasny',"");
$grupy1->set('zalacznik',"");
$grupy1->set('data',"");
$grupy1->set('ilosc_grupa',"");
$filter=" id = '".$_GET['id']."' and `index` = '".$user_login."'";
$tresc=$grupy1->load_db2($filter);
$tresc_wiadomosci = nl2br($tresc['tresc']);
$smarty->assign('filtr_grupy',$_POST['filtr']);
$smarty->assign('wlasne',$wyswietl_wlasne);
$smarty->assign('tresc',$tresc);
$smarty->assign('grupy1',$wyswietl_grupy);
$smarty->assign('k_kontakt',$k_kontakt);
$smarty->assign('kontakty',$wyswietl);
$smarty->assign('warunek',$warunek);
$smarty->assign('sort',$_GET['sort']);
$smarty->assign('action',$_GET['action']);
$smarty->assign('tresc_wiadomosci',$tresc_wiadomosci);
$smarty->assign('user_login',$user_login);

?>
