{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
{if $action == "podpis"}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$WLASNE}&id={$podpis_dane.id}' method='post'>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
			<tr>
			<td align="left" class="bg4 pad4">
			<span style="font-size: 11; color: white; font-weight: bold">Podpis pod treścią listu</span>
			</td>
			</tr>
			<tr>
				<td class="pad3">
				Treść podpisu:
				</td>
			</tr>
			<tr>
				<td class="pad3">
					<textarea name="podpis_tresc" cols="40" rows="8">{$podpis_dane.podpis}</textarea><br>
					<input type="submit" name="podpis1" value="aktualizuj">
					</form>
				</td>
			</tr>
	</table>
{else}
	<form enctype='multipart/form-data' action='{$DIR}?strona={$WLASNE}' method='post'>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td>
			<table cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td align="left" class="bg4 pad4">
			<span style="font-size: 11; color: white; font-weight: bold">adres e-mail</span> &nbsp;&nbsp;<input type="text" name="nazwa">&nbsp;&nbsp;	
			<span style="font-size: 11; color: white; font-weight: bold">opis</span>&nbsp;&nbsp; <input type="text" name="opis"> &nbsp;&nbsp;
			 <input type="submit" name="wyslij_wlasne" value="Dodaj">

			</td>
			</tr>
			</table>
		</td>
		<td class="bg4 pad4">
		</td>
	</tr>
	<tr>
		<td class="bg1 pad4">
		<span style="font-family: Verdana; font-size: 9px; color: white">grupa</span>
		</td>
		<td class="bg1 pad4" align="center">
		<span style="font-family: Verdana; font-size: 9px; color: white">akcja</span>
		</td>
	</tr>	
	{section name=k loop=$wlasne}
	<tr>
	<td class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$wlasne[k].opis} - {$wlasne[k].nazwa}</span> >> <a href="{$DIR}?strona={$WLASNE}&id={$wlasne[k].id}&action=podpis" style="text-decoration: none" style="font-family: Verdana; font-size: 9px; color: red; font-weight: bold">podpis</a>
	</td>
	<td class="bg3 pad4 border3" width=20% align="center">
	<a href='{$DIR}?strona={$WLASNE}&id={$wlasne[k].id}&act=usun' style="text-decoration: none" style="font-family: Verdana; font-size: 9px; color: red; font-weight: bold">usuń</a>
	</td>
	</tr>
	{/section}
	<tr>
	<td height="3" class="bg1 pad4" colspan=2>
	</td>
	</tr>
	</table>
	</form>
{/if}
</td>
