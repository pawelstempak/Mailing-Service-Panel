<?php
function login_from_id()
{
	$user2= new sql();
	$user2->set_table('user');
	$user2->set('login',"");
	$filter=" id='".$_GET['login']."'";
	$dane_i=$user2->load_db2($filter);
	return $dane_i['login'];
}


if ($_POST['zmien']=="aktualizuj")
{
$grupy= new sql();
$grupy->set_table('user');
if(!isset($_POST['user']))
{
$grupy->set('login',$_POST['login']);
}
$grupy->set('imie',$_POST['imie']);
$grupy->set('nazwisko',$_POST['nazwisko']);
$grupy->set('email',$_POST['email']);
$grupy->set('haslo',$_POST['haslo']);
$filter=" login='".$_POST['user']."'";
$grupy->update_db2($filter);	
}

if (isset($_POST['dodaj']))
{
$grupy= new sql();
$grupy->set_table('user');
$grupy->set('login',$_POST['login']);
$grupy->set('imie',$_POST['imie']);
$grupy->set('nazwisko',$_POST['nazwisko']);
$grupy->set('email',$_POST['email']);
$grupy->set('haslo',$_POST['haslo']);
$grupy->insert_db();	
}
if ($_GET['action']=="delete")
{
mysql_query('delete from t_user where id = \''.$_GET['login'].'\'');
}
//wczytanie listy uzytkownikow do listy rozwijanej
if ($_SESSION['login']=="admin")
{
$grupy= new sql();
$grupy->set_table('user');
$grupy->set('id',"");
$grupy->set('login',"");
$grupy->set('imie',"");
$grupy->set('nazwisko',"");
$grupy->set('email',"");
$grupy->set('haslo',"");
$grupy->filter=" id>'0'";
$wyswietl=$grupy->load_db_all();
}
else
{
$grupy= new sql();
$grupy->set_table('user');
$grupy->set('id',"");
$grupy->set('login',"");
$grupy->set('imie',"");
$grupy->set('nazwisko',"");
$grupy->set('email',"");
$grupy->set('haslo',"");
$filter=" login='".$_POST['user']."'";	
$wyswietl=$grupy->load_db2($filter);
}


$grupy1= new sql();
$grupy1->set_table('user');
$grupy1->set('id',"");
$grupy1->set('login',"");
$grupy1->set('imie',"");
$grupy1->set('nazwisko',"");
$grupy1->set('email',"");
$grupy1->set('haslo',"");
if(isset($_POST['user']))
{
$filter=" login='".$_POST['user']."'";
}
else
{
$filter=" login='".$_SESSION['login']."'";
}
$wartosci=$grupy1->load_db2($filter);

$smarty->assign('users',$wyswietl);
$smarty->assign('wartosci',$wartosci);
$smarty->assign('action',$_GET['action']);
$smarty->assign('login_from_id',login_from_id());
$smarty->assign('login_user',$_GET['login']);
?>
