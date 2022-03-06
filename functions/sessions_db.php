<?php
$ses= new sql();
function _open()
{
    return true;
}

function _close()
{
	return true;
}

function _read($id)
{
	global $ses;
		$id = mysql_real_escape_string($id);
		$ses->set_table('sesja');
		$ses->set('data',"");
		$filter=" id = '$id'";
		
		$num=$ses->rows_query($filter);
		if($num>0){
			$dane_ses=$ses->load_db2($filter);
			return $dane_ses['data'];
			
		}

		return '';	
}

function _write($id, $data)
{   
    global $ses,$cfg;
	$ses= new sql();
    $access = time();
    $id = mysql_real_escape_string($id);
    $access = mysql_real_escape_string($access);
    $data = mysql_real_escape_string($data);
	if(isset($_SESSION['login']) and $_SESSION['login']<6000000){
		//zwracanie id zalogowanego uzytkownika 
		$user= new sql();
		$user->set_table('user');
		$user->set('id',"");
		$filter=" login='".$_SESSION['login']."'";
		$dane_user=$user->load_db2($filter);
		$id_user=$dane_user['id'];
	}elseif(isset($_SESSION['login']) and $_SESSION['login']>6000000){
		//zwracanie id zalogowanego uzytkownika 
		$user= new sql();
		$user->set_table('userp');
		$user->set('id',"");
		$filter=" login='".$_SESSION['login']."'";
		$dane_user=$user->load_db2($filter);
		$id_user=$dane_user['id'];
	}else{
		$id_user="0";
	}
	
	$id_user= mysql_real_escape_string($id_user);
    $sql = "REPLACE INTO ".$cfg['db_prefix']."sesja VALUES  ('$id', '$access', '$data','$id_user')";

    return $ses->query($sql);
}

function _destroy($id)
{
    global $ses,$cfg;
    
    $id = mysql_real_escape_string($id);

    $sql = "DELETE FROM ".$cfg['db_prefix']."sesja WHERE  id = '$id'";

    return $ses->query($sql);
}

function _clean($max)
{
    global $ses,$cfg;
    
    $old = time() - $max;
	
    $old = mysql_real_escape_string($old);

    $sql = "DELETE FROM ".$cfg['db_prefix']."sesja WHERE  access < '$old'";

    return $ses->query($sql);
}

?>
