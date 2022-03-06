{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
{if $action != "show"}
<form enctype='multipart/form-data' action='{$DIR}?strona={$HISTORIA}&cecha={$cecha}' method='post'>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
		<tr>
			<td class="bg4 pad4" colspan="7">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td class="bg4 pad4">
							<span style="color: white; font-weight: bold">raport &nbsp;</span><form enctype='multipart/form-data' action='{$DIR}?strona={$HISTORIA}&cecha={$cecha}' method='post'>
							<select name="filtr" style="width: 200" onChange="this.form.submit()">
							<option value="all">Wszystkie grupy</option>
							{section name=k loop=$grupy1}
							{if $filtr_grupy == $grupy1[k].grupa}
							<option value="{$grupy1[k].grupa}" selected>{$grupy1[k].grupa}</option>
							{else}
							<option value="{$grupy1[k].grupa}">{$grupy1[k].grupa}</option>
							{/if}
							{/section}
							</select> 
							<input name="filtr_drukowania" type="submit" value=" wydruk ">
							</form>
						</td>
						<td class="bg4 pad4">
							<form enctype='multipart/form-data' action='{$DIR}?strona={$HISTORIA}&cecha={$cecha}' method='post'>
							<select name="filtr_wlasne" style="width: 200">
							<option value="all">Wszystkie adresy</option>
							{section name=l loop=$wlasne}
							<option value="{$wlasne[l].nazwa}">{$wlasne[l].nazwa}</option>
							{/section}
							</select> 
							<input name="submit_wlasne" type="submit" value=" ok ">
							</form>
							</td>
							<td class="bg4 pad4">
							<form enctype='multipart/form-data' action='{$DIR}?strona={$HISTORIA}&cecha={$cecha}' method='post'>
							<input name="raport" style="width: 200" type=text>
							<input name="warunek1" type="hidden" value="{$warunek}">
							<input name="submit_wlasne" type="submit" value="  wyślij raport ">
							</form>
						</td>
					</tr>
					{if $note}
					<tr>
						<td align="left" class="bg4 pad6">
						<b style="color: white">Raport został wysłany na e-mail: {$note}</b>
						</td>
					</tr>
					{/if}
				</table>			
			</td>
		</tr>
		<tr>
		<td class="bg1 pad4">
		<span style="font-family: Verdana; font-size: 12px; color: white">L.p.</span>
		</td>
		<td class="bg1 pad4" align="left">
		{if $sort == "2"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=2d" style="font-family: Verdana; font-size: 12px; color: white"> Temat <img src="image/arrow.gif"></a>
		{elseif $sort == "2d"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=2" style="font-family: Verdana; font-size: 12px; color: white"> Temat <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$HISTORIA}&sort=2" style="font-family: Verdana; font-size: 12px; color: white">Temat</a>
		{/if}
		</td>
		<td class="bg1 pad4" align="left">
		{if $sort == ""}
		<a href="{$DIR}?strona={$HISTORIA}&sort=d" style="font-family: Verdana; font-size: 12px; color: white"> Data <img src="image/arrow.gif"></a>
		{elseif $sort == "d"}
		<a href="{$DIR}?strona={$HISTORIA}" style="font-family: Verdana; font-size: 12px; color: white"> Data <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$HISTORIA}" style="font-family: Verdana; font-size: 12px; color: white">Data</a>
		{/if}
		</td>
		<td class="bg1 pad4" align="left">
		{if $sort == "3"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=3d" style="font-family: Verdana; font-size: 12px; color: white"> Adres własny <img src="image/arrow.gif"></a>
		{elseif $sort == "3d"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=3" style="font-family: Verdana; font-size: 12px; color: white"> Adres własny <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$HISTORIA}&sort=3" style="font-family: Verdana; font-size: 12px; color: white">Adres własny</a>
		{/if}
		</td>
		<td class="bg1 pad4" align="left">
		{if $sort == "4"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=4d" style="font-family: Verdana; font-size: 12px; color: white"> Grupa <img src="image/arrow.gif"></a>
		{elseif $sort == "4d"}
		<a href="{$DIR}?strona={$HISTORIA}&sort=4" style="font-family: Verdana; font-size: 12px; color: white"> Grupa <img src="image/arrow1.gif"></a>
		{else}
		<a href="{$DIR}?strona={$HISTORIA}&sort=4" style="font-family: Verdana; font-size: 12px; color: white">Grupa</a>
		{/if}
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">załącznik</span>
		</td>
		<td class="bg1 pad4" align="left">
		</td>
	</tr>
	{section name=k loop=$grupy start=0}
	<tr>
	<td width=5% align="left" class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$smarty.section.k.index+1}</span>
	</td>
	<td width=20% class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px"><a href="{$DIR}?strona=8&action=show&id={$grupy[k].id}">{$grupy[k].tytul}</a></span>
	</td>
	<td width=20% class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$grupy[k].data}</span>
	</td>
	<td width=15% class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$grupy[k].adres_wlasny}</span>
	</td>
	<td width=15% class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$grupy[k].grupa} ({$grupy[k].ilosc_grupa})</span>
	</td>
	<td width=15% class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$grupy[k].zalacznik}</span>
	</td>
	<td width=10% class="bg3 pad4 border3">
	<a href="{$DIR}?strona={$HISTORIA}&action=usun&id={$grupy[k].id}" style="text-decoration: none" style="font-family: Verdana; font-size: 9px; color: red; font-weight: bold">usun</a>
	</td>
	</tr>
	{/section}
	</table>
	</form>
{else}
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
		<tr>
			<td class="bg4 pad4" colspan="7">
			<span style="color: white; font-weight: bold">Treść wiadomości o tytule - "<i>{$tresc.tytul}</i>" wysłanej - "<i>{$tresc.data}</i> do grupy - "<i>{$tresc.grupa}</i>"</span>
			</td>
		</tr>
		<tr>
			<td class="bg1 pad4" colspan="7">
			<span style="color: white; font-weight: bold">{$tresc_wiadomosci}</span>
			</td>
		</tr>
		<tr>
			<td class="bg1 pad4" height="20" colspan="7">
			</td>
		</tr>
		<tr>
			<td class="bg1 pad4" colspan="7" align="left">
			<span style="color: white; font-weight: bold"><a href="javascript:history.back()" class="link1">powrót</a></span>
			</td>
		</tr>
	</table>
{/if}
</td>
