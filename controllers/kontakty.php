<?php
$email = trim($_POST['email']);
$nazwa = trim($_POST['nazwa']);
$firma = trim($_POST['firma']);
$grupa = $_POST['grupa'];

switch ($_GET['sort'])
{
	case 'd' :
	$sort = 'id';
	break;
	case '2' :
	$sort = 'email';
	break;
	case '2d' :
	$sort = 'email';
	$t = 'DESC';
	break;
	case '3' :
	$sort = 'nazwa';
	break;
	case '3d' :
	$sort = 'nazwa';
	$t = 'DESC';
	break;
	case '4' :
	$sort = 'firma';
	break;
	case '4d' :
	$sort = 'firma';
	$t = 'DESC';
	break;
	default :
	$sort = 'id';
	$t = 'DESC';
	break;
}
if (isset($_POST['filtr_drukowania']))
{
header('Location: index.php?strona='.DRUKOWANIE.'&grupa='.$_POST['filtr'].'');
}
// zapisywanie maili w bazie
if ($_POST['wyslij_kontakt'])
{
	$query = mysql_query('select * from t_mail_dane where email = \''.$email.'\' and `index` = \''.$user_login.'\'');
	$num = mysql_num_rows($query);
	if ($num == 0)
	{
		$kontakty1= new sql();
		$kontakty1->set_table('mail_dane');
		$kontakty1->set('email',$email);
		$kontakty1->set('nazwa',$nazwa);
		$kontakty1->set('firma',$firma);
		$kontakty1->set('`index`',$user_login);
		$kontakty1->insert_db();
			if ($grupa != "all")
			{
				$query = mysql_query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
				$res = mysql_fetch_array($query);
				mysql_query('insert into t_grupy values (NULL, \''.$res['id'].'\', \''.$grupa.'\', \''.$user_login.'\')');
			}
		$nota = "Adres dodany do bazy";
	}
	else
	{
		$nota = "<span style=\"color: red\">Podany adres email istnieje w bazie</span>";
	}
	$smarty->assign('notatka',$nota);
}
// przypisywanie maili do konkretnej grupy
if ($_POST['dodaj_kontakt_do_grupy'])
{
	if($_POST['dodaj_kontakt_do_grupy']!="bl")
	{
      for ($i=0;$i<count($_POST["email"]);$i++) {
        $id = $_POST["email"][$i];
        	$query = mysql_query('select * from t_grupy where id_mail = \''.$id.'\' and id_grupa = \''.$_POST['dodaj_kontakt_do_grupy'].'\' and `index` = \''.$user_login.'\'');
        	$num = mysql_num_rows($query);
        	if ($num == 0)
        	{
			$kontakty1= new sql();
			$kontakty1->set_table('grupy');
			$kontakty1->set('id_mail',$id);
			$kontakty1->set('id_grupa',$_POST['dodaj_kontakt_do_grupy']);
			$kontakty1->set('`index`',$user_login);
			$kontakty1->insert_db();
			}
      }
	}
	else
	{
      for ($i=0;$i<count($_POST["email"]);$i++) {
        $id = $_POST["email"][$i];
		  mysql_query('delete from t_grupy where id_mail = \''.$id.'\' and `index` = \''.$user_login.'\'');
        mysql_query("update t_mail_dane set blacklist = '1' where id = '".$id."'");
		}
	}
}
// usuwanie maila z bazy danych 
if (isset($_POST['submit_usun']))
{
      for ($i=0;$i<count($_POST["email"]);$i++) {
        $id = $_POST["email"][$i];	
			mysql_query('delete from t_mail_dane where id = \''.$id.'\' and `index` = \''.$user_login.'\'');
		}
}

// edycja maila 
if (isset($_POST['edytuj_kontakt']))
{
$k= new sql();
$k->set_table('mail_dane');
$k->set('email',$email);
$k->set('nazwa',$nazwa);
$k->set('firma',$firma);
$filter=" id='".$_GET['id']."' and `index` = '".$user_login."'";
$k->update_db2($filter);	
}

/*$kontakty= new sql();
$kontakty->set_table('mail_dane');
$kontakty->set('id',"");
$kontakty->set('email',"");
$kontakty->set('nazwa',"");
$kontakty->set('firma',"");
$kontakty->set('grupa',"");
$kontakty->filter=$cecha."'".$warunek."'";
$wyswietl=$kontakty->load_db_all();*/

$s = ($_GET["s"]>1)?number_format($_GET["s"], 0, "", ""):1; // numer strony
if(isset($_POST['na_stronie']) and $_POST['na_stronie']!="" and $_POST['na_stronie']!=0)
{
$na_stronie = $_POST['na_stronie'];
}
elseif(isset($_GET['na_stronie']))
{
$na_stronie = $_GET['na_stronie'];
}
else
{
$na_stronie = 100;         // liczba rekordow widocznych na stronie
}
$na_pasku   = 4;          // liczba odpowiedzi/2 na pasku
$skrypt = "index.php?strona=5&na_stronie=".$na_stronie."&sort=".$_GET['sort']."&s="; // skrypt do wysy3ania danych

  if ($_POST['filtr']=="all" or $_POST['filtr']==NULL and $_GET['grupa']=="" or $_POST['filtr']=="" and $_GET['grupa']=="") {
  $rekordow = mysql_result(mysql_query('SELECT COUNT(*) FROM t_mail_dane where `index` = \''.$user_login.'\' and blacklist = \'0\' order by id'),0);
  }
  elseif($_POST['filtr']=="bl")
  {
  $rekordow = mysql_result(mysql_query('SELECT COUNT(*) FROM t_mail_dane where blacklist = \'1\' and `index` = \''.$user_login.'\' order by id'),0);	
  }	
  else
  {
  $rekordow = mysql_result(mysql_query('SELECT COUNT(*) FROM t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_POST['filtr'].'\' and d.blacklist = \'0\' and g.index = \''.$user_login.'\' order by d.id'),0);
  }
 
  $stron = ceil($rekordow/$na_stronie);
  if ($s>$stron and $rekordow>0) $s = $stron;
  $start = ($s-1)*$na_stronie;
echo $_GET['grupa'];
$kat_user= new sql();
if ($_POST['filtr']=="all" or $_POST['filtr']==NULL and $_GET['grupa']=="" or $_POST['filtr']=="" and $_GET['grupa']=="") {
$res=$kat_user->query('select * from t_mail_dane where blacklist = \'0\' and `index` = \''.$user_login.'\' order by '.$sort.' '.$t.' LIMIT '.$start.', '.$na_stronie.'');
}
elseif($_POST['filtr']=="bl")
{
$res=$kat_user->query('select * from t_mail_dane where blacklist = \'1\' and `index` = \''.$user_login.'\' order by '.$sort.' '.$t.'');
}
else
{
	if (isset($_POST['filtr']))
	{
	$res=$kat_user->query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_POST['filtr'].'\' and d.blacklist = \'0\' and g.index = \''.$user_login.'\' order by '.$sort.' '.$t.'');
	}
	else
	{
	$res=$kat_user->query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_GET['grupa'].'\' and d.blacklist = \'0\' and g.index = \''.$user_login.'\' order by '.$sort.' '.$t.'');
	}
}
$wyswietl=$kat_user->fetch_asc($res);
$smarty -> assign('pasek',pasek($rekordow,$na_stronie,$na_pasku,$skrypt,$s));
$smarty -> assign('start',$start);

if (isset($_POST['raport']) and $_POST['raport']!="")
{				
				if ($_POST['grupa_raport']!="all")
				{
				$q = mysql_query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_POST['grupa_raport'].'\' and g.index = \''.$user_login.'\' order by d.id');
				}
				else
				{
				$q = mysql_query('select * from t_mail_dane d, t_grupy g, t_mail_grupy m where d.id = g.id_mail and m.id = g.id_grupa and g.index = \''.$user_login.'\' order by d.id');				
				}
				$i=1;
				$query = mysql_query('select * from t_mail_grupy where id = \''.$_POST['grupa_raport'].'\' and `index` = \''.$user_login.'\'');
				$result = mysql_fetch_array($query);
				if ($_POST['grupa_raport']=="all") {$grupa = "Wszyscy";} else {$grupa = $result['grupa'];}
				$subject="Raport mailingowy dla grupy \"".$grupa."\"";
				//$subject=iconv("UTF-8","ISO-8859-2", "Raport mailingowy dla grupy \"".$grupa."\"");
				//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?='; 
					$body .= '<table style="font-size: 12; font-family: Verdana"><tr><td><span style="font-weight: bold">L.p.</span></td><td width="10px"></td><td><span style="font-weight: bold">Email</span></td><td width="10px"></td><td><span style="font-weight: bold">Firma/Instytucja</span></td><td width="10px"></td><td></tr>';
					while ($r = mysql_fetch_array($q))
					{
						$body .= ' <tr><td>'.$i.'</td><td width="10px"></td><td>'.$r['email'].'</td><td width="10px"></td><td>'.$r['firma'].'</td><td width="10px"></td></tr>';
						$i++;
					}
					$body .= '</table>';
					//$body=iconv("UTF-8","ISO-8859-2", $body);
					$email = $_POST['raport'];
					$wiadomosc = new eMail('2','<Mailing Service Panel>','<Mailing Service Panel>');
					$wiadomosc->eMailContent($subject, $body);
					$wiadomosc->eMailSend($email);
					$smarty->assign('note',$email);
}

$kontakt= new sql();
$kontakt->set_table('mail_dane');
$kontakt->set('email',"");
$kontakt->set('nazwa',"");
$kontakt->set('firma',"");
$filter=" id='".$_GET['id']."' and `index` = '".$user_login."'";
$k_kontakt=$kontakt->load_db2($filter);

$grupy= new sql();
$grupy->set_table('mail_grupy');
$grupy->set('id',"");
$grupy->set('grupa',"");
$grupy->filter=" `index` = '".$user_login."'";
$wyswietl_grupy=$grupy->load_db_all();

$smarty->assign('k_kontakt',$k_kontakt);
$smarty->assign('kontakty',$wyswietl);
$smarty->assign('grupy',$wyswietl_grupy);
$smarty->assign('action',$_GET['action']);
$smarty->assign('warunek',$warunek);
$smarty->assign('filtr',$_POST['filtr']);
if ($_GET['s'])
{
$str = $_GET['s']-1;
}
else
{
$str = 0;
}
if (isset($_POST['filtr']))
{
$smarty->assign('filtr_grupy',$_POST['filtr']);
}
else
{
$smarty->assign('filtr_grupy',$_GET['grupa']);
}


$smarty->assign('str',$str);
$smarty->assign('sort',$_GET['sort']);
$smarty->assign('id_grupa',$_GET['grupa']);
$smarty -> assign('s',$s);
?>
