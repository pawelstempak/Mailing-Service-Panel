<?php
function email_g($id)
{
	$number = $id['number'];
	$query = mysql_query("
	
	SELECT m.grupa, m.id  
	FROM t_grupy g, t_mail_grupy m 
	WHERE g.id_grupa = m.id and g.index = '".$_SESSION['login']."' and g.id_mail = '".$number."'
	");
	while($r = mysql_fetch_array($query))
	{
		$wynik .= "<a href=\"{$DIR}?strona=6&location=".$r['id']."\" class=\"link\">".$r['grupa'].";";
	}
	return $wynik;
}
$smarty->registerPlugin("function","email_grupy","email_g");
?>