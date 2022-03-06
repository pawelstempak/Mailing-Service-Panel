<?php

if ($_GET['action'] == 'send_list')
{
	$query=mysql_query('select * from '.$cfg['db_prefix'].'mail_dane where `index` = \''.$user_login.'\'');
	while ($result = mysql_fetch_array($query))
	{
				$wiadomosc = new eMail();
				$email = $result['email'];
				$subject = "Mailing service";
				$body="Mailing service content";
				$wiadomosc->eMailContent($subject, $body);
				$wiadomosc->eMailSend($email);
		
	}
}

?>
