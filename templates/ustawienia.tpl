{* smarty*}
{include file="menu_zalogowany.tpl"}
{if $ver > 3}
<td width="681" valign="top" class="pad1 bor2">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td align="left" valign="top" class="pad9 bg4 white"  colspan="3">
		UŻYTKOWNICY			
		</td>
	</tr>
	</table>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	{if $action == "dodaj"}
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<form enctype='multipart/form-data' action='{$DIR}?strona={$USTAWIENIA}' method='post'>
		Login:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="login" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Imię:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="imie" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Nazwisko:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="nazwisko" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Email:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="email" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Hasło:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="haslo" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="submit" name="dodaj" value="Dodaj nowego">
		<button onclick="javascript:window.location='{$DIR}?strona={$USTAWIENIA}'">Anuluj</button>
		</td>
	</tr>
	</form>
	{elseif $action == "usun"}
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Czy na pewno chcesz usunąć tego użytkownika: <b>{$login_from_id}</b>?
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<a href="{$DIR}?strona={$USTAWIENIA}&action=delete&login={$login_user}" style="text-decoration: none"><img src="image/tak.gif" border="0"></a>
		<a href="{$DIR}?strona={$USTAWIENIA}" style="text-decoration: none"><img src="image/nie.gif" border="0"></a>
		</td>
	</tr>	
	{else}
	{if $kto_zalogowany=="admin"}
	<tr>
		<td width="50%">
	<table>
	<tr>
		<td align="left" valign="top" class="pad9"  colspan="3">
			<form name='form' enctype='multipart/form-data' action='{$DIR}?strona={$USTAWIENIA}' method='post'>
			Dane użytkownika: 
			<select name="user" class="input1" onChange="this.form.submit()">
			{section name=u loop=$users}
			{if $users[u].login == $wartosci.login}
			<option value="{$users[u].login}" selected>{$users[u].login} - {$users[u].imie} {$users[u].nazwisko}</option>
			{else}
			<option value="{$users[u].login}">{$users[u].login} - {$users[u].imie} {$users[u].nazwisko}</option>
			{/if}
			{/section}
			</select>
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad8"  colspan="3">
			<a href="{$DIR}?strona={$USTAWIENIA}&action=dodaj"><img src="image/dodaj.gif" border="0"></a>
			{if $wartosci.login != "admin"}
			<a href="{$DIR}?strona={$USTAWIENIA}&action=usun&login={$wartosci.id}" style="text-decoration: underline"><img src="image/usun.gif" border="0"></a>
			{/if}
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Login:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="login" value="{$wartosci.login}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Imię:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="imie" value="{$wartosci.imie}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Nazwisko:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="nazwisko" value="{$wartosci.nazwisko}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Email:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="email" value="{$wartosci.email}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Hasło:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="haslo" value="{$wartosci.haslo}" class="input1 border4">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="submit" name="zmien" value="aktualizuj">
		</td>
	</tr>
	</table>
		</td>
		<td valign="top">
		<table>
			<tr>
				<td height="10px">
				</td>
			</tr>
		</table>
	</form>
		</td>
	</tr>
	{else}
	<tr>
		<td width="50%">
	<table>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<form enctype='multipart/form-data' action='{$DIR}?strona={$USTAWIENIA}' method='post'>
		Dane użytkownika: {$wartosci.login} - {$wartosci.imie} {$wartosci.nazwisko}
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Login:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="login" value="{$wartosci.login}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Imię:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="imie" value="{$wartosci.imie}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Nazwisko:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="nazwisko" value="{$wartosci.nazwisko}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Email:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="email" value="{$wartosci.email}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Hasło:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="haslo" value="{$wartosci.haslo}" class="input1 border4">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="submit" name="zmien" value="aktualizuj">
		</td>
	</tr>
	</table>
		</td>
		<td valign="top">
		<table>
			<tr>
				<td height="10px">
				</td>
			</tr>
		</table>
	</form>
		</td>
	</tr>
	{/if}
	{/if}
	</table>
</td>
{else}
<td width="681" valign="top" class="pad1 bor2">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td align="left" valign="top" class="pad9 bg4 white"  colspan="3">
		UŻYTKOWNICY			
		</td>
	</tr>
	</table>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
		<td width="50%">
	<table>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<form enctype='multipart/form-data' action='{$DIR}?strona={$USTAWIENIA}' method='post'>
		Dane użytkownika: {$wartosci.login} - {$wartosci.imie} {$wartosci.nazwisko}
		<input type="hidden" name="user" value="{$wartosci.login}">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Login:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="login" value="{$wartosci.login}" class="input1" disabled>
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Imię:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="imie" value="{$wartosci.imie}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Nazwisko:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="nazwisko" value="{$wartosci.nazwisko}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Email:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="email" value="{$wartosci.email}" class="input1">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		Hasło:
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="text" name="haslo" value="{$wartosci.haslo}" class="input1 border4">
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9" colspan="3">
		<input type="submit" name="zmien" value="aktualizuj">
		</td>
	</tr>
	</table>
		</td>
		<td valign="top">
		<table>
			<tr>
				<td height="10px">
				</td>
			</tr>
		</table>
	</form>
		</td>
	</tr>
	</table>
</td>
{/if}
