{include file="menu_zalogowany.tpl"}
<td width="681" valign="top" class="pad1 bor2">
	<form name='form_profil' enctype='multipart/form-data' action='{$DIR}?strona={$PROFIL_KANDYDAT}' method='post'>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
	<tr>
	<td colspan="2" align="left" class="bg4 tyt1 pad3 border3"><strong>Profil użytkownika </strong></td>
	</tr>
	 <tr>
	 <!--<tr>
          <td colspan="2" align="left" valign="top" class="bg5 pad11"><em>Możesz edytować Swoje dane osobiste, lecz z uwagi na to że są one polami wymaganymi, nie ma możliwości ich całkowitego usunięcia. W razie konieczności usunięcia profilu użytkownika prosimy o kontakt z <a href="{$DIR}?strona={$KONTAKT}">administratorem</a>.<br />
            <br />
            Dane personalne jak i kontaktowe ze względu na próby nadużytwania ich są ukryte dla innych użytkowników. Dane te będą ujawniane podczas deklaracji współpracy z użytkownikami zlecającymi zadania. Obecnie moduł zadań jest w przebudowie. </em></td>
        </tr>-->
   <tr>
   	<td height="30">
   	</td>
   </tr>
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Imię:</td>

	</tr>
	</tr>
	{if $valid.imie_litery!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.imie_litery}</td>

	</tr>
	{/if}
	{if $valid.p_imie!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_imie}</td>

	</tr>
	{/if}

	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="imie" type="text" class="input1" value='{$dane_user_u.imie}'/></td>

	</tr>

	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Nazwisko:</td>

	</tr>
	{if $valid.nazwisko_litery!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.nazwisko_litery}</td>

	</tr>
	{/if}
	{if $valid.p_nazwisko!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_nazwisko}</td>

	</tr>
	{/if}
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="nazwisko" type="text" class="input1" value='{$dane_user_u.nazwisko}'/></td>

	</tr>
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Numer telefonu: </td>

	</tr>
	{if $valid.p_telefon!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_telefon}</td>

	</tr>
	{/if}
	{if $valid.telefon!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.telefon}</td>

	</tr>
	{/if}
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="telefon" type="text" class="input1" value='{$dane_user_u.telefon}' maxlength='12'/></td>

	</tr>
     <tr>
       <td width="50%" align="left" class="bg5 pad9">Telefon komórkowy </td>

     </tr>
	{if $valid.p_telefonk!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_telefonk}</td>

	</tr>
	{/if}
	{if $valid.telefonk!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.telefonk}</td>

	</tr>
	{/if}
     <tr>
       <td width="50%" align="left" class="bg5 pad9"><input name="telefon_kom" type="text" class="input1" value='{$dane_user_u.telefon_kom}' maxlength='12' /></td>

     </tr> 
	<!-- <tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Nazwa użytkownika: </td>
	<td width="50%" align="left" class="bg5 pad9"><em>Nadaj własną unikatową nazwę użytkownika po której będziesz identyfikowana/ny w telepraca.net </em></td>
	</tr>
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="nazwa_uzyt" type="text" class="input1" value='{$dane_user_u.nazwa_uzyt}' maxlength='20'/></td>
	<td width="50%" align="left" class="bg5 pad9"><img src="pix/pix.gif" alt="" width="1" height="1" border="0" /></td>
	</tr> -->
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><strong>Zmień hasło </strong></td>

	</tr>
	
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Stare hasło:</td>

	</tr>
	{if $valid.login_stare_haslo!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.login_stare_haslo}</td>

	</tr>
	{/if}
	{if $valid.podmiana_ok!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.podmiana_ok}</td>

	</tr>
	{/if}
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="haslo_stare" type="password" class="input1" /></td>

	</tr>
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Nowe hasło:</td>

	</tr>
	{if $valid.p_haslo!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_haslo}</td>

	</tr>
	{/if}
	{if $valid.haslo_rozne!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.haslo_rozne}</td>

	</tr>
	{/if}
	{if $valid.haslo_krotkie!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.haslo_krotkie}</td>

	</tr>
	{/if}
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="haslo_nowe1" type="password" class="input1" /></td>

	</tr>
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Powtórz hasło: </td>

	</tr>
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="haslo_nowe2" type="password" class="input1" /></td>

	</tr>
	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">E-mail:</td>

	</tr>
	{if $valid.p_email!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.p_email}</td>

	</tr>
	{/if}
	{if $valid.email_zly!="" }
	<tr>
		<td width="50%" align="left" valign="top" class="bg5 pad9 red">{$valid.email_zly}</td>

	</tr>
	{/if}
	<tr>
	<td width="50%" align="left" class="bg5 pad9"><input name="email" type="text" class="input1" value='{$dane_user_u.email}'/></td>

	</tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9">Ulica</td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9"><input name="ulica_k" type="text" class="input1" value='{$dane_user_u.ulica_k}' maxlength='21'/></td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9">Nr domu/mieszkania</td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9"><input name="numer_k" type="text" class="input1" value='{$dane_user_u.numer_k}' maxlength='21'/></td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9">Kod pocztowy</td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9"><input name="kod_k" type="text" class="input1" value='{$dane_user_u.kod_k}' maxlength='21'/></td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9">Miasto</td>
    </tr>
    <tr>
       <td width="50%" align="left" class="bg5 pad9"><input name="miasto_k" type="text" class="input1" value='{$dane_user_u.miasto_k}' maxlength='21'/></td>
    </tr>
	 <tr>
	 	<td width="50%" align="left" class="bg5 pad9">Kraj</td>
	 </tr>
	 <tr>
	 	<td width="50%" align="left" class="bg5 pad9">
	 <select name="kraj_k">	
			{section name=kat_p loop=$dane_kraj}
				{if $dane_k_check.kraj_k==$dane_kraj[kat_p].nazwa}
					<option value='{$dane_kraj[kat_p].nazwa}' selected >{$dane_kraj[kat_p].nazwa}</option>
				{else}
					<option value='{$dane_kraj[kat_p].nazwa}'>{$dane_kraj[kat_p].nazwa}</option>
				{/if}
			{/section}
			</select>
		</td>
	 </tr>
     <tr>
     		<td width="50%" align="left" class="bg5 pad9">
     			Prawo jazdy kategoria<input type="text" name="kategoria_k" value='{$dane_user_u.kategoria_k}'>
     		</td>
     </tr>
     <tr>
     		<td width="50%" align="left" class="bg5 pad9">
     			Mogę przyjechać własnym samochodem (zwrot kosztów) {if $dane_auto.auto_k eq "tak"} <input type="checkbox" name="auto_k" value="tak" checked> {else} <input type="checkbox" name="auto_k" value="tak"> {/if}
     		</td>
     </tr>
     <tr>
     		<td width="50%" align="left" class="bg5 pad9">
     			Pracę w Norwegi mogę podjąć od <input type="text" name="praca_od_k" value='{$dane_user_u.praca_od_k}'>
     		</td>
     </tr
     <tr>
     		<td width="50%" align="left" class="bg5 pad9">
				Numer obuwia<br>
		<select name='obuwie_k'>
			{section name=kat_p loop=$dane_obuwie}
				{if $dane_obuwie_c.obuwie_k==$dane_obuwie[kat_p].nazwa}
					<option value='{$dane_obuwie[kat_p].nazwa}' selected >{$dane_obuwie[kat_p].nazwa}</option>
				{else}
					<option value='{$dane_obuwie[kat_p].nazwa}'>{$dane_obuwie[kat_p].nazwa}</option>
				{/if}
			{/section}
		</select><br>
		Numer ubrania roboczego<br>
		<select name='ubranie_k'>
			{section name=kat_p loop=$dane_ubranie}
				{if $dane_ubranie_c.ubranie_k==$dane_ubranie[kat_p].nazwa}
					<option value='{$dane_ubranie[kat_p].nazwa}' selected >{$dane_ubranie[kat_p].nazwa}</option>
				{else}
					<option value='{$dane_ubranie[kat_p].nazwa}'>{$dane_ubranie[kat_p].nazwa}</option>
				{/if}
			{/section}
		</select>
     		</td>
     </tr>
{*	<tr>
	<td width="50%" align="left" valign="top" class="bg5 pad9">Kategoria:</td>
	<td width="50%" align="left" class="bg5 pad9"><em>Wybierz kategorię odzwierciedlającą Twój zawód, specjalizację lub wykształcenie </em></td>
	</tr>
	<tr>
		<td width="50%" align="left" class="bg5 pad9"><select name='kategoria'>
			{section name=kat_p loop=$dane_kat_pro}
				{if $dane_k_check.id_kategoria==$dane_kat_pro[kat_p].id}
					<option value='{$dane_kat_pro[kat_p].id}' selected >{$dane_kat_pro[kat_p].name}</option>
				{else}
					<option value='{$dane_kat_pro[kat_p].id}'>{$dane_kat_pro[kat_p].name}</option>
				{/if}
			{/section}
			</select>
		</td>
		<td width="50%" align="left" class="bg5 pad9"><img src="pix/pix.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>
	<tr>
		<td colspan="2"align="left" class="pad1"><strong>Prezentacja użytkownika. </strong> <br />
		<span class="green">Aby opublikować profil w serwisie należy wypełnić przynajmniej dwa poniższe pola prezentacyjne.</span> </td>
        </tr>
	<tr>
		<td colspan="2" align="left" class="pad9"><strong>Dodaj</strong> zdjęcie, logo, grafikę, aby pełniej zaprezentować siebie <br />
		w profilu użytkownika. Format zdjęcia wymagany to <strong>96x96 pixeli</strong> </td>
	</tr>
	<tr>
		<td width="50%" align="left" valign="top" class="pad9"><input name="file" type="file" class="input1" /></td>
		<td width="50%" align="center" valign="top" class="pad9">
			{if $dane_user_p.rozmiar!=0}
				<img alt="Foto" name="img" width="96" height="96" id="img" src="{$dane_user_p.zdjecie}" />
			{else}
				<img alt="Foto" name="img" width="96" height="96" id="img" src="{$file}/img_static_user.gif" />
			{/if}
		</td>    
	</tr>
	<tr>
		<td width="50%" align="left" class="pad9"><img src="pix/pix.gif" alt="" width="1" height="1" border="0" /></td>
		<td align="center" valign="top" class="pad9">
			{if $dane_user_p.rozmiar!=0}
				<input type='hidden' name='usun'>
				<!-- <input type="image" value='zdjęcie' name="submit_usun" src="pix/b_usun.gif" /> -->
				<img src="pix/b_usun.gif" onclick='submit_usun()' />
			{else}
				<input type='hidden' name='dodaj'>
				<!-- <input type="image" value='zdjęcie' name="submit_dodaj" src="pix/b_dodaj.gif" /> -->
				<img  src="pix/b_dodaj.gif" onclick='submit_dodaj()' />
			{/if}

		</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad1"><em>Opcje tagów HTML i innych są wyłączone. Jeżeli chcesz podzielić się linkiem do strony www, wpisz poprostu: www.adres_przykladowy.pl </em></td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9">O mnie</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9"><textarea name="o_mnie" class="input5">{$dane_user_p.o_mnie}</textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9">Umiejętności</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9"><textarea name="certyfikaty" class="input5">{$dane_user_p.certyfikaty}</textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9">Referencje</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9"><textarea name="referencje" class="input5">{$dane_user_p.referencje}</textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9">Dodatkowe informacje</td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="pad9"><textarea name="licencje" class="input5">{$dane_user_p.licencje}</textarea></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="pad9"><input type="checkbox" name="czy_publiczny" value="1" {$checked_publiczny} />
		Publikuj profil <br/>
		{if $valid.dwa_pola!="" }
			<p  align="left" valign="top" class="pad9 red">{$valid.dwa_pola}</p>
		{/if}
		
		</td>

		<td width="50%" align="left" class="pad9"><span class="green"><em>Zaznaczając opcję &quot;Publikuj profil&quot;, zezwalasz na publiczne opublikowanie profilu w serwisie. Dzieki temu inni użytkownicy będą mogli Cię odnaleĽć i dodać Cię do kontaktów i wysłać wiadomość.
		</em></span><br />
		<span class="green"><em><br />
		Pozostawiając puste pole &quot;Publikuj profil&quot; profil nie jest widoczny na stronie internetowej jak również dane użytkownika z profilu.</em></span></td>
        </tr> *}
		<!-- <tr>
			<td align="left" class="pad4"><input name="czy_news" type="checkbox" value="1" {$checked_news} />
			  Chcę otrzymywać informację o nowych zadaniach w serwisie </td>
		</tr>
		<tr>
			<td align="left" class="pad4"><input name="czy_biuletyn" type="checkbox" value="1" {$checked_biul} />
			  Chcę otrzymywać biuletyn serwisu (nowości, ciekawostki itd) </td>
		</tr> -->
	<tr>
	<td colspan="2" align="center" class="pad1">
	<input type='hidden' name='profil'>
	<!-- <input type="image" value='aktualizuj' name="submit_profil" src="pix/b_uaktualnij.gif" /> -->
	<img  src="pix/b_uaktualnij.gif" onclick='submit_profil()' />
	<a href="/"></a> 
	</td>
	</tr>
	</table>
	</form>
</td>
