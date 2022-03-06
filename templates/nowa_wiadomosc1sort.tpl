{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
	<form enctype='multipart/form-data' action='{$DIR}?strona={$NOWA_WIADOMOSC1}' method='post' name="form1">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td class="bg4 tyt1 pad4" colspan="3">
		<b style="color: white">Nowa wiadomo¶ć</b><br>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 pad4">
		{if $note=="ok"}
		<b>Wiadomo¶ć została wysłana do grupy.</b><br>
		{/if}
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px">Od - Konto email:</span>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
		<select name="konto" onChange="this.form.submit()">
		{section name=k loop=$konto}
		{if $konto1 == $konto[k].id}
		<option value="{$konto[k].id}" selected>{$konto[k].opis} - {$konto[k].nazwa}</option>
		{else}
		<option value="{$konto[k].id}">{$konto[k].opis} - {$konto[k].nazwa}</option>
		{/if}
		{/section}
		</select>	
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
			{if $strona == "3"}
			<span style="font-family: Verdana; font-size: 9px">Do - <a href="{$DIR}?strona={$NOWA_WIADOMOSC}" style="font-family: Verdana; font-size: 9px">Grupa</a> - <a href="{$DIR}?strona={$NOWA_WIADOMOSC1}" style="font-family: Verdana; font-size: 9px">Wybrane e-maile:</a>
			{else}
			<span style="font-family: Verdana; font-size: 9px">Do - <a href="{$DIR}?strona={$NOWA_WIADOMOSC}" style="font-family: Verdana; font-size: 9px">Grupa</a> - <a href="{$DIR}?strona={$NOWA_WIADOMOSC1}" style="font-family: Verdana; font-size: 10px; font-weight: bold">Wybrane e-maile:</a>			
			{/if}
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
		<select name="filtr_grupa" onChange="this.form.submit()">
		{section name=k loop=$grupa}
		{if $filtr_grupa == $grupa[k].id}
		<option value="{$grupa[k].id}" SELECTED>{$grupa[k].grupa}</option>
		{else}
		<option value="{$grupa[k].id}">{$grupa[k].grupa}</option>
		{/if}
		{/section}
		</select>	
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" align="left" class="bg6 pad4" width="2%">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1"/>
		</td>
		<td colspan="2" align="left" class="bg6 pad4" width="3%">
		{if $sort == ""}
		<a href="{$DIR}?strona={$NOWA_WIADOMOSC1}&grupa={$filtr_grupy}&sort=d" style="font-family: Verdana; font-size: 12px; color: white">L.p. <img src="image/arrow.gif"></a>
		{elseif $sort == "d"}
		<a href="{$DIR}?strona={$NOWA_WIADOMOSC1}&grupa={$filtr_grupy}" style="font-family: Verdana; font-size: 12px; color: white">L.p. <img src="image/arrow1.gif"></a>
		{else}
			<input type=hidden name="MAX_FILE_SIZE" value="2048000">
			<input type="file" name="file2">
		</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg3 tyt1 pad4 border3">
			<input type="submit" name="nowa_wiadomosc" value="Wy¶lij">
		</td>
	</tr>
	</table>
	</form>
</td>
