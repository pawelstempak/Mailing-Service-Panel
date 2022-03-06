{* smarty*}
{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
	<form enctype='multipart/form-data' action='{$DIR}?strona={$NOWA_WIADOMOSC1}' method='POST' name="form1">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td class="bg4 tyt1 pad4" colspan="3">
		<b style="color: white">Nowa wiadomość</b><br>
		</td>
	</tr>
		{if $note=="ok"}
	<tr>
		<td colspan="2" align="left" class="bg3 pad4">
		<b>Wiadomość została wysłana do grupy.</b><br>
		</td>
	</tr>
		{/if}
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px">Wybierz rodzaj wiadomości
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px"><a href="{$DIR}?strona={$NOWA_WIADOMOSC}" style="font-family: Verdana; font-size: 9px">Cała grupa</a> - <a href="{$DIR}?strona={$NOWA_WIADOMOSC1}" style="font-family: Verdana; font-size: 10px; font-weight: bold">Wybrane e-maile</a>			
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px">Z którego konta</span>
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
			<span style="font-family: Verdana; font-size: 9px">Do której grupy<a href="{$DIR}?strona={$NOWA_WIADOMOSC}" style="font-family: Verdana; font-size: 9px">		
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
		<span style="font-family: Verdana; font-size: 9px; color: white">L.p.</span>
		</td>
		<td colspan="2" align="left" class="bg6 pad4" width="31%">
		<span style="font-family: Verdana; font-size: 9px; color: white">E-mail</span>
		</td>
		<td colspan="2" align="left" class="bg6 pad4" width="25%">
		<span style="font-family: Verdana; font-size: 9px; color: white">Nazwa</span>
		</td>
		<td colspan="2" align="left" class="bg6 pad4" width="25%">
		<span style="font-family: Verdana; font-size: 9px; color: white">Firma</span>
		</td>
		<td class="bg6 pad4" width="7%">
		</td>
		<td class="bg6 pad4" width="7%">
		</td>
	</tr>
	{section name=k loop=$kontakty}
	<tr>
	<td colspan="2" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px"><input type="checkbox" name="email[]" value="{$kontakty[k].email}"></span>
	</td>
	<td colspan="2" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px">{$smarty.section.k.index+30*$str+1}</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].email}</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].nazwa}</span>
	</td>
	<td colspan="2" align="left" class="bg3 pad6">
	<span style="font-family: Verdana; font-size: 9px; color: black">{$kontakty[k].firma}</span>
	</td>
	<td class="bg3 pad6">
	</td>
	<td class="bg3 pad6">
	</td>
	</tr>
	{/section}
	<tr>
		<td colspan="13" class="pad4 bg3">
		<input type="button" value="w/ż" onclick="zaznacz()" style="font-size: 9px; padding-left: 1; padding-right: 1" />
		</td>
	</tr>
	</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px">Temat:</span>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg3 tyt1 pad4 border3">
			<input type="text" name="temat" style="width: 421">
		</td>
	</tr>
	<tr>
		<td align="left" class="bg3 tyt1 pad4 border3">
			<span style="font-family: Verdana; font-size: 9px">Treść wiadomości:</span>
		</td>
		<td align="left" class="bg3 tyt1 pad4 border3">
			<input type="checkbox" name="czy_podpis" value="tak" checked>
			<span style="font-family: Verdana; font-size: 9px">Dodaj podpis:</span>
		</td>
	</tr>
	<tr>
		<td align="left" class="bg3 tyt1 pad4 border3">
			<textarea name="tresc" cols="80" rows="18"></textarea>
		</td>
		<td align="left" class="bg3 tyt1 pad4 border3" valign="top" width="50%">
			<textarea name="podpis" cols="40" rows="8">{$podpis.podpis}</textarea><br /><br />
			<input type="checkbox" name="czy_potwierdzic" value="tak">
			<span style="font-family: Verdana; font-size: 9px">żądaj potwierdzenia przeczytania wiadomości</span><br />
			<input type="checkbox" name="czy_wypisywanie" value="tak">
			<span style="font-family: Verdana; font-size: 9px">dodaj link "Usuń mnie z listy"</span>
		</td>	
	</tr>
	<tr>
		<td height="25" colspan="3" align="left" class="bg3 tyt1 pad4 border3">
		<span style="font-family: Verdana; font-size: 9px">Załączniki:</span>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg3 tyt1 pad4 border3">
	{literal}
		  <script type="text/javascript">
		  window.onload = Laduj;
		  function Laduj()
		  {
		    document.getElementById('add_input').onclick = DodajElement;
		  }
		  function DodajElement()
		  {
		    var element = document.createElement('input');
		    element.setAttribute('type', 'file');
		    var liczba = 0;
		    var ilosc = document.forms['form1'].elements.length;
		    for (var i = 0; i < ilosc; i++ )
		    {
		      if (document.forms['form1'].elements[i].type == 'file')
		      {
		        liczba += 1;
		      }
		     }
			 element.setAttribute('name', 'file-'+(liczba+1));	
		    element.style.display = "block";
		    element.style.margin= "2px";
			 document.getElementById('eventType'). appendChild(element);
		  }
		  </script>
	{/literal}
			<input type=hidden name="MAX_FILE_SIZE" value="2048000">
			<input type="file" name="file-1" id="eventType">
			<a href="#" id="add_input">Dodaj kolejny załącznik</a>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="left" class="bg3 tyt1 pad4 border3">
			<input type="submit" name="nowa_wiadomosc" value="Wyślij">
		</td>
	</tr>
	</table>
	</form>
</td>