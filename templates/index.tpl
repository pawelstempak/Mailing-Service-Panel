{* smarty *}
<html>
<head>
<title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' language='JavaScript' src='js/ustaw.js'></script>
<script language="javascript" type="text/javascript">
{literal}
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

</script>
{/literal}
{* <script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,

	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
});
</script>
*}

</head>

<body>
{include file="$main"}	
{if $strona != "14"}
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
	{if $kto_zalogowany != ""}
  <tr>
    <td align="center" class="stopka">
    Zalogowany użytkownik: {$kto_zalogowany}<br><br>
    <a href="{$DIR}?strona={$POMOC}">POMOC</a>
    </td>
  </tr>
  {/if}
  <tr>
    <td align="center" class="stopka" height="5"></td>
  </tr>
  <tr>
    <td align="center" class="stopka">Mailing Service Panel v. {$ver} © 2008-2010 ({$build})</td>
  </tr>
</table>
{else}
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
	{if $kto_zalogowany != ""}
  <tr>
    <td align="center" class="stopka">
    Zalogowany użytkownik: {$kto_zalogowany}<br><br>
    </td>
  </tr>
  {/if}
  <tr>
    <td align="center" class="stopka" height="5"></td>
  </tr>
  <tr>
    <td align="center" class="stopka"> Wydruk z programu Mailing Service Panel v. {$ver} © 2008-2010 ({$build})</td>
  </tr>
</table>
{/if}
</body>
</html>
