{include file="menu_zalogowany.tpl"}
<td width="1000" valign="top" class="pad1 bor2">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left" class="pad3 bg1 border3 tyt1"><span class="tyt1"><strong style="color: white">Tematy pomocy</strong></span>
			 </td>
		</tr>
		<tr>
			<td align="left" class="pad3 border2">
			<strong>Jak przygotować pliki CSV z programu Outlook Express 6?</strong>
          <br /><br />
			 Aby stworzyc plik CSV w programie Outlook Express 6 wybieramy z menu Plik > Eksportuj wybieramy "Książka adresowa".
			 W otwartym oknie wybieramy "Plik tekstowy w formacie CSV" i klikamy "Eksportuj". 
			 Następnie wybieramy plik do zapisu i przyciskamy "Dalej". W otwartym oknie koniecznie zaznaczamy sześć pierwszych pozycji 
			 (Imię, Nazwisko, Drugie imię, Nazwa, Przydomek, Adres e-mail). Wartość następnych pozycji jest nie istotna można zostawić 
			 je zaznaczone lub nie. Następnie klikamy "Zakończ". Jeżeli wykonaliśmy wszystko poprawnie powinien ukazać się komunikat "Proces eksportowania książki adresowej został zakończony."
			 <br /><br />
			<strong>Jak przygotować pliki CSV z programu Mozilla Thunderbird?</strong>
          <br /><br />
			 Aby stworzyć plik CSV w programie Mozilla Thunderbird wybieramy z menu Narzędzia "Książka adresowa".
			 W otwartym oknie wybieramy z lewego menu książkę adresową która chcemy eksportować i z menu Narzędzia wybieramy "Eksportuj" 
			 Następnie wybieramy plik do zapisu, a w otwartym oknie na dole z menu "Zapisz jako typ" wybieramy "Rozdzielony przecinkami" i klikamy "Zapisz".
			 <br /><br />
			<strong>Jak przygotować pliki CSV z programu The Bat?</strong>
          <br /><br />
			 Aby stworzyć plik CSV w programie Mozilla The Bat wybieramy z menu Narzędzia "Książka adresowa".
			 W otwartym oknie wybieramy które kontakty chcemy wyeksportować. Z menu "Plik" wybieramy "Eksportuj do" a następnie "Plik CSV".
			 W otwartym oknie wybieramy nazwę pliku i klikamy "Zapisz".
			 <br /><br />
			<strong>Jak przygotować pliki CSV z programu Excel?</strong>
          <br /><br />
			 Aby stworzyć plik CSV w programie Excel wpisujemy dane w trzech kolumnach, pierwsza z nich to Adres email druga Nazwa a trzecia Firma.
			 Nie tworzymy żadnych nazw kolumn ani opisów. Zaczynamy wprowadzanie danych od pierwszego wiersza. Wymagane jest pole email. Dwa pozostałe nie są konieczne.
			 Po zakończeniu edycji pliku wybieramy z menu "Plik" polecenie "Zapisz jako" i zapisujemy jako plik CSV rozdzielony przecinkami.<br>
			 Można także w programie Notepad przygotować taki plik. Zasada jest ta sama. Każdy wiersz zawiera trzy pola oddzielone znakiem ";". Poniżej można obejrzeć plik przykładowy.<br><br>
			 <a href="{$FILED}import/plik_przykladowy.csv">plik przykładowy</a>
			 <br /><br />
			<strong>Kodowanie znaków plików html (biuletyny)</strong>
          <br /><br />
			 Każdy wysyłany biuletyn musi mieć określone kodowanie znaków. Określone jest ono w nagłówku HEAD pliku html. Obecna wersja obsługuje najbardziej popularne kodowanie polskich znaków: UTF-8 oraz ISO-8859-2. Przed wysłaniem biuletynu sprawdź w kodzie deklaracje kodowania znaków. Powinna się ona znajdować w sekcji META. Przykład: <code><i>meta http-equiv="Content-Type" content="text/html; charset=utf-8"</i></code>. W trakcie wysyłania biuletynu należy ustawić odpowiednie kodowanie.
			 <br /><br />
     </td>
		</tr>
		<tr>
			<td><img src="pix/pix.gif" alt="" width="1" height="10" border="0" /></td>
		</tr>
		<tr>
			<td align="right" class="pad3 border2"><a href="javascript:history.back()">wróć </a></td>
		</tr>
	</table>
</td>
