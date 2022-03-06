<?php

	$kat_user= new sql();
	if ($_GET['grupa']=="all")
	{
	$res=$kat_user->query('select * from t_mail_dane where `index` = \''.$user_login.'\' order by id DESC');
	}
	else
	{
	$res=$kat_user->query('select * from t_mail_dane d, t_grupy g where d.id = g.id_mail and g.id_grupa = \''.$_GET['grupa'].'\' and g.index = \''.$user_login.'\' order by d.id DESC');
	}
	$wyswietl=$kat_user->fetch_asc($res);
	$smarty->assign('kontakty',$wyswietl);
?>
