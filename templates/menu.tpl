{* smarty *}
<table width="881" border="0" align="center" cellpadding="0" cellspacing="0" class="bor1">
  <tr>
    <td width="200" valign="top"><img src="img/layout/spacer.gif" alt="" width="200" height="1" border="0" />
  <table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><img src="img/layout/spacer.gif" alt="" width="200" height="20" border="0" />
				{if $kto_zalogowany!=""}

				<span style="margin-left:22px"><a  href='{$DIR}?strona={$WYLOGUJ}'><img   src="img/layout/img_wyloguj.gif" /></a></span>

				{/if}    
    </td>
  </tr>
  {section name=kat loop=$menu}
  <tr>
    <td width="30" align="center" valign="middle"><img src="img/layout/arrow_right.gif" alt="" width="7" height="7" border="0" /></td>
  <td width="170"><a href="{$DIR}?strona={$page_number[kat]}">{$menu[kat]}</a></td>
  </tr>
  {/section}
</table>
    </td>
