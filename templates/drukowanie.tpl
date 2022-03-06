{*smarty*}
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">	
	<tr>
	<td colspan="13" align="left" class="bg4 tyt1 pad4" height="10">
	<button onclick="javascript:window.location='{$DIR}?strona={$KONTAKTY}'">powrót</button>&nbsp;&nbsp;&nbsp;
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
		<td colspan="2" align="left" class="bg1 pad4" width="2%">
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="3%">
		<span style="font-family: Verdana; font-size: 9px; color: white">L.p.</span>
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="31%">
		<span style="font-family: Verdana; font-size: 9px; color: white">E-mail</span>
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="25%">
		<span style="font-family: Verdana; font-size: 9px; color: white">Nazwa</span>
		</td>
		<td colspan="2" align="left" class="bg1 pad4" width="37%">
		<span style="font-family: Verdana; font-size: 9px; color: white">Firma</span>
		</td>
		<td class="bg1 pad4" width="1%">
		</td>
		<td class="bg1 pad4" width="1%">
		</td>
	</tr>
	{section name=k loop=$kontakty}
	<tr>
	<td colspan="2" align="left" class="bg3 pad4 border3">
	&nbsp;
	</td>
	<td colspan="2" align="left" class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px">{$smarty.section.k.index+30*$str+1}&nbsp;</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].email}&nbsp;</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].nazwa}&nbsp;</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad4 border3">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].firma}&nbsp;</span>
	</td>
	<td class="bg3 pad4 border3">&nbsp;
	</td>
	<td class="bg3 pad4 border3">&nbsp;
	</td>
	</tr>
	{/section}
	<tr>
		<td colspan="13" class="pad4 bg1">
		</td>
	</tr>
</table>
