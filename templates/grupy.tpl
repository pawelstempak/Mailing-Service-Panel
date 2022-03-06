{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
	{if $location == NULL}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$GRUPY}' method='post'>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
	<td colspan="3" align="left" class="bg4 tyt1 pad4 border3">
	<span style="color: white">dodaj nową grupę </span><input type="text" name="grupa">		<input type="submit" name="wyslij_grupe" value="Dodaj">	<span style="font-size: 10; color: white">Nazwa grupy: <i>(przyk. Kontrahenci)</i></span>
	<input type="text" name="szukaj"><input type="submit" name="usun_wyszukane" value="Usuń z grup" onclick="return confirm('Czy na pewno chcesz usunąć podane adresy email z zaznaczonych grup?')"> <span style="font-size: 10; color: white"><i>(wklej adresy email oddzielone średnikami)</i></span>
	</td>
	</tr>
	<tr>
		<td class="bg1 pad4">
		<span style="font-family: Verdana; font-size: 9px; color: white"></span>
		</td>
		<td class="bg1 pad4">
		<span style="font-family: Verdana; font-size: 9px; color: white">grupa</span>
		</td>
		<td class="bg1 pad4" align="right">
		<span style="font-family: Verdana; font-size: 9px; color: white">akcja</span>
		</td>
	</tr>
	{section name=k loop=$grupy}
	<tr>
	<td class="bg3 pad4 border3" width="25"><input type="checkbox" name="grupa_checkbox[]" value="{$grupy[k].id}"></td>
	<td align="left" class="bg3 pad4 border3">
	<a href="{$DIR}?strona={$GRUPY}&location={$grupy[k].id}" style="font-family: Verdana; font-size: 9px">{$grupy[k].grupa} </a>
	</td>
	<td align="right" class="bg3 pad4 border3">
	<a href="{$DIR}?strona={$GRUPY}&action=usun_grupe&id={$grupy[k].id}" style="text-decoration: none" style="font-family: Verdana; font-size: 9px; color: red; font-weight: bold">usuń</a>
	</td>
	</tr>
	{/section}
	<tr>
	<td height="3" class="bg1 pad4">
	</td>
	<td height="3" class="bg1 pad4">
	</td>
	<td class="bg1 pad4">
	</td>
	</tr>
	</table>
	</form>
	{else}
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">	
	<tr>
	<td colspan="14" align="left" class="bg4 tyt1 pad4" height="10">
	<button onclick="javascript:window.location='{$DIR}?strona={$GRUPY}'">powrót</button>&nbsp;&nbsp;&nbsp;<span style="color: white; font-family: Trebuchet Ms; font-size: 18; font-weight: bold">GRUPA - {$nazwa_g.grupa}</span>
	</td>
	</tr>
	<tr>
	<td colspan="14" align="left" class="bg3 pad4 border3">
	<table>
		<tr>
			<td align="left" class="bg3 pad6">
				<form enctype='multipart/form-data' action='{$DIR}?strona={$GRUPY}&location={$location}' name="form1" method='post'>
				<select name="dodaj_kontakt_do_grupy" style="width: 165px">
				<option value="all">Wybierz...</option>
				{section name=k loop=$grupy}
				<option value="{$grupy[k].id}">{$grupy[k].grupa}</option>
				{/section}
				</select> 
				<input type="submit" name="dodaj_do_grupy" value=" kopiuj zaznaczone ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit_usun" type="submit" value=" usuń z grupy ">
			</td>
		</tr>
	</table>
	</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg1 pad4" width="2%">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1"/>
		</td>
		<td colspan="3" align="left" class="bg1 pad4" width="5%">
		{if $sort == ""}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=d" style="font-family: Verdana; font-size: 12px; color: white">L.p.<img src="image/arrow.gif"></a>
		{elseif $sort == "d"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}" style="font-family: Verdana; font-size: 12px; color: white">L.p.<img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}" style="font-family: Verdana; font-size: 12px; color: white">L.p.</a>
		{/if}
		</td>
		<td colspan="3" align="left" class="bg1 pad4" width="29%">
		{if $sort == "2"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=2d" style="font-family: Verdana; font-size: 12px; color: white">E-mail<img src="image/arrow.gif"></a>
		{elseif $sort == "2d"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=2" style="font-family: Verdana; font-size: 12px; color: white">E-mail<img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=2" style="font-family: Verdana; font-size: 12px; color: white">E-mail</a>
		{/if}
		</td>
		<td colspan="3" align="left" class="bg1 pad4" width="25%">
		{if $sort == "3"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=3d" style="font-family: Verdana; font-size: 12px; color: white">Nazwa<img src="image/arrow.gif"></a>
		{elseif $sort == "3d"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=3" style="font-family: Verdana; font-size: 12px; color: white">Nazwa<img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=3" style="font-family: Verdana; font-size: 12px; color: white">Nazwa</a>
		{/if}
		</td>
		<td colspan="3" align="left" class="bg1 pad4" width="25%">
		{if $sort == "4"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=4d" style="font-family: Verdana; font-size: 12px; color: white">Firma<img src="image/arrow.gif"></a>
		{elseif $sort == "4d"}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=4" style="font-family: Verdana; font-size: 12px; color: white">Firma<img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$GRUPY}&location={$location}&sort=4" style="font-family: Verdana; font-size: 12px; color: white">Firma</a>
		{/if}
		</td>
		<td class="bg1 pad4" width="7%">
		</td>
		<td class="bg1 pad4" width="7%">
		</td>
	</tr>
	{section name=k loop=$kontakty}
	<tr>
	<td colspan="3" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px"><input type="checkbox" name="email[]" value="{$kontakty[k].id}"></span>
	</td>
	<td colspan="3" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px">{$smarty.section.k.index+30*$str+1}</span>
	</td>
	<td colspan="3" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].email}</span>
	</td>
	<td colspan="3" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].nazwa}</span>
	</td>
	<td colspan="3" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].firma}</span>
	</td>
	<td class="bg3 pad6">
	</td>
	<td class="bg3 pad6">
	</td>
	</tr>
	{/section}
	<tr>
		<td colspan="14" class="pad4 bg3">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1" />
		</form>
		</td>
	</tr>
	{/if}
	
</td>
