{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	{if $action != "dodaj"}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$KONTAKTY}&id={$id}' method='post'>
	{/if}
	{if $action == "dodaj"}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$KONTAKTY}&action=dodaj' method='post'>
	<tr>
	<td colspan="5" align="left" class="bg4 tyt1 pad4" height="10">
	<span style="text-decoration: none; font-weight: bold; color: white">Nowy kontakt</span>
	</td>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">E-mail</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="email" style="width: 200">&nbsp;&nbsp;<span style="font-family: Verdana; font-size: 9px; color: black">biuro@c-net.pl</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">Nazwa</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="nazwa" style="width: 200">&nbsp;&nbsp;<span style="font-family: Verdana; font-size: 9px; color: black">Adam Kowalski</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">Firma</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="firma" style="width: 200">&nbsp;&nbsp;<span style="font-family: Verdana; font-size: 9px; color: black">Cybernet</span>
	</td>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">Grupa</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
			<select name="grupa">
			<option value="all">wybierz...</option>
			{section name=g loop=$grupy}
			<option value="{$grupy[g].id}">{$grupy[g].grupa}</option>
			{/section}
			</select>
	</td>
	</tr>
	<tr>
	<td align="left" class="bg2 tyt1 pad4 border3">
	<input type="submit" name="wyslij_kontakt" value="Dodaj">
	</td>
	<td align="right" class="bg2 tyt1 pad4 border3">
	{if $notatka != ""}Info: {$notatka}{/if}
	</td>
	</tr>
	<tr>
	<td align="left" class="bg1 tyt1 pad4 border3">
		<a href="{$DIR}?strona={$IMPORT}" class="link1"><img src="image/importuj.gif" border=0></a>
	</td>
	<td align="right" class="bg1 tyt1 pad4 border3">
		<a href="{$DIR}?strona={$KONTAKTY}" class="link1"><img src="image/zakoncz.gif" border=0></a>
	</td>
	</tr>
	</form>
	{elseif $action == "edytuj"}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$KONTAKTY}&id={$id}' method='post'>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">E-mail</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="email" value="{$k_kontakt.email}" style="width: 200">
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">Nazwa</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="nazwa" value="{$k_kontakt.nazwa}" style="width: 200">
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<span style="font-family: Verdana; font-size: 9px; color: black">Firma</span>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="text" name="firma" value="{$k_kontakt.firma}" style="width: 200">
	</td>
	</tr>
	<tr>
	<td colspan="2" align="left" class="bg2 pad4">
	<input type="submit" name="edytuj_kontakt" value="Zmień">
	</td>
	</tr>
	<tr>
	<td colspan="2" align="right" class="bg1 pad4">
		<a href="{$DIR}?strona={$KONTAKTY}" class="link1">Zakończ</a>	
	</td>
	</tr>
	</form>	
	{else}
	<tr>
	<td colspan="5" align="left" class="bg4 tyt1 pad4" height="10"><span style="font-weight: bold; color: white">Lista kontaktów</span>
	{*<a href="{$DIR}?strona={$KONTAKTY}&action=dodaj" style="text-decoration: underline; font-weight: bold; color: white"><img src="image/dodaj_kontakt.gif" border=0></a>*}
	</td>
	<td colspan="8" align="right" class="bg4 tyt1 pad4">
	<form enctype='multipart/form-data' action='{$DIR}?strona={$KONTAKTY}' method='post'>
	<span style="color: white">raport &nbsp;</span><select name="grupa_raport">
	<option value="all">Wszystkie</option>
	{section name=k loop=$grupy}
	<option value="{$grupy[k].id}">{$grupy[k].grupa}</option>
	{/section}
	</select> 
	<input name="raport" style="width: 200" type="text">
	<input name="submit_raport" type="submit" value=" wyślij raport ">
	</form>
	</td>
	</tr>
	{if $note}
	<tr>
		<td colspan="13" align="left" class="bg6 pad4">
		<b>Raport został wysłany na e-mail: {$note}</b>
		</td>
	</tr>
	{/if}
	<tr>
	<td colspan="13" align="left" class="bg3 pad4 border3">
	<table>
		<tr>
			<td align="left" class="bg3" style="font-size:10px;">
				<form enctype='multipart/form-data' action='{$DIR}?strona={$KONTAKTY}' name="form1" method='post'>
				<a href="{$DIR}?strona={$KONTAKTY}&action=dodaj"><img src="image/new.png" border="0" style="position:relative;top:7px;" title="Dodaj nowy kontakt"></a> <img src="image/parser.png" style="position:relative;top:7px;"> <a href="{$DIR}?strona={$IMPORT}"><img src="image/import.png" border="0" style="position:relative;top:7px;" title="Importuj z pliku"></a> <img src="image/parser.png" style="position:relative;top:7px;"> <select name="dodaj_kontakt_do_grupy" style="width: 75px;font-size:10px;" title="Wybierz grupę do której skopiować zaznaczone">
				<option value="all">Wszystkie</option>
				{section name=k loop=$grupy}
				<option value="{$grupy[k].id}">{$grupy[k].grupa}</option>
				{/section}
				<option value="bl">Czarna lista</option>
				</select> <input type="image" name="submit_dodaj" value="Dodaj" src="image/copy.png" style="position:relative;top:7px;" title="Kopiuj zaznaczone do wybranej grupy"> <img src="image/parser.png" style="position:relative;top:7px;"> <input type="image" name="submit_usun" value="usuń zaznaczone" src="image/trash.png" style="position:relative;top:7px;" title="Usuń zaznaczone kontakty" onclick="return confirm('Czy chcesz usunąć ten adres email?')"> <img src="image/parser.png" style="position:relative;top:7px;"> wyświetl po <input type="text" name="na_stronie" style="width:30px;font-size:10px;" title="Wyświetl po zadanej liczbie kontaktów">
			</td>
			<td align="left" class="bg3" style="font-size:10px;">
				<img src="image/parser.png" style="position:relative;top:7px;"> <select name="filtr" style="width: 75px;font-size:10px;" onChange="this.form.submit()" title="Wyświtl grupę">
				<option value="all">Wszystkie</option>
				{section name=k loop=$grupy}
				{if $filtr_grupy == $grupy[k].id}
				<option value="{$grupy[k].id}" selected>{$grupy[k].grupa}</option>
				{else}
				<option value="{$grupy[k].id}">{$grupy[k].grupa}</option>
				{/if}
				{/section}
				<option value="bl" {if $filtr_grupy == "bl"} selected{/if}>Czarna lista</option>
				</select> 
				<input type="image" name="filtr_drukowania" value="wydruk" src="image/print.png" style="position:relative;top:7px;" title="Podgląd wydruku">
			</td>
		</tr>
	</table>
	</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg1 pad4" width="2%">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1"/>
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="5%">
		{if $sort == ""}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=d&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> L.p. <img src="image/arrow.gif"></a>
		{elseif $sort == "d"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> L.p. <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&s={$s}" style="font-family: Verdana; font-size: 12px; color: white">L.p.</a>
		{/if}
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="29%">
		{if $sort == "2"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=2d&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> E-mail <img src="image/arrow.gif"></a>
		{elseif $sort == "2d"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=2&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> E-mail <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=2&s={$s}" style="font-family: Verdana; font-size: 12px; color: white">E-mail</a>
		{/if}
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="20%">
		{if $sort == "3"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=3d&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> Nazwa <img src="image/arrow.gif"></a>
		{elseif $sort == "3d"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=3&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> Nazwa <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=3&s={$s}" style="font-family: Verdana; font-size: 12px; color: white">Nazwa</a>
		{/if}
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="20%">
		{if $sort == "4"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=4d&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> Firma <img src="image/arrow.gif"></a>
		{elseif $sort == "2d"}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=4&s={$s}" style="font-family: Verdana; font-size: 12px; color: white"> Firma <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$KONTAKTY}&grupa={$filtr_grupy}&sort=4&s={$s}" style="font-family: Verdana; font-size: 12px; color: white">Firma</a>
		{/if}
		</td>
		<td class="bg1 pad4" width="10%">
		<span style="color:white">Grupy</span>
		</td>
	</tr>
	{section name=k loop=$kontakty}
	<tr class="bg3">
	<td colspan="2" align="left" class="border3">
	<span style="font-family: Verdana; font-size: 9px"><input type="checkbox" name="email[]" value="{$kontakty[k].id}"></span>
	</td>
	<td colspan="2" align="left" class="border3">
	<span style="font-family: Verdana; font-size: 9px">{$smarty.section.k.index+$start+1}</span>
	</td>
	<td colspan="2" align="left" class="border3">
	<a href="{$DIR}?strona={$KONTAKTY}&action=edytuj&id={$kontakty[k].id}" class="link">{$kontakty[k].email}
	</a>
	</td>
	<td colspan="2" align="left" class="border3">
	<span style="font-family: Verdana; font-size: 9px; color: black">{if $kontakty[k].nazwa == ""}&nbsp;{else}{$kontakty[k].nazwa}{/if}</span>
	</td>
	<td colspan="2" align="left" class="border3">
	<span style="font-family: Verdana; font-size: 9px; color: black">{if $kontakty[k].firma == ""}&nbsp;{else}{$kontakty[k].firma}{/if}</span>
	</td>
	<td class="border3">{email_grupy number=$kontakty[k].id}
	</td>
	</tr>
	{/section}
	<tr>
		<td colspan="13" class="pad4 bg3">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1" />
		</form>
		</td>
	</tr>
	{if $filtr == "all" or $filtr == NULL and $id_grupa == ""}
	<tr>
	<td height="20" colspan="13" class="pad4" align="center">
	{$pasek}
	</td>
	</tr>
	{/if}
	<tr>
	<td height="3" colspan="13" class="bg1 pad4">
	</td>
	</tr>
	{/if}
	</table>
</td>
