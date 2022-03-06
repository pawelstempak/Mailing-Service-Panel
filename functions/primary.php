<?php
function zwroc_id_login()
{
	$user2= new sql();
	$user2->set_table('admin');
	$user2->set('id',"");
	$filter=" login='".$_SESSION['login']."'";
	$dane_i=$user2->load_db2($filter);
	return $dane_i['id'];
}

function pasek($rekordow,$na_stronie,$na_pasku,$skrypt,$s) {
  $stron = ceil($rekordow/$na_stronie);
  if ($s<1) $s=1;
  if ($s>$stron) $s=$stron;
  $koniec = $s+$na_pasku;
  if ($s<=$na_pasku) $koniec = $na_pasku*2+1;
  if ($koniec>$stron) $koniec = $stron;
  $start = $koniec-$na_pasku*2;
  if ($start<1) $start=1;
  if ($s>1) $p = "<a href='$skrypt".($s-1)."' style='color:black'>&lt;&lt;&lt;</a>";
  else $p = "<span style='color:gray'>&lt;&lt;&lt;</span>";
  if ($s<$stron) $n = "<a href='$skrypt".($s+1)."' style='color:black'>&gt;&gt;&gt;</a>";
  else $n = "<span style='color:gray'>&gt;&gt;&gt;</span>";
  for ($i=$start; $i<=$koniec; $i++) {
    if ($i==$s) $l .= "&nbsp;<span style='color:#cc0000;'><b>$i</b></span>&nbsp;";
    else $l .= "&nbsp;<a href='$skrypt$i' style='color:black'>$i</a>&nbsp;";
  }
  if ($rekordow<1) $wynik = "brak informacji w kryterium wyszukiwania";
  else $wynik = "strona $s z $stron<br />";
  if ($stron>1) $wynik .= "$p&nbsp; - $l - &nbsp;$n";
  return $wynik;
}
?>