<?php
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

$form = $_POST['wyslij_grupe'];
$kopiuj_grupe = $_POST['dodaj_kontakt_do_grupy'];
$nazwa = $_POST['grupa'];
if ($_GET['action'] == "usun_grupe")
{
	mysql_query('delete from t_mail_grupy where id=\''.$_GET['id'].'\' and `index` = \''.$user_login.'\'');
	mysql_query('delete from t_grupy where id_grupa=\''.$_GET['id'].'\' and `index` = \''.$user_login.'\'');
}

if (isset($_POST['submit_usun']))
{
      for ($i=0;$i<count($_POST["email"]);$i++) {
        $id = $_POST["email"][$i];	
			mysql_query('delete from t_grupy where id_grupa=\''.$_GET['location'].'\' and id_mail=\''.$id.'\' and `index` = \''.$user_login.'\'');
		}
}

if (isset($_POST['dodaj_do_grupy']))
{
      for ($i=0;$i<count($_POST["email"]);$i++) {
        $id = $_POST['email'][$i];	
			mysql_query('insert into t_grupy values (NULL, \''.$id.'\', \''.$kopiuj_grupe.'\', \''.$user_login.'\')');
		}
}

if (isset($_POST['usun_wyszukane']))
{
	$lista = explode(";",$_POST['szukaj']);
      for ($i=0;$i<count($_POST["grupa_checkbox"]);$i++) {
        $id = $_POST['grupa_checkbox'][$i];
		  foreach($lista as $email)
		  {
		  $q = mysql_query("select * from t_mail_dane where `index` = '".$user_login."' and email LIKE '%".$email."%'");
		  $r = mysql_fetch_array($q);
		  $qq = mysql_query("select * from t_grupy where `index` = '".$user_login."' and id_mail = '".$r['id']."' and id_grupa = '".$id."'");
		  $rr = mysql_fetch_array($qq);	
		  mysql_query("delete from t_grupy where id_grupy = '".$rr['id_grupy']."'");
		  }	
		}
}

if ($form)
{
	$grupyd= new sql();
	$grupyd->set_table('mail_grupy');
	$grupyd->set('grupa',$nazwa);
	$grupyd->set('`index`',$user_login);
	$grupyd->insert_db();
}

	
	$kat_user= new sql();
	$res=$kat_user->query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_GET['location'].'\' and g.index = \''.$user_login.'\' order by '.$sort.' '.$t.'');
	$wyswietl=$kat_user->fetch_asc($res);
	$smarty->assign('kontakty',$wyswietl);
	
$nazwa_grupy= new sql();
$nazwa_grupy->set_table('mail_grupy');
$nazwa_grupy->set('grupa',"");
$filter=" id='".$_GET['location']."'";
$nazwa_g=$nazwa_grupy->load_db2($filter);	

$grupy= new sql();
$grupy->set_table('mail_grupy');
$grupy->set('id',"");
$grupy->set('grupa',"");
$grupy->filter=" `index` = '".$user_login."'";
$wyswietl=$grupy->load_db_all();
$smarty->assign('nazwa_g',$nazwa_g);
$smarty->assign('grupy',$wyswietl);
$smarty->assign('location',$_GET['location']);
$smarty->assign('sort',$_GET['sort']);
?>
