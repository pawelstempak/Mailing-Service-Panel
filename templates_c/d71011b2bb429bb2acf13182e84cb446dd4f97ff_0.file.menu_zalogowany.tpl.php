<?php
/* Smarty version 4.1.0, created on 2022-03-06 21:22:48
  from '/home/dev/public_html/mailing/templates/menu_zalogowany.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62252628ab68f1_03726157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd71011b2bb429bb2acf13182e84cb446dd4f97ff' => 
    array (
      0 => '/home/dev/public_html/mailing/templates/menu_zalogowany.tpl',
      1 => 1646601067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62252628ab68f1_03726157 (Smarty_Internal_Template $_smarty_tpl) {
?><table width="1200" border="0" align="center" cellpadding="0" cellspacing="0" class="bor1">
  <tr>
    <td width="70" valign="top">
  <table width="70" border="0" cellspacing="0" cellpadding="0">
  	<tr>
  		<td height="19px">
  		</td>
  	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['NOWA_WIADOMOSC']->value) {?>
		<td class="pad4"><img src="image/nowa1.gif" alt="Nowa wiadomość" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['NOWA_WIADOMOSC']->value;?>
"><img src="image/nowa.gif" alt="Nowa wiadomość" border=0></a></td>
	<?php }?>
	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['BIULETYN']->value) {?>
		<td class="pad4"><img src="image/biuletyn1.gif" alt="Biuletyn HTML" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['BIULETYN']->value;?>
"><img src="image/biuletyn.gif" alt="Biuletyn HTML" border=0></a></td>
	<?php }?>
	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['KONTAKTY']->value) {?>
		<td class="pad4"><img src="image/kontakty1.gif" alt="Kontakty" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['KONTAKTY']->value;?>
"><img src="image/kontakty.gif" alt="Kontakty" border=0></a></td>
	<?php }?>
	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['GRUPY']->value) {?>
		<td class="pad4"><img src="image/grupy1.gif" alt="Grupy" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['GRUPY']->value;?>
"><img src="image/grupy.gif" alt="Grupy" border=0></a></td>
	<?php }?>
	</tr>
   <tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['WLASNE']->value) {?>
		<td class="pad4"><img src="image/wlasne1.gif" alt="Własne adresy" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['WLASNE']->value;?>
"><img src="image/wlasne.gif" alt="Własne adresy" border=0></a></td>
	<?php }?>
	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['HISTORIA']->value) {?>
		<td class="pad4"><img src="image/historia1.gif" alt="Własne adresy" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['HISTORIA']->value;?>
"><img src="image/historia.gif" alt="Własne adresy" border=0></a></td>
	<?php }?>
	</tr>
	<tr>
	<?php if ($_smarty_tpl->tpl_vars['strona']->value == $_smarty_tpl->tpl_vars['USTAWIENIA']->value) {?>
		<td class="pad4"><img src="image/ustawienia1.gif" alt="Ustawienia" border=0></td>
	<?php } else { ?>
		<td class="pad4"><a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['USTAWIENIA']->value;?>
"><img src="image/ustawienia.gif" alt="Ustawienia" border=0></a></td>
	<?php }?>
	</tr>
   <tr>
	<?php if ($_smarty_tpl->tpl_vars['kto_zalogowany']->value != '') {?>
   <td class="pad4">
	<a  href='<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['WYLOGUJ']->value;?>
'><img src="image/wyloguj.gif" alt="Wyloguj" border=0></a>
    </td>
	<?php }?>    
  </tr>
</table>
    </td>
<?php }
}
