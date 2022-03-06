<?php
/* Smarty version 4.1.0, created on 2022-03-06 21:00:25
  from 'C:\xampp\htdocs\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_622512d9347b48_55830662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df1d40a0bf0365f1e3ef5a39dc9c4a565e75319c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\index.tpl',
      1 => 1478190284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_622512d9347b48_55830662 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type='text/javascript' language='JavaScript' src='js/ustaw.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript">

<!--
function zaznacz() {
  tak *=-1;
  d=document.form1;
  for (i=0;i<d.elements.length;i++) {
    if (d.elements[i].type=="checkbox") {
      if (tak==1) d.elements[i].checked=true;
        else d.elements[i].checked=false;
    }
  }
}
tak=-1;
// -->
<!-- 
function wyslij()
  {
  var w = document.myform.mylist.selectedIndex;
  var dodaj_url = document.myform.mylist.options[w].value;
  window.location.href = dodaj_url;
	}
-->

<?php echo '</script'; ?>
>


</head>

<body>
<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['main']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>	
<?php if ($_smarty_tpl->tpl_vars['strona']->value != "14") {?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php if ($_smarty_tpl->tpl_vars['kto_zalogowany']->value != '') {?>
  <tr>
    <td align="center" class="stopka">
    Zalogowany użytkownik: <?php echo $_smarty_tpl->tpl_vars['kto_zalogowany']->value;?>
<br><br>
    <a href="<?php echo $_smarty_tpl->tpl_vars['DIR']->value;?>
?strona=<?php echo $_smarty_tpl->tpl_vars['POMOC']->value;?>
">POMOC</a>
    </td>
  </tr>
  <?php }?>
  <tr>
    <td align="center" class="stopka" height="5"></td>
  </tr>
  <tr>
    <td align="center" class="stopka">Mailing Service Panel v. <?php echo $_smarty_tpl->tpl_vars['ver']->value;?>
 © 2008-2010 (<?php echo $_smarty_tpl->tpl_vars['build']->value;?>
)</td>
  </tr>
</table>
<?php } else { ?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php if ($_smarty_tpl->tpl_vars['kto_zalogowany']->value != '') {?>
  <tr>
    <td align="center" class="stopka">
    Zalogowany użytkownik: <?php echo $_smarty_tpl->tpl_vars['kto_zalogowany']->value;?>
<br><br>
    </td>
  </tr>
  <?php }?>
  <tr>
    <td align="center" class="stopka" height="5"></td>
  </tr>
  <tr>
    <td align="center" class="stopka"> Wydruk z programu Mailing Service Panel v. <?php echo $_smarty_tpl->tpl_vars['ver']->value;?>
 © 2008-2010 (<?php echo $_smarty_tpl->tpl_vars['build']->value;?>
)</td>
  </tr>
</table>
<?php }?>
</body>
</html>
<?php }
}
