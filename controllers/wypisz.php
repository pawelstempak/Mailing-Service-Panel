<?php
mysql_query("delete from t_grupy where id_mail = '".$_GET['mail']."' and id_grupa = '".$_GET['grupa']."'");
?>