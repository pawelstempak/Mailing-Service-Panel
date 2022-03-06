<?php
	
	$kat_user= new sql();
	if ($_GET['grupa']=="all")
	{
	$res=$kat_user->query('select * from t_historia where `index` = \''.$user_login.'\' order by id DESC');
	}
	else
	{
	$res=$kat_user->query('select * from t_historia where grupa = \''.$_GET['grupa'].'\' and `index` = \''.$user_login.'\' order by data DESC');
	}
	$wyswietl=$kat_user->fetch_asc($res);
	$smarty->assign('grupy',$wyswietl);
?>
