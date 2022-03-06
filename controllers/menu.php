<?php
if (!$_SESSION['language']) 
{
  /*if (!isset($ip_name))
  {
     switch ($COUNTRY)
     {
        case 'NOR' : $_SESSION['language'] = 'no';
        break;
        case 'GBR' : $_SESSION['language'] = 'en';
        break;
        case 'POL' : $_SESSION['language'] = 'pl';
        break;
     }
  }*/
  $_SESSION['language'] = 'pl';
}
function word($name='')
{
$menu1= new sql();
$menu1->set_table('lang');
$menu1->set($_SESSION['language'],"");
$filter=" nazwa='".$name."'";
$menu1_jezyk=$menu1->load_db2($filter);
return $menu1_jezyk[$_SESSION['language']];
}

switch ($_GET['strona'])
{
	//ogolne
	case GLOWNA :
			$menu[0]=word('gmenu1');
			$menu[1]=word('gmenu2');
			$menu[2]=word('gmenu3');
			$menu[3]=word('gmenu4');
			$menu[4]=word('gmenu5');
			$menu[5]=word('gmenu6');
	break;
	case WYLOGUJ :
			$menu[0]=word('gmenu1');
			$menu[1]=word('gmenu2');
			$menu[2]=word('gmenu3');
			$menu[3]=word('gmenu4');
			$menu[4]=word('gmenu5');
			$menu[5]=word('gmenu6');
	break;
	// kandydat
	case KANDYDAT :
			$menu[0]=word('kmenu_kogo_poszukujemy');
			$menu[1]=word('kmenu_rejestracja');
			$menu[2]=word('kmenu_moj_profil');
			//$menu[3]=word('kmenu_faq');
			$page_number[0]=KANDYDAT;
			$page_number[1]=REJESTRACJA_KANDYDAT;
			$page_number[2]=PROFIL_KANDYDAT;
			//$page_number[3]=FAQK;
	break;
	case FAQK :
			$menu[0]=word('kmenu_kogo_poszukujemy');
			$menu[1]=word('kmenu_rejestracja');
			$menu[2]=word('kmenu_moj_profil');
			//$menu[3]=word('kmenu_faq');
			$page_number[0]=KANDYDAT;
			$page_number[1]=REJESTRACJA_KANDYDAT;
			$page_number[2]=PROFIL_KANDYDAT;
			//$page_number[3]=FAQK;
	break;
	case REJESTRACJA_KANDYDAT :
			$menu[0]=word('kmenu_kogo_poszukujemy');
			$menu[1]=word('kmenu_rejestracja');
			$menu[2]=word('kmenu_moj_profil');
			//$menu[3]=word('kmenu_faq');
			$page_number[0]=KANDYDAT;
			$page_number[1]=REJESTRACJA_KANDYDAT;
			$page_number[2]=PROFIL_KANDYDAT;
			//$page_number[3]=FAQK;
	break;
	case PROFIL_KANDYDAT :
			$menu[0]=word('kmenu_kogo_poszukujemy');
			$menu[1]=word('kmenu_rejestracja');
			$menu[2]=word('kmenu_moj_profil');
			//$menu[3]=word('kmenu_faq');
			$page_number[0]=KANDYDAT;
			$page_number[1]=REJESTRACJA_KANDYDAT;
			$page_number[2]=PROFIL_KANDYDAT;
			//$page_number[3]=FAQK;
	break;
	case LOGOWANIE_K :
			$menu[0]=word('kmenu_kogo_poszukujemy');
			$menu[1]=word('kmenu_rejestracja');
			$menu[2]=word('kmenu_moj_profil');
			//$menu[3]=word('kmenu_faq');
			$page_number[0]=KANDYDAT;
			$page_number[1]=REJESTRACJA_KANDYDAT;
			$page_number[2]=PROFIL_KANDYDAT;
			//$page_number[3]=FAQK;
	break;
	//pracodawca
	case PRACODAWCA :
			$menu[0]=word('pmenu_wspolpraca');
			$menu[1]=word('pmenu_rejestracja');
			$menu[2]=word('pmenu_znajdz');
			$menu[3]=word('pmenu_moj_profil');
			//$menu[4]=word('pmenu_faq');
			$page_number[0]=PRACODAWCA;
			$page_number[1]=REJESTRACJA_PRACODAWCA;
			$page_number[2]=PROFIL_ZNAJDZ;
			$page_number[3]=PROFIL_PRACODAWCA;
			//$page_number[4]=FAQP;
	break;
	case FAQP :
			$menu[0]=word('pmenu_wspolpraca');
			$menu[1]=word('pmenu_rejestracja');
			$menu[2]=word('pmenu_znajdz');
			$menu[3]=word('pmenu_moj_profil');
			//$menu[4]=word('pmenu_faq');
			$page_number[0]=PRACODAWCA;
			$page_number[1]=REJESTRACJA_PRACODAWCA;
			$page_number[2]=PROFIL_ZNAJDZ;
			$page_number[3]=PROFIL_PRACODAWCA;
			//$page_number[4]=FAQP;
	break;
	case REJESTRACJA_PRACODAWCA :
			$menu[0]=word('pmenu_wspolpraca');
			$menu[1]=word('pmenu_rejestracja');
			$menu[2]=word('pmenu_znajdz');
			$menu[3]=word('pmenu_moj_profil');
			//$menu[4]=word('pmenu_faq');
			$page_number[0]=PRACODAWCA;
			$page_number[1]=REJESTRACJA_PRACODAWCA;
			$page_number[2]=PROFIL_ZNAJDZ;
			$page_number[3]=PROFIL_PRACODAWCA;
			//$page_number[4]=FAQP;
	break;
	case PROFIL_PRACODAWCA :
			$menu[0]=word('pmenu_wspolpraca');
			$menu[1]=word('pmenu_rejestracja');
			$menu[2]=word('pmenu_znajdz');
			$menu[3]=word('pmenu_moj_profil');
			//$menu[4]=word('pmenu_faq');
			$page_number[0]=PRACODAWCA;
			$page_number[1]=REJESTRACJA_PRACODAWCA;
			$page_number[2]=PROFIL_ZNAJDZ;
			$page_number[3]=PROFIL_PRACODAWCA;
			//$page_number[4]=FAQP;
	break;
	case LOGOWANIE_P :
			$menu[0]=word('pmenu_wspolpraca');
			$menu[1]=word('pmenu_rejestracja');
			$menu[2]=word('pmenu_znajdz');
			$menu[3]=word('pmenu_moj_profil');
			//$menu[4]=word('pmenu_faq');
			$page_number[0]=PRACODAWCA;
			$page_number[1]=REJESTRACJA_PRACODAWCA;
			$page_number[2]=PROFIL_ZNAJDZ;
			$page_number[3]=PROFIL_PRACODAWCA;
			//$page_number[4]=FAQP;
	break;
	// dalesze menu
	case USLUGI :
			$menu[0]=word('gmenu4');;
	break;
	case  ONAS :
			$menu[0]=word('dane_kim_jestesmy');
			$menu[1]=word('dane_nasz_cel');
			$menu[2]=word('dane_kontakt');
			$page_number[0]=ONAS;
			$page_number[1]=CEL;
			$page_number[2]=KONTAKT;
	break;
	case  CEL :
			$menu[0]=word('dane_kim_jestesmy');
			$menu[1]=word('dane_nasz_cel');
			$menu[2]=word('dane_kontakt');
			$page_number[0]=ONAS;
			$page_number[1]=CEL;
			$page_number[2]=KONTAKT;
	break;
	case  KONTAKT :
			$menu[0]=word('dane_kim_jestesmy');
			$menu[1]=word('dane_nasz_cel');
			$menu[2]=word('dane_kontakt');
			$page_number[0]=ONAS;
			$page_number[1]=CEL;
			$page_number[2]=KONTAKT;
	break;
	case REKRUTACJA :
			$menu[0]=word('gmenu6');
			$page_number[0]=REKRUTACJA;
	break;
	case PARTNERZY :
			$menu[0]=word('gmenu7');
			$page_number[]=PARTNERZY;
	break;
	default :
	break;
}

/*$id_k=$_GET['kategoria'];
$kat= new sql();
$kat->set_table('kategoria');
$kat->set('name',"");
$kat->set('id',"");

$kat->filter=' id_kategorii_nad=0';
$dane_kat_all=$kat->load_db_all();

//Pobieranie liczby uzytkownikow w danej katagorii
foreach($dane_kat_all as $k=>$nr_k){
	$u_k= new sql();
	$rezult=$u_k->query("select *from ".$cfg['db_prefix']."user_kategoria uk,".$cfg['db_prefix']."profil p where uk.id_user=p.id_user and uk.id_kategoria=".$nr_k['id']." and p.czy_publiczny=1 ");
	$uzytkownikow[]=$u_k->rows($rezult);
}

// Pobieranie liczby zarejestrowanych uzytkownikow
$u= new sql();
$rezult=$u->query("select *from ".$cfg['db_prefix']."user where czy_zatwierdz=1 ");
$zarejestrowanych=$u->rows($rezult);

//Pobieranie liczby profili uzytkownikow
$u_p= new sql();
$rezult=$u_p->query("select *from ".$cfg['db_prefix']."profil where czy_publiczny=1 ");
$profili=$u_p->rows($rezult);

// Pobieranie liczby  uzytkownikow online
$u_l= new sql();
$rezult_l=$u_l->query("select *from ".$cfg['db_prefix']."sesja where data!='' ");
$zalogowanych=$u_l->rows($rezult_l);

// Pobieranie liczby  gosci online
$u_g= new sql();
$rezult_g=$u_g->query("select *from ".$cfg['db_prefix']."sesja where data='' ");
$gosci=$u_g->rows($rezult_g);

// Pobieranie liczby  zleconych zadan
$zl_z= new sql();
$rezult_zl=$zl_z->query("select id from ".$cfg['db_prefix']."zlecenie ");
$zleconych=$zl_z->rows($rezult_zl);

// Pobieranie liczby  wykonanych zadan
$wy_z= new sql();
$rezult_wy=$wy_z->query("select * from ".$cfg['db_prefix']."user_zlecenie_odbiorca where czy_wykonane=1 ");
$wykonanych=$wy_z->rows($rezult_wy);

//Pobieranie uid zalogowanego uzytkownika 
$user_id= new sql();
$user_id->set_table('user');
$user_id->set('id',"");
$filter=" login='".$_SESSION['login']."'";
$uid=$user_id->load_db2($filter);*/

//$smarty->assign('uid',$uid);//uid zalogowanego uzytkownika  przekazywany do profil szczegoly w celu okreslenia czy 
							//dany uzytkownik probuje zlecic sobie zadanie na podstawie porownania id odbiorcy
							//i id zalogowanego nastepuje przekierowanie na strone glowna
$smarty->assign('wykonanych',$wykonanych);//ile wykonanych zadan
$smarty->assign('zleconych',$zleconych);//ile zleconych zadan
$smarty->assign('zarejestrowanych',$zarejestrowanych);//ilu zarejestrowanych
$smarty->assign('profili',$profili);//ile profili
$smarty->assign('zalogowanych',$zalogowanych);//ilu zalogowanych
$smarty->assign('gosci',$gosci);//ile gosci na stronie
$smarty->assign('dane_kat_all',$dane_kat_all);//dane na strone glowna  kategorie
$smarty->assign('menu',$menu);//WYSWIETLANIE NAZW MENU
$smarty->assign('page_number',$page_number);//WYSWIETLANIE NUMEROW MENU DO LINKOW
$smarty->assign('page',$_GET['strona']);//WYSWIETLANIE aktualnej strony
$smarty->assign('id_k',$id_k);//dane na strone glowna ktora kategoria zostala wybrana
?>
