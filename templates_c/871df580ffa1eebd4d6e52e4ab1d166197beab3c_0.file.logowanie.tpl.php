<?php
/* Smarty version 4.1.0, created on 2022-03-06 21:22:48
  from '/home/dev/public_html/mailing/templates/logowanie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62252628aa9f19_29478373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '871df580ffa1eebd4d6e52e4ab1d166197beab3c' => 
    array (
      0 => '/home/dev/public_html/mailing/templates/logowanie.tpl',
      1 => 1646601066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_zalogowany.tpl' => 1,
  ),
),false)) {
function content_62252628aa9f19_29478373 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:menu_zalogowany.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <td width="500" valign="top" class="pad1 bor2">
  <h2><?php echo $_smarty_tpl->tpl_vars['word']->value['log_log'];?>
</h2>
  <table width="500"  border="1" cellspacing="0" cellpadding="0">
  <tr>
  	<td  class="pad7 bg4">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<form name='form_log' action='<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['LOGOWANIE']->value;?>
&nr=<?php echo $_smarty_tpl->tpl_vars['nr']->value;?>
' method='post'>
	<?php if ($_smarty_tpl->tpl_vars['valid']->value['blad_logow_login'] != '') {?>

	<p><?php echo $_smarty_tpl->tpl_vars['valid']->value['blad_logow_login'];?>
</p>

	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['valid']->value['blad_logow_baza'] != '') {?>

	<p><?php echo $_smarty_tpl->tpl_vars['valid']->value['blad_logow_baza'];?>
</p>

	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['valid']->value['nie_zatwierdz'] != '') {?>

	<p><?php echo $_smarty_tpl->tpl_vars['valid']->value['nie_zatwierdz'];?>
</p>

	<?php }?>
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
<?php }
}
