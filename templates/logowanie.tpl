{* smarty *}
{include file="menu_zalogowany.tpl"}
  <td width="500" valign="top" class="pad1 bor2">
  <h2>{$word.log_log}</h2>
  <table width="500"  border="1" cellspacing="0" cellpadding="0">
  <tr>
  	<td  class="pad7 bg4">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<form name='form_log' action='{$DIR}?strona={$LOGOWANIE}&nr={$nr}' method='post'>
	{if $valid.blad_logow_login!="" }

	<p>{$valid.blad_logow_login}</p>

	{/if}

	{if $valid.blad_logow_baza!="" }

	<p>{$valid.blad_logow_baza}</p>

	{/if}

	{if $valid.nie_zatwierdz!="" }

	<p>{$valid.nie_zatwierdz}</p>

	{/if}
  <tr>
    <td class="pad4 bg4" style="color: white; font-family: Trebuchet Ms; font-size: 12pt">Podaj login i hasło</td>
  </tr>
  <tr>
  <td  class="pad4 bg1">
		  <table cellpadding="0" cellspacing="0">
		  <tr>
		  	<td class="pad4 bg1" height="10">
		  	</td>
		  </tr>
		  <tr>
		    <td class="pad6 bg1" style="color: white; font-family: Trebuchet Ms">
		    Login:
		    </td>
		  </tr>
		  <tr>
		    <td class="pad4 bg1"><input name="login" type="text" class="input1" size="40" /></td>
		  </tr>
		  <tr>
		    <td class="pad6 bg1" style="color: white; font-family: Trebuchet Ms">Hasło:</td>
		  </tr>
		  <tr>
		    <td class="pad4 bg1"><input name="haslo1" type="password" class="input1" value="" size="40" /></td>
		  </tr>
		  <tr>
		    <td class="pad4 bg1"><input type='hidden' name='log'/>
		    <input type="submit" value="Zaloguj">
		    {*<input name="imageField" type="image" src="image/img_zaloguj.gif" width="80" height="32" border="0"  onclick='submit_log()' />*}
		    </td>
		  </tr>
		  </table>
  </td>
  <td class="pad4 bg1" align="left" width="40%">
  <img src="image/logo.png" alt="">
  </td>
  </tr>
</table>
</td>
  </tr>
</table>
  	</td>
  </tr>
  </table>
