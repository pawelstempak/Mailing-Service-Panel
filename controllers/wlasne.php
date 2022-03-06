<?php
$form = $_POST['wyslij_wlasne'];
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$action = $_GET['action'];
$id = $_GET['id'];
if ($_GET['act']=="usun")
{
	mysql_query('delete from t_mail_wlasne where id=\''.$id.'\' and `index` = \''.$user_login.'\'');
}

if ($form)
{
	$wlasned= new sql();
	$wlasned->set_table('mail_wlasne');
	$wlasned->set('nazwa',$nazwa);
	$wlasned->set('opis',$opis);
	$wlasned->set('`index`',$user_login);
	$wlasned->insert_db();
}

if($action == "podpis")
{
$wlasne= new sql();
$wlasne->set_table('mail_wlasne');
$wlasne->set('id',"");
$wlasne->set('podpis',"");
$filter=" id='".$_GET['id']."' and `index` = '".$user_login."'";
$podpis=$wlasne->load_db2($filter);
}

if (isset($_POST['podpis_tresc']))
{
mysql_query('update t_mail_wlasne set podpis = \''.$_POST['podpis_tresc'].'\' where  id=\''.$_GET['id'].'\' and `index` = \''.$user_login.'\'');
/*$kontakty2= new sql();
$kontakty2->set_table('mail_wlasne');
$kontakty2->set('podpis',$_POST['podpis_tresc']);
$filter=" id='".$_GET['id']."' and `index` = '".$user_login."\'";
$kontakty2->update_db2($filter);	*/
}

$wlasne= new sql();
$wlasne->set_table('mail_wlasne');
$wlasne->set('id',"");
$wlasne->set('nazwa',"");
$wlasne->set('opis',"");
$wlasne->filter=" `index` = '".$user_login."'";
$wyswietl=$wlasne->load_db_all();
$smarty->assign('wlasne',$wyswietl);
$smarty->assign('podpis_dane',$podpis);
$smarty->assign('action',$action);
?>
