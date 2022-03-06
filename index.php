<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

include_once 'config/cfg.php';
include_once 'controllers/const.php';
include_once 'class/logowanie.php';
include_once 'class/sql.php';
include_once 'class/mail_class.php';
include_once 'class/class.phpmailer.php';
include_once 'functions/sessions_db.php';
include_once 'functions/save_image.php';
include_once 'functions/numeric.php';
include_once 'functions/primary.php';


//sprawdzanie czy przekazywane parametry kategoria i szczegoly sa liczbami
// jezeli tak to nie jest sprawdzany parametr strona
if(isset($_GET['h'])){
}
else
{
	if( ! (ivpi($_GET['kategoria']) || ivpi($_GET['szczegoly'])|| ivpi($_GET['szczegoly_o'])|| ivpi($_GET['szczegoly_z'])|| ivpi($_GET['szczegoly_az'])|| ivpi($_GET['szczegoly_ao'])) )
	{
		//sprawdzenie czy przekazywany parametr w strona= jest z przedzialu 1-20
		// jezeli nie to jest przekierowanie do strony glownej
		if(!ivpifr($_GET['strona'], 1, 42)){
				header('Location:'.DIR.'?strona='.GLOWNA.'');
		}
	}
}
ini_set('session.gc_maxlifetime',300);
ini_set('session.gc_probability',31);
ini_set('session.gc_divisor',100);
session_set_save_handler('_open', '_close', '_read', '_write', '_destroy', '_clean');
session_cache_limiter('nocache');
session_start();
require('smarty/libs/Smarty.class.php'); //dolaczamy plik z klasa
$smarty = new Smarty; //tworzymy nowy obiekt klasy Smarty   /*Przypisanie zmiennym szablonu ich warto&#194;&#182;ci*/
// katalog szablon&#55956;&#57034;
$smarty->template_dir = 'templates/';
// katalog na skompilowane szablony
$smarty->compile_dir = 'templates_c/';
// katalog na cache
$smarty->cache_dir = 'cache/';

//biblioteki systemowe

include_once 'functions/smarty_functions.php';

$h_rej=array();
$h_log=array();
$h_potw=array();
$h_zmiana=array();
	if(isset($_POST['login'])){
		$form['login']=$_POST['login'];
	}
	if(isset($_POST['email'])){
		$form['email']=$_POST['email'];
	}
	if(isset($_POST['haslo1'])){
		$form['haslo1']=$_POST['haslo1'];
	}
	if(isset($_POST['haslo2'])){
		$form['haslo2']=$_POST['haslo2'];
	}
	if(isset($_GET['strona'])){
		$strona=$_GET['strona'];
	}
// znacznik wedlug kt&#55942;&#56615;o b&#39217; wybierane tylko te rekordy w bazie kt&#55942;&#56544;maja ten znacznik

	$user= new auth();

	if($_GET['strona']==LOGOWANIE)
	{
		if(isset($_GET['nr'])){
				$nr=$_GET['nr'];//przekazanie nr strony poprzedniej w przypadku gdy uzytkownik nie jest zalogowany
		}

		$h_log=$user->user_login($form['login'],$form['haslo1']);
		if($h_log['stan']=='true'){
			if(isset($_GET['nr'])){
				//if($_GET['nr']==ZALOGOWANY){
					header('Location:'.DIR.'?strona='.$nr.'');
					//}else{
						//header('Location:'.DIR.'?strona='.GLOWNA.'');
					//}
				//}

			}
		}
		else
		{

			$main='logowanie.tpl';
		}
		$main='logowanie.tpl';
	}
	elseif($_GET['strona']==WYLOGUJ)
	{
		$_SESSION = array();
		$h_wyl=$user->user_logout();
		header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.NOWA_WIADOMOSC.'');
		//header('Location:'.DIR.'?strona=main');
	}

	$user_login = $_SESSION['login'];
	if($_GET['strona']==GLOWNA){
		//w przypadku logowania na stronie odznaczyc ponizszy kod
		/*if($_POST['submit_log_main']){
			$h_log_main=$user->user_login($form['login'],$form['haslo1']);
			if($h_log_main['stan']=='true'){
				header('Location:'.DIR.'?strona=main');
			}else{
				$main='main.tpl';
			}
		}*/
	header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.NOWA_WIADOMOSC.'');
	}
	elseif($_GET['strona']==NOWA_WIADOMOSC)
	{
		if($_SESSION['login']){
			$main='nowa_wiadomosc.tpl';
			include_once 'controllers/nowa_wiadomosc.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.NOWA_WIADOMOSC.'');
		}

	}
	elseif($_GET['strona']==HISTORIA)
	{
		if($_SESSION['login']){
			$main='historia.tpl';
			include_once 'controllers/historia.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.HISTORIA.'');
		}

	}
	elseif($_GET['strona']==KONTAKTY)
	{
		if($_SESSION['login']){
			$main='kontakty.tpl';
			include_once 'controllers/kontakty.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.KONTAKTY.'');
		}

	}
	elseif($_GET['strona']==GRUPY)
	{
		if($_SESSION['login']){
			$main='grupy.tpl';
			include_once 'controllers/grupy.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.GRUPY.'');
		}

	}
	elseif($_GET['strona']==WLASNE)
	{
		if($_SESSION['login']){
			$main='wlasne.tpl';
			include_once 'controllers/wlasne.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.WLASNE.'');
		}

	}
	elseif($_GET['strona']==IMPORT)
	{
		if($_SESSION['login']){
			$main='import.tpl';
			include_once 'controllers/import.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.IMPORT.'');
		}

	}

	elseif($_GET['strona']==POMOC)
	{
		if($_SESSION['login']){
			$main='pomoc.tpl';
			//include_once 'controllers/pomoc.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.POMOC.'');
		}

	}

	elseif($_GET['strona']==O_PROGRAMIE)
	{
		if($_SESSION['login']){
			$main='o_programie.tpl';
			include_once 'controllers/o_programie.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.O_PROGRAMIE.'');
		}

	}

	elseif($_GET['strona']==NOWA_WIADOMOSC1)
	{
		if($_SESSION['login']){
			$main='nowa_wiadomosc1.tpl';
			include_once 'controllers/nowa_wiadomosc1.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.NOWA_WIADOMOSC1.'');
		}

	}

	elseif($_GET['strona']==USTAWIENIA)
	{
		if($_SESSION['login']){
			$main='ustawienia.tpl';
			include_once 'controllers/ustawienia.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.USTAWIENIA.'');
		}

	}

	elseif($_GET['strona']==DRUKOWANIE)
	{
		if($_SESSION['login']){
			$main='drukowanie.tpl';
			include_once 'controllers/drukowanie.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.DRUKOWANIE.'');
		}

	}

	elseif($_GET['strona']==DRUKOWANIE1)
	{
		if($_SESSION['login']){
			$main='drukowanie1.tpl';
			include_once 'controllers/drukowanie1.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.DRUKOWANIE.'');
		}

	}

	elseif($_GET['strona']==BIULETYN)
	{
		if($_SESSION['login']){
			$main='biuletyn.tpl';
			include_once 'controllers/biuletyn.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.BIULETYN.'');
		}

	}

	elseif($_GET['strona']==BIULETYN1)
	{
		if($_SESSION['login']){
			$main='biuletyn1.tpl';
			include_once 'controllers/biuletyn1.php';
		}else{
			$skad=$_GET['strona'];
			header('Location:'.DIR.'?strona='.LOGOWANIE.'&nr='.BIULETYN1.'');
		}

	}

	elseif($_GET['strona']==100)
	{
			$main='wypisz.tpl';
			include_once 'controllers/wypisz.php';
	}


		include_once 'controllers/menu.php';




        //print $h_rej['mysql'];
		$smarty->assign('GLOWNA', GLOWNA);
		$smarty->assign('LOGOWANIE', LOGOWANIE);
		$smarty->assign('LOGOWANIE_K', LOGOWANIE_K);
		$smarty->assign('NOWA_WIADOMOSC', NOWA_WIADOMOSC);
		$smarty->assign('WYLOGUJ', WYLOGUJ);
		$smarty->assign('KONTAKTY', KONTAKTY);
		$smarty->assign('GRUPY', GRUPY);
		$smarty->assign('WLASNE', WLASNE);
		$smarty->assign('HISTORIA', HISTORIA);
		$smarty->assign('IMPORT', IMPORT);
		$smarty->assign('POMOC', POMOC);
		$smarty->assign('O_PROGRAMIE', O_PROGRAMIE);
		$smarty->assign('NOWA_WIADOMOSC1', NOWA_WIADOMOSC1);
		$smarty->assign('USTAWIENIA', USTAWIENIA);
		$smarty->assign('DRUKOWANIE', DRUKOWANIE);
		$smarty->assign('DRUKOWANIE1', DRUKOWANIE1);
		$smarty->assign('BIULETYN', BIULETYN);
		$smarty->assign('BIULETYN1', BIULETYN1);
		$smarty->assign('DIR', DIR);
		$smarty->assign('title', 'Mailing Service');
		$smarty->assign('page_name', 'index.php');
		$smarty->assign('lang', 'pl');
		$smarty->assign('main', $main);//jaki element czesci glownej strony ma byc wyswietlony
		$smarty->assign('strona',$strona);//numer wyswietlanej strony
		$smarty->assign('uid',$uid);//id zalogowanego uzytkownika
		$smarty->assign('id', $id);//wartosci pobrane z pol formularzy
		$smarty->assign('idd',$_GET['id']);
		$smarty->assign('nr', $nr);//wartosci pobrane z pol formularzy
		$smarty->assign('form', $form);//wartosci pobrane z pol formularzy
		$smarty->assign('checked_biul', $checked_biul);//czy chce otrzymywac biuletyny
		$smarty->assign('checked_news', $checked_news);//czy chce otrzymywac news
		$smarty->assign('checked_reg', $checked_reg);//czy zatwierdzil regulamin
		$smarty->assign('ver', $ver);
		$smarty->assign('build', $build);
		$smarty->assign('kto_zalogowany',$_SESSION['login']);//login zarejestrowanego
		$smarty->assign('copy','Wszelkie prawa zastrze&#380;one');
		$smarty->display('index.tpl'); //Wywo3ujemy szablon do kompilacji
?>