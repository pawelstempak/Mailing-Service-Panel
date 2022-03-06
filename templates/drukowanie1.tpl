{*smarty*}
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">	
	<tr>
	<td colspan="13" align="left" class="bg4 tyt1 pad4" height="10">
	<button onclick="javascript:window.location='{$DIR}?strona={$HISTORIA}'">powrót</button>&nbsp;&nbsp;&nbsp;
	<button onclick="javascript:window.print()">Wydrukuj stronę</button>
	</td>
	</tr>
	<tr>
	<td colspan="13" align="left" class="bg3 pad4 border3">
	<table>
		<tr>
			<td align="left" class="bg3 pad6">
			</td>
		</tr>
	</table>
	</td>
	</tr>
		<tr>
		<td class="bg1 pad4">
		<span style="font-family: Verdana; font-size: 12px; color: white">L.p.</span>
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">Temat</span>
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">Data</span>
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">Adres własny</span>
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">Grupa</a>
		</td>
		<td class="bg1 pad4" align="left">
		<span style="font-family: Verdana; font-size: 12px; color: white">Załącznik</span>
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
	<span style="font-family: Verdana; font-size: 9px">{$grupy[k].tytul}</span>
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
	<tr>
		<td colspan="13" class="pad4 bg1">
		</td>
	</tr>
</table>
