{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="681" valign="top" class="pad1 bor2">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<form enctype='multipart/form-data' action='{$DIR}?strona={$IMPORT}' method='post'>
	<tr>
	<td colspan="2" align="left" class="bg4 tyt1 pad4 border3">
	<span style="font-size: 12; color: white; font-weight: bold">Import kontaktów z pliku CSV</span>
	</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9"  colspan="2">
			<input type='hidden' name='dodaj'>
			Wybierz plik z kontaktami<br><br>
			<input name="file" type="file">&nbsp;&nbsp;&nbsp; GRUPA
			<select name="grupa">
			<option value="all">wybierz...</option>
			{section name=g loop=$grupy}
			<option value="{$grupy[g].id}">{$grupy[g].grupa}</option>
			{/section}
			</select>
			<br><br>
			<input name="typ" type="radio" value="outlook_express" checked> Outlook Express &nbsp;&nbsp;&nbsp;&nbsp;
			<input name="typ" type="radio" value="thunderbird"> Thunderbird &nbsp;&nbsp;&nbsp;&nbsp;
			<input name="typ" type="radio" value="thebat"> TheBat &nbsp;&nbsp;&nbsp;&nbsp;
			<input name="typ" type="radio" value="excel"> Plik excel<br><br> 
			<input type="submit" name="profil" value="Dodaj plik" style="font-size: 10px">
		</td>
	</tr>
	<tr>
	<td height="3" class="bg1 pad4">
	<a href="{$DIR}?strona={$KONTAKTY}" class="link1"><img src="image/zakoncz.gif" border=0></a>
	</td>
	<td align="right" class="bg1 pad4">
	{$dodano}
	</td>
	</tr>
	</table>
</td>
