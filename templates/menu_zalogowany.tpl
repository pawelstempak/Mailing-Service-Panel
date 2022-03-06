{* smarty *}
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0" class="bor1">
  <tr>
    <td width="70" valign="top">
  <table width="70" border="0" cellspacing="0" cellpadding="0">
  	<tr>
  		<td height="19px">
  		</td>
  	</tr>
	<tr>
	{if $strona==$NOWA_WIADOMOSC}
		<td class="pad4"><img src="image/nowa1.gif" alt="Nowa wiadomość" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$NOWA_WIADOMOSC}"><img src="image/nowa.gif" alt="Nowa wiadomość" border=0></a></td>
	{/if}
	</tr>
	<tr>
	{if $strona==$BIULETYN}
		<td class="pad4"><img src="image/biuletyn1.gif" alt="Biuletyn HTML" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$BIULETYN}"><img src="image/biuletyn.gif" alt="Biuletyn HTML" border=0></a></td>
	{/if}
	</tr>
	<tr>
	{if $strona==$KONTAKTY}
		<td class="pad4"><img src="image/kontakty1.gif" alt="Kontakty" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$KONTAKTY}"><img src="image/kontakty.gif" alt="Kontakty" border=0></a></td>
	{/if}
	</tr>
	<tr>
	{if $strona==$GRUPY}
		<td class="pad4"><img src="image/grupy1.gif" alt="Grupy" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$GRUPY}"><img src="image/grupy.gif" alt="Grupy" border=0></a></td>
	{/if}
	</tr>
   <tr>
	<tr>
	{if $strona==$WLASNE}
		<td class="pad4"><img src="image/wlasne1.gif" alt="Własne adresy" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$WLASNE}"><img src="image/wlasne.gif" alt="Własne adresy" border=0></a></td>
	{/if}
	</tr>
	<tr>
	{if $strona==$HISTORIA}
		<td class="pad4"><img src="image/historia1.gif" alt="Własne adresy" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$HISTORIA}"><img src="image/historia.gif" alt="Własne adresy" border=0></a></td>
	{/if}
	</tr>
	<tr>
	{if $strona==$USTAWIENIA}
		<td class="pad4"><img src="image/ustawienia1.gif" alt="Ustawienia" border=0></td>
	{else}
		<td class="pad4"><a href="{$DIR}?strona={$USTAWIENIA}"><img src="image/ustawienia.gif" alt="Ustawienia" border=0></a></td>
	{/if}
	</tr>
   <tr>
	{if $kto_zalogowany!=""}
   <td class="pad4">
	<a  href='{$DIR}?strona={$WYLOGUJ}'><img src="image/wyloguj.gif" alt="Wyloguj" border=0></a>
    </td>
	{/if}    
  </tr>
</table>
    </td>
