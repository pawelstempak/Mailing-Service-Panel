<?php
$grupy= new sql();
$grupy->set_table('mail_grupy');
$grupy->set('id',"");
$grupy->set('grupa',"");
$grupy->filter=" `index` = '".$user_login."'";
$wyswietl=$grupy->load_db_all();
$smarty->assign('grupy',$wyswietl);
include('functions/import.php');
if (isset($_POST['dodaj']))
{
	$con='file';
	$file='import';
	$plik = createFile($file,$con);
	//$dodano = "Plik o nazwie ".$plik." zosta³ dodany.";
	switch ($_POST['typ'])
	{
	case 'outlook_express' :
	$dodano = import_csv_from_outlook_express($plik,$_POST['grupa']);
	break;
	case 'thunderbird' :
	$dodano = import_csv_from_thunderbird($plik,$_POST['grupa']);
	break;
	case 'thebat' :
	$dodano = import_csv_from_thebat($plik,$_POST['grupa']);
	break;
	case 'excel' :
	$dodano = import_csv_from_excel($plik,$_POST['grupa']);
	break;
	}
	$smarty -> assign('dodano',$dodano);
}
?>
