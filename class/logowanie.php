<?php
 //$PATH = '/home/site/15781/www/work/';
 $hidden_hash_var='^#Witamy w serwisie telepraca.net#^';
 $LOGGED_IN=false;
 $feedback=array();
 unset($LOGGED_IN);
class auth{

	//protected $Zap;
	function __construct()
	{
		//global $hidden_hash_var,$LOGGED_IN;
		$this->Sqlobject=new sql();

	}
	function user_isloggedin() {
		global $login,$id_hash,$hidden_hash_var,$LOGGED_IN;

		//have we already run the hash checks?
		//If so, return the pre-set var
		if (isset($LOGGED_IN)) {
			return $LOGGED_IN;
		}
		if ($login && $id_hash) {
			$hash=sha1($login.$hidden_hash_var);
			if ($hash == $id_hash) {
				$LOGGED_IN=true;
				return true;
			} else {
				$LOGGED_IN=false;
				return false;
			}
		} else {
			$LOGGED_IN=false;
			return false;
		}
	}

	//metoda do autoryzacji
	function user_login($login,$haslo) {
		global $feedback;

		if (!$login || !$haslo) {
			$feedback['blad_logow_login']=  ' B&#322&#261d - B&#322&#281dny login lub has&#322o ';
			return $feedback;

		} else {
			$login=strtolower($login);
			$haslo=strtolower($haslo);
			$sql="SELECT * FROM t_user WHERE login='$login' AND haslo='".$haslo."'";
			$num=$this->Sqlobject->number_rows($sql);

			$result=$this->Sqlobject->query($sql);
			$data=$this->Sqlobject->fetch($result);
			if (!$result || $num < 1){
				$feedback ['blad_logow_baza']=  ' B&#322&#261d - U&#380ytkownik nie zosta&#322 znaleziony lub nieprawid&#322owe has&#322o ';
				return $feedback;
			} else {
					$this->user_set_tokens($login);
					//' Sukces - jeste&#65533; zalogowany '
					$feedback ['stan']='true';
					return $feedback;
			}
		}
	}

	//metoda do autoryzacji
	function user_login_p($login,$haslo) {
		global $feedback;

		if (!$login || !$haslo) {
			$feedback['blad_logow_login']=  ' B&#322&#261d - B&#322&#281dny login lub has&#322o ';
			return $feedback;

		} else {
			$login=strtolower($login);
			$haslo=strtolower($haslo);
			$sql="SELECT * FROM t_userp WHERE login='$login' AND haslo='". sha1($haslo) ."'";
			$num=$this->Sqlobject->number_rows($sql);

			$result=$this->Sqlobject->query($sql);
			$data=$this->Sqlobject->fetch($result);
			if (!$result || $num < 1){
				$feedback ['blad_logow_baza']=  ' B&#322&#261d - U&#380ytkownik nie zosta&#322 znaleziony lub nieprawid&#322owe has&#322o ';
				return $feedback;
			} else {

				if ($data['czy_zatwierdz'] == '1') {
					$this->user_set_tokens($login);
					//' Sukces - jeste&#65533; zalogowany '
					$feedback ['stan']='true';
					return $feedback;

				} else {
					$feedback['nie_zatwierdz']=  ' B&#322&#261d - Twoje konto nie zosta&#322o jeszcze zatwierdzone ';
					return $feedback;
				}
			}
		}
	}

	function user_logout() {

		setcookie('login','',(time()+2592000),'/','',0);
		setcookie('id_hash','',(time()+2592000),'/','',0);
		session_destroy();
	}

	function user_set_tokens($user_name_in) {
		global $hidden_hash_var,$login,$id_hash;
		if (!$user_name_in) {
			$feedback .=  ' ERROR - User Name Missing When Setting Tokens ';
			return false;
		}
		$login=strtolower($user_name_in);
		$id_hash= sha1($login.$hidden_hash_var);
		//Rejestracja sesji
		if(!session_is_registered('login'))
		{
			session_register('login');
		}
		if(!session_is_registered('id_hash'))
		{
			session_register('id_hash');
		}
		$_SESSION['login']= $login;
		$_SESSION['id_hash']= $id_hash;
		//setcookie('login',$login,(time()+2592000),'/','',0);
		//setcookie('id_hash',$id_hash,(time()+2592000),'/','',0);

	}

	function user_confirm($hash,$email) {
		/*
			funkja zatwierdzajaca zapisanie sie do serwisu
			poprzez aktywacje linka wyslanego mailem
		*/

		global $feedback,$hidden_hash_var;

		//weryfikacja emaila
		$new_hash=sha1($email.$hidden_hash_var);
		if ($new_hash && ($new_hash==$hash)) {
			//find this record in the db

			$sql="SELECT * FROM t_user WHERE zatwierdz_hash='$hash'";
			$num=$this->Sqlobject->number_rows($sql);
			$result=$this->Sqlobject->query($sql);
			$data=$this->Sqlobject->fetch($result);
			if (!$result || $num < 1) {
				$feedback['hash_niema']= ' B&#322;&#261;d - Hash nie zosta&#322; znaleziony !';
				return $feedback;
			} else {
				$dni=7;//liczba dni waznosci wyslanego maila
				$date_now=date('Y-m-d H');
				$data_rej=strtotime($data['date_rej']);
				$date_rej_y=date('Y',$data_rej);
				$date_rej_m=date('m',$data_rej);
				$date_rej_d=date('d',$data_rej);
				$date_rej_h=date('h',$data_rej);
				$date_7dni=date('Y-m-d h',mktime($date_rej_h,0,0,$date_rej_m  ,$date_rej_d+$dni,$date_rej_y));
				$czas_7dni=mktime($date_rej_h,0,0,$date_rej_m  ,$date_rej_d+$dni,$date_rej_y);
				$czas_now=mktime(date('h'),0,0,date('m')  ,date('d'),date('y'));
				if($czas_now>$czas_7dni){
					$feedback['email_niewazny']='Ponownie sie zarejestruj gdy&#380; Twoje konto straci&#322;o wa&#380;no&#347;&#263;';
					return $feedback;
				}else{
					//potwierdzenie emaila i aktywacja konta
					$feedback ['konto_aktywne']= ' Twoje konto jest aktywne - mo&#380;esz si&#281; ju&#380; logowa&#263; ';
					//$this->user_set_tokens(mysql_result($result,0,'login'));//odznaczone umozliwia zalogowanie bezposrednio po aktywacji linka rejestracyjnego
					$this->Sqlobject->set_table('user');
					$this->Sqlobject->set('email',$email);
					$this->Sqlobject->set('czy_zatwierdz',1);
					$filter=" zatwierdz_hash='$hash'";
					$this->Sqlobject->update_db2($filter);
					$feedback['stan_zatwierdz']='true';
					return $feedback;
				}
			}
		} else {
			$feedback['hash_blad']= ' B&#322;edny hash konto nie zosta&#322;o zaktywowane !';
			return $feedback;
		}
	}

	function user_confirm_p($hash,$email) {
		/*
			funkja zatwierdzajaca zapisanie sie do serwisu
			poprzez aktywacje linka wyslanego mailem
		*/

		global $feedback,$hidden_hash_var;

		//weryfikacja emaila
		$new_hash=sha1($email.$hidden_hash_var);
		if ($new_hash && ($new_hash==$hash)) {
			//find this record in the db

			$sql="SELECT * FROM t_userp WHERE zatwierdz_hash='$hash'";
			$num=$this->Sqlobject->number_rows($sql);
			$result=$this->Sqlobject->query($sql);
			$data=$this->Sqlobject->fetch($result);
			if (!$result || $num < 1) {
				$feedback['hash_niema']= ' B&#322;&#261;d - Hash nie zosta&#322; znaleziony !';
				return $feedback;
			} else {
				$dni=7;//liczba dni waznosci wyslanego maila
				$date_now=date('Y-m-d H');
				$data_rej=strtotime($data['date_rej']);
				$date_rej_y=date('Y',$data_rej);
				$date_rej_m=date('m',$data_rej);
				$date_rej_d=date('d',$data_rej);
				$date_rej_h=date('h',$data_rej);
				$date_7dni=date('Y-m-d h',mktime($date_rej_h,0,0,$date_rej_m  ,$date_rej_d+$dni,$date_rej_y));
				$czas_7dni=mktime($date_rej_h,0,0,$date_rej_m  ,$date_rej_d+$dni,$date_rej_y);
				$czas_now=mktime(date('h'),0,0,date('m')  ,date('d'),date('y'));
				if($czas_now>$czas_7dni){
					$feedback['email_niewazny']='Ponownie sie zarejestruj gdy&#380; Twoje konto straci&#322;o wa&#380;no&#347;&#263;';
					return $feedback;
				}else{
					//potwierdzenie emaila i aktywacja konta
					$feedback ['konto_aktywne']= ' Twoje konto jest aktywne - mo&#380;esz si&#281; ju&#380; logowa&#263; ';
					//$this->user_set_tokens(mysql_result($result,0,'login'));//odznaczone umozliwia zalogowanie bezposrednio po aktywacji linka rejestracyjnego
					$this->Sqlobject->set_table('userp');
					$this->Sqlobject->set('email',$email);
					$this->Sqlobject->set('czy_zatwierdz',1);
					$filter=" zatwierdz_hash='$hash'";
					$this->Sqlobject->update_db2($filter);
					$feedback['stan_zatwierdz']='true';
					return $feedback;
				}
			}
		} else {
			$feedback['hash_blad']= ' B&#322;edny hash konto nie zosta&#322;o zaktywowane !';
			return $feedback;
		}
	}

	function user_change_password ($new_password1,$new_password2,$login,$old_password) {
		global $feedback;
		//new passwords present and match?
		if ($new_password1 && ($new_password1==$new_password2)) {
			//is this password long enough?
			if ($this->account_pwvalid($new_password1)) {
				//all vars are present?
				if ($login && $old_password) {
					//lower case everything
					$login =strtolower($login );
					$old_password=strtolower($old_password);
					$new_password1=strtolower($new_password1);
					//sprawdzanie czy poprawny login i stare haslo ?
					$sql="SELECT * FROM t_user WHERE login ='$login ' AND haslo='". sha1($old_password) ."'";
					$num=$this->Sqlobject->number_rows($sql);
					$result=$this->Sqlobject->query($sql);

					if (!$result || $num < 1) {
						$feedback['login_stare_haslo']= ' Login nie zosta&#322; znaleziony lub z&#322;e stare has&#322;o '.mysql_error();
						return $feedback;
					} else {

						//Podmienianie hasla starego na nowe w bazie danych
						$this->Sqlobject->set_table('user');
						$this->Sqlobject->set('haslo',sha1($new_password1));
						$this->Sqlobject->set('login',$login);
						$filter=" login='$login' AND haslo='". sha1($old_password). "'";
						$result=$this->Sqlobject->update_db2($filter);

						if (!$result) {
							$feedback['blad_zmiany']= ' Has&#65533;o nie zosta&#65533;o zmienione '.mysql_error();

							return $feedback;
						} else {
							$feedback['stan_podmiana']= 'true';

							return $feedback;
						}

					}
				} else {
					$feedback['popraw_haslo_login']= ' Niewlasciwy login lub stare haslo ';
					return $feedback;
				}
			} else {
				$feedback['nowe_haslo']= ' Nowe has&#65533;o nie spe&#65533;nia kryteri&#65533;w ';
				return $feedback;
			}
		} else {
			$feedback['p_nowe_haslo']= ' Nie wype&#322;ni&#322;e&#347; pola ';
			return $feedback;
		}
	}

	function user_change_password_p ($new_password1,$new_password2,$login,$old_password) {
		global $feedback;
		//new passwords present and match?
		if ($new_password1 && ($new_password1==$new_password2)) {
			//is this password long enough?
			if ($this->account_pwvalid($new_password1)) {
				//all vars are present?
				if ($login && $old_password) {
					//lower case everything
					$login =strtolower($login );
					$old_password=strtolower($old_password);
					$new_password1=strtolower($new_password1);
					//sprawdzanie czy poprawny login i stare haslo ?
					$sql="SELECT * FROM t_userp WHERE login ='$login ' AND haslo='". sha1($old_password) ."'";
					$num=$this->Sqlobject->number_rows($sql);
					$result=$this->Sqlobject->query($sql);

					if (!$result || $num < 1) {
						$feedback['login_stare_haslo']= ' Login nie zosta&#322; znaleziony lub z&#322;e stare has&#322;o '.mysql_error();
						return $feedback;
					} else {

						//Podmienianie hasla starego na nowe w bazie danych
						$this->Sqlobject->set_table('userp');
						$this->Sqlobject->set('haslo',sha1($new_password1));
						$this->Sqlobject->set('login',$login);
						$filter=" login='$login' AND haslo='". sha1($old_password). "'";
						$result=$this->Sqlobject->update_db2($filter);

						if (!$result) {
							$feedback['blad_zmiany']= ' Has&#65533;o nie zosta&#65533;o zmienione '.mysql_error();

							return $feedback;
						} else {
							$feedback['stan_podmiana']= 'true';

							return $feedback;
						}

					}
				} else {
					$feedback['popraw_haslo_login']= ' Niewlasciwy login lub stare haslo ';
					return $feedback;
				}
			} else {
				$feedback['nowe_haslo']= ' Nowe has&#65533;o nie spe&#65533;nia kryteri&#65533;w ';
				return $feedback;
			}
		} else {
			$feedback['p_nowe_haslo']= ' Nie wype&#322;ni&#322;e&#347; pola ';
			return $feedback;
		}
	}

	function user_lost_password ($email,$login) {
		global $feedback,$hidden_hash_var;

		if ($email && $login) {
			$login=strtolower($login);
			//sprawdzanie czy poprawny login i poprawny email ?
				$sql="SELECT * FROM t_user WHERE login='$login' AND email='$email'";
				$num=$this->Sqlobject->number_rows($sql);
				$result=$this->Sqlobject->query($sql);
			if (!$result || $num < 1) {
				//zly login lub email
				$feedback['zly_login_email']= ' B&#322;&#261;d - Nieprawid&#322;owy login lub email ';
				return $feedback;
			} else {
				//create a secure, new password
				$nowe_haslo=strtolower(substr(sha1(time().$login.$hidden_hash_var),1,14));
				//Podmienianie hasla starego na nowe w bazie danych
				$this->Sqlobject->set_table('user');
				$this->Sqlobject->set('haslo',sha1($nowe_haslo));
				$this->Sqlobject->set('login',$login);
				$filter=" login='$login'";
				$this->Sqlobject->update_db2($filter);

				//Wysyla prostego maila z nowym haslem
				$this->user_send_new_haslo($email,$nowe_haslo);
				$feedback['zmiana_hasla_ok']= ' Twoje nowe has&#322;o zosta&#65533;o wys&#322;ane mailem';
				$feedback['stan_zmiana']='true';
				return $feedback;
			}
		} else {
			$feedback['login_email']= ' B&#322;&#261;d - brak loginu lub email-a';
			return $feedback;
		}
	}

	function user_lost_password_p ($email,$login) {
		global $feedback,$hidden_hash_var;

		if ($email && $login) {
			$login=strtolower($login);
			//sprawdzanie czy poprawny login i poprawny email ?
				$sql="SELECT * FROM t_userp WHERE login='$login' AND email='$email'";
				$num=$this->Sqlobject->number_rows($sql);
				$result=$this->Sqlobject->query($sql);
			if (!$result || $num < 1) {
				//zly login lub email
				$feedback['zly_login_email']= ' B&#322;&#261;d - Nieprawid&#322;owy login lub email ';
				return $feedback;
			} else {
				//create a secure, new password
				$nowe_haslo=strtolower(substr(sha1(time().$login.$hidden_hash_var),1,14));
				//Podmienianie hasla starego na nowe w bazie danych
				$this->Sqlobject->set_table('userp');
				$this->Sqlobject->set('haslo',sha1($nowe_haslo));
				$this->Sqlobject->set('login',$login);
				$filter=" login='$login'";
				$this->Sqlobject->update_db2($filter);

				//Wysyla prostego maila z nowym haslem
				$this->user_send_new_haslo($email,$nowe_haslo);
				$feedback['zmiana_hasla_ok']= ' Twoje nowe has&#322;o zosta&#65533;o wys&#322;ane mailem';
				$feedback['stan_zmiana']='true';
				return $feedback;
			}
		} else {
			$feedback['login_email']= ' B&#322;&#261;d - brak loginu lub email-a';
			return $feedback;
		}
	}

	function user_change_email ($password1,$new_email,$user_name) {
		global $feedback,$hidden_hash_var;
		if ($this->validate_email($new_email)) {
			$hash=sha1($new_email.$hidden_hash_var);
			//change the confirm hash in the db but not the email -
			//send out a new confirm email with a new hash
			$user_name=strtolower($user_name);
			$password1=strtolower($password1);
			$sql="UPDATE t_user SET confirm_hash='$hash' WHERE user_name='$user_name' AND password='". sha1($password1) ."'";
			$result=mysql_query($sql);
			if (!$result || mysql_affected_rows($result) < 1) {
				$feedback .= ' ERROR - Incorrect User Name Or Password ';
				return false;
			} else {
				$feedback .= ' Confirmation Sent ';
				$this->user_send_confirm_email($new_email,$hash);
				return true;
			}
		} else {
			$feedback .= ' New Email Address Appears Invalid ';
			return false;
		}
	}

	function user_send_confirm_email($email,$hash,$l,$p) {
		global $email_admin;
		/*
			wysylanie meila z hash zatwierdzajacym konto
		*/
		$subject="PolskfagService zatwierdzenie konta";
		$message="Dzi&#65533;kujemy za rejestracj&#65533; w serwisie PolskfagService ";
		$message.="\nTwoj login do serwisu to: ".$l." i  has&#65533;o to: ".$p;
		$message.="\nW tej chwili twoje konto jest nie aktywne. W celu aktywacji za&#65533;o&#65533;onego profilu, naci&#65533;nij poni&#65533;szy link: ";		$message.="\n\n http://polskfagservice.no/work/index.php?h=$hash&e=". urlencode($email);
		$message.="\n\n --";
		$message.="\nPozdrawiamy,";
		$message.="\nZesp&#65533; Polskfag Service";
		//$subject=iconv("UTF-8","ISO-8859-2", $subject);
		//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?=';
		$headers .= "From: ".$email_admin."\n";
		//$message = nl2br ($message);
		//$message = stripslashes ($message);
		if(mail($email, $subject, $message, $headers)){
			return  true;
		}else{
			$feedback['wys_mail']='B&#322;ad w wys&#322;aniu meila';
			return false;
		}

	}
		function user_send_new_haslo($email,$nowe_haslo) {
			global $email_admin;
		/*
			wysylanie meila z hash zatwierdzajacym konto
		*/
		$subject="Telepraca zmiana has&#65533;a";
		$message.="\nTwoje poprzednie has&#65533;o zosta&#65533;o skasowane. ";
		$message.="Twoje nowe has&#65533;o: ".$nowe_haslo;
		$message.="\n\n --";
		$message.="\nPozdrawiamy,";
		$message.="\nZesp&#65533; Polsk Fagservice";
		$message.="\n\n--------------------------------";
		$message.="\nProsimy na t&#65533; wiadomo&#65533;&#65533; nie odpowiada&#65533;.";
		//$subject=iconv("UTF-8","ISO-8859-2", $subject);
		//$subject='=?iso-8859-2?B?'.base64_encode($subject).'?=';
		$headers .= "From: ".$email_admin."\n";
		//$message = nl2br ($message);
		//$message = stripslashes ($message);
		if(mail($email, $subject, $message, $headers)){
			return  true;
		}else{
			$feedback['wys_mail']='B&#322;ad w wys&#322;aniu meila';
			return false;
		}

	}

	function next_login()
	{
		$query = xsql_select('users','max(login)','');
		$result = xsql_fetch($query);
		if ($result[0]==NULL) {$result[0]=1000;}
		$next_login = $result[0]+1;
		return $next_login;
	}

	function gen_pass($length)
	{
	  $string = uniqid();
	  $string = substr($string,0,$length);
	  return($string);
	}

	//metoda do rejestracji
	function user_register_k($email,$imie,$nazwisko,$telefon,$telefonk,$czy_news,$czy_biuletyn,$czy_regulamin,$kategoria) {

		global $feedback,$hidden_hash_var;

			if(!$imie){
				$feedback['p_imie']=  'Nie wype&#322;ni&#322;e&#347; pola';
			}elseif(!$this->account_valid($imie)){
					$feedback['imie_litery']= " Nieznany znak w imieniu. ";
			}

			if(!$nazwisko){
				$feedback['p_nazwisko']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_valid($nazwisko)){
					$feedback['nazwisko_litery']= " Nieznany znak w nazwisku. ";
			}

			if(!$telefon){
				$feedback['p_telefon']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_telvalid($telefon)){
					$feedback['telefon']=  'Niepoprawny numer telefonu';
			}

			/*if(!$telefonk){
				$feedback['p_telefonk']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_telvalid($telefonk)){
					$feedback['telefonk']=  'Niepoprawny numer telefonu';
			}*/

			/*if(!$login){
				$feedback['p_login']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_namevalid($login)){

			}

			if(!$haslo1){
				$feedback['p_haslo']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_pwvalid($haslo1)){

			}elseif($haslo1!=$haslo2){
				$feedback['haslo_rozne']=  'Has&#322;a nie s&#261; jednakowe';
			}*/

			if(!$email){
				$feedback['p_email']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->validate_email($email)){
				$feedback['email']=  'B&#322;&#281;dny format emaila';
			}


			if(!$czy_regulamin){
					$feedback['regulamin']=  'Aby si&#281; zarejestrowa&#263; musisz potwierdzi&#263; akceptacj&#281; regulaminu';
			}

		//all vars present and passwords match?
		if ($nazwisko&&$imie&&$czy_regulamin&&$email && $this->validate_email($email)) {

			//haslo lub/i login bledny?
			if ($this->account_valid($imie)&&$this->account_valid($nazwisko)&&$this->account_telvalid($telefon)) {

				//sprawdzanie czy email istnieje w bazie?
				$sql_e="SELECT * FROM t_user WHERE email='".$email."'";
				$num_e=$this->Sqlobject->number_rows($sql_e);
				$result_e=$this->Sqlobject->query($sql_e);

				if($result_e && $num_e > 0){
					$feedback['email_istnieje']=  'Email ju&#380; istnieje';
					return $feedback;
				}else{

					//create a new hash to insert into the db and the confirmation email
					$adres_ip = $_SERVER['REMOTE_ADDR'];
					$adres_proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
					$adres_host = $_SERVER['REMOTE_HOST'];
					if($czy_biuletyn){
						$czy_biuletyn=1;
					}else $czy_biuletyn=0;

					if($czy_news){
						$czy_news=1;
					}else $czy_news=0;
					//ustanawienie nowego loginu i hasla
					$query = mysql_query('select max(login) from t_user');
					$result = mysql_fetch_row($query);
					if ($result[0]==NULL) {$result[0]=1100000;}
					$next_login = $result[0]+1;
					$login = $next_login;

					$length = 8;
					$string = uniqid();
					$string = substr($string,0,$length);
					$password = $string;

					mkdir($PATH."upload/users/".$login, 777);
					$mode = '777';
					$mode_dec = octdec($mode);
					chmod($PATH."upload/users/".$login, $mode_dec);

					$hash=sha1($email.$hidden_hash_var);
					$this->Sqlobject->set_table('user');
					$this->Sqlobject->set('login',$login);
					$this->Sqlobject->set('imie',$imie);
					$this->Sqlobject->set('nazwisko',$nazwisko);
					$this->Sqlobject->set('haslo',sha1($password));
					$this->Sqlobject->set('email',$email);
					$this->Sqlobject->set('adres_host',$adres_host);
					$this->Sqlobject->set('adres_ip',$adres_ip);
					$this->Sqlobject->set('adres_proxy',$adres_proxy);
					$this->Sqlobject->set('zatwierdz_hash',$hash);//email hash
					$this->Sqlobject->set('telefon',$telefon);
					$this->Sqlobject->set('telefon_kom',$telefonk);
					$this->Sqlobject->set('czy_news',$czy_news);
					$this->Sqlobject->set('czy_biuletyn',$czy_biuletyn);
					$this->Sqlobject->set('czy_regulamin',$czy_regulamin);
					$this->Sqlobject->set('czy_zatwierdz','0');
					$result=$this->Sqlobject->insert_db();

					$k_rej=new sql();
					$k_rej->set_table('user_kategoria');
					$k_rej->set('id_user',$result);
					$k_rej->set('id_kategoria',$kategoria);
					$result_k=$k_rej->insert_db();
					if (!$result) {
						$feedback['mysql']= ' ERROR - '.mysql_error();
						return $feedback;
					} else {
						//funkjcja wysylania meila z potwierdzeniem
						$this->user_send_confirm_email($email,$hash,$login,$password);
						$feedback['stan']= 'true';
						return $feedback;
					}//$result

				}//$result && $num
			} else {
				return $feedback;
			}//$this->account_namevalid($login)
		} else {

			return $feedback;
		}//$nazwisko&&$imie
	}//user_register

	function user_getid() {
		global $G_USER_RESULT;
		//see if we have already fetched this user from the db, if not, fetch it
		if (!$G_USER_RESULT) {
			$G_USER_RESULT=mysql_query("SELECT * FROM t_user WHERE user_name='" . $this->user_getname() . "'");
		}
		if ($G_USER_RESULT && mysql_num_rows($G_USER_RESULT) > 0) {
			return db_result($G_USER_RESULT,0,'id');
		} else {
			return false;
		}
	}

	//metoda do rejestracji
	function user_register_p($email,$imie,$nazwisko,$telefon,$telefonk,$czy_news,$czy_biuletyn,$czy_regulamin,$kategoria) {

		global $feedback,$hidden_hash_var;

			if(!$imie){
				$feedback['p_imie']=  'Nie wype&#322;ni&#322;e&#347; pola';
			}elseif(!$this->account_valid($imie)){
					$feedback['imie_litery']= " Nieznany znak w imieniu. ";
			}

			if(!$nazwisko){
				$feedback['p_nazwisko']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_valid($nazwisko)){
					$feedback['nazwisko_litery']= " Nieznany znak w nazwisku. ";
			}

			if(!$telefon){
				$feedback['p_telefon']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_telvalid($telefon)){
					$feedback['telefon']=  'Niepoprawny numer telefonu';
			}

			/*if(!$telefonk){
				$feedback['p_telefonk']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_telvalid($telefonk)){
					$feedback['telefonk']=  'Niepoprawny numer telefonu';
			}*/

			/*if(!$login){
				$feedback['p_login']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_namevalid($login)){

			}

			if(!$haslo1){
				$feedback['p_haslo']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->account_pwvalid($haslo1)){

			}elseif($haslo1!=$haslo2){
				$feedback['haslo_rozne']=  'Has&#322;a nie s&#261; jednakowe';
			}*/

			if(!$email){
				$feedback['p_email']=  'Nie wype&#322;ni&#322;a&#347;/&#322;e&#347; pola';
			}elseif(!$this->validate_email($email)){
				$feedback['email']=  'B&#322;&#281;dny format emaila';
			}


			if(!$czy_regulamin){
					$feedback['regulamin']=  'Aby si&#281; zarejestrowa&#263; musisz potwierdzi&#263; akceptacj&#281; regulaminu';
			}

		//all vars present and passwords match?
		if ($nazwisko&&$imie&&$czy_regulamin&&$email && $this->validate_email($email)) {

			//haslo lub/i login bledny?
			if ($this->account_valid($imie)&&$this->account_valid($nazwisko)&&$this->account_telvalid($telefon)&&$this->account_telvalid($telefonk)) {

				//sprawdzanie czy email istnieje w bazie?
				$sql_e="SELECT * FROM t_userp WHERE email='".$email."'";
				$num_e=$this->Sqlobject->number_rows($sql_e);
				$result_e=$this->Sqlobject->query($sql_e);

				if($result_e && $num_e > 0){
					$feedback['email_istnieje']=  'Email ju&#380; istnieje';
					return $feedback;
				}else{

					//create a new hash to insert into the db and the confirmation email
					$adres_ip = $_SERVER['REMOTE_ADDR'];
					$adres_proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
					$adres_host = $_SERVER['REMOTE_HOST'];
					if($czy_biuletyn){
						$czy_biuletyn=1;
					}else $czy_biuletyn=0;

					if($czy_news){
						$czy_news=1;
					}else $czy_news=0;

					$query = mysql_query('select max(login) from t_userp');
					$result = mysql_fetch_row($query);
					if ($result[0]==NULL) {$result[0]=6100000;}
					$next_login = $result[0]+1;
					$login = $next_login;

					$length = 8;
					$string = uniqid();
					$string = substr($string,0,$length);
					$password = $string;

					$hash=sha1($email.$hidden_hash_var);
					$this->Sqlobject->set_table('userp');
					$this->Sqlobject->set('login',$login);
					$this->Sqlobject->set('imie',$imie);
					$this->Sqlobject->set('nazwisko',$nazwisko);
					$this->Sqlobject->set('haslo',sha1($password));
					$this->Sqlobject->set('email',$email);
					$this->Sqlobject->set('adres_host',$adres_host);
					$this->Sqlobject->set('adres_ip',$adres_ip);
					$this->Sqlobject->set('adres_proxy',$adres_proxy);
					$this->Sqlobject->set('zatwierdz_hash',$hash);//email hash
					$this->Sqlobject->set('telefon',$telefon);
					$this->Sqlobject->set('telefon_kom',$telefonk);
					$this->Sqlobject->set('czy_news',$czy_news);
					$this->Sqlobject->set('czy_biuletyn',$czy_biuletyn);
					$this->Sqlobject->set('czy_regulamin',$czy_regulamin);
					$this->Sqlobject->set('czy_zatwierdz','0');
					$result=$this->Sqlobject->insert_db();

					$k_rej=new sql();
					$k_rej->set_table('user_kategoria');
					$k_rej->set('id_user',$result);
					$k_rej->set('id_kategoria',$kategoria);
					$result_k=$k_rej->insert_db();
					if (!$result) {
						$feedback['mysql']= ' ERROR - '.mysql_error();
						return $feedback;
					} else {
						//funkjcja wysylania meila z potwierdzeniem
						$this->user_send_confirm_email($email,$hash,$login,$password);
						$feedback['stan']= 'true';
						return $feedback;
					}//$result

				}//$result && $num
			} else {
				return $feedback;
			}//$this->account_namevalid($login)
		} else {

			return $feedback;
		}//$nazwisko&&$imie
	}//user_register



	function user_getrealname() {
		global $G_USER_RESULT;
		//see if we have already fetched this user from the db, if not, fetch it
		if (!$G_USER_RESULT) {
			$G_USER_RESULT=mysql_query("SELECT * FROM t_user WHERE user_name='" . $this->user_getname() . "'");
		}
		if ($G_USER_RESULT && mysql_num_rows($G_USER_RESULT) > 0) {
			return db_result($G_USER_RESULT,0,'real_name');
		} else {
			return false;
		}
	}

	function user_getemail() {
		global $G_USER_RESULT;
		//see if we have already fetched this user from the db, if not, fetch it
		if (!$G_USER_RESULT) {
			$G_USER_RESULT=mysql_query("SELECT * FROM t_user WHERE user_name='" . $this->user_getname() . "'");
		}
		if ($G_USER_RESULT && mysql_num_rows($G_USER_RESULT) > 0) {
			return db_result($G_USER_RESULT,0,'email');
		} else {
			return false;
		}
	}

	function user_getname() {
		if (user_isloggedin()) {
			return $GLOBALS['user_name'];
		} else {
			//look up the user some day when we need it
			return ' ERROR - Not Logged In ';
		}
	}

	function account_pwvalid($pw) {
		global $feedback;
		if (strlen($pw) < 6) {
			$feedback['haslo_krotkie'] .= " Has&#322;o musi si&#281; sk&#322;ada&#263; z conajmniej 6 znak&#65533;w  ";
			return false;
		}
		if(eregi('^[0-9]*$',$pw)){
			$feedback['haslo_same_cyfry']= " Has&#322;o nie mo&#65533;e zawiera&#263; samych cyfr  ";
			return false;
		}
		return true;
	}

	function account_namevalid($name) {
		global $feedback;

		// no spaces
		if (strrpos($name,' ') > 0) {
			$feedback['login_spacje']= " Nie mo&#380;e by&#263; &#380;adnych spacji w loginie . ";
			return false;
		}

		// must have at least one character
		if (strspn($name,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ") == 0) {
			$feedback['login_litera']= "Login musi zawiera&#263; przynajmniej jedn&#261; liter&#281; ";
			return false;
		}

		// must contain all legal characters
		if (strspn($name,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_")
			!= strlen($name)) {
			$feedback['login_n_znak']= " Nieznany znak w loginie  ";
			return false;
		}

		// min and max length
		if (strlen($name) < 5) {
			$feedback['login_krotki']= " Login zbyt kr&#65533;tki. Musi sk&#322;ada&#263; sie z conajmniej 5 znak&#65533;w  ";
			return false;
		}
		if (strlen($name) > 15) {
			$feedback['login_dlugi']= " Login zbyt d&#322;ugi. Musi by&#263; kr&#65533;tszy ni&#380; 15 znak&#322;w ";
			return false;
		}

		// illegal names
		if (eregi("^((root)|(bin)|(daemon)|(adm)|(lp)|(sync)|(shutdown)|(halt)|(mail)|(news)"
			. "|(uucp)|(operator)|(games)|(mysql)|(httpd)|(nobody)|(dummy)"
			. "|(www)|(cvs)|(shell)|(ftp)|(irc)|(debian)|(ns)|(download))$",$name)) {
			$feedback['nazwa_zarez']= " Niedozwolona nazwa .";
			return false;
		}
		if (eregi("^(anoncvs_)",$name)) {
			$feedback['cvs']= "Name is reserved for CVS.";
			return false;
		}

		return true;
	}
	function account_valid($name) {
		global $feedback;
		if (eregi('[0-9\\?\+\.\=\<\>\{\}\^\%\$\#\@\!\*\(\)\;\'\"\[-]',$name)){

			return false;
		}
		/*if (strspn($name,"abc&#65533;de&#65533;fghijkl&#65533;mno&#65533;pqrs&#65533;tuvwxyz&#65533;&#65533;ABC&#65533;DE&#65533;FGHIJKL&#65533;MNO&#65533;PQRS&#65533;TUVWXYZ&#65533;&#65533;")
			!= strlen($name)) {

			return false;
		}*/
		return true;
	}
	function account_numvalid($liczba) {
		if(!ereg('([0-9]$)', $liczba)){
			return false;
		}
		return true;
	}

	function account_telvalid($telefon) {
		if(!ereg('^\+48([0-9]{9}$)', $telefon)){
			return false;
		}
		return true;
	}
	function validate_email ($address) {
		return (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'. '@'. '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' . '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $address));
	}
}
?>