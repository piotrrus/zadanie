# ogólnie
Oba zadania zostały połączone, ze względu na użycie kilku wspólnych skryptów.
Architektura obu aplikacji zostala oparta o wzorzec MVC, struktura na popularnych frameworkach.

W pliku Config/config.php zotały zapisane ustawienia dla bazy danych i aplikacji.

Zaprojektowana została baza danych, utworzone tabele clients, contracts, invoices, payments oraz invoices details.
Tabele zostały wypełnione przykładowymi danymi, dane dot. nr konta bankowego zostały pobrane ze strony http://randomiban.com/?country=Poland.

Dołaczony został plik bazy danych contracts.sql.

W folderze public zostały umieszczone pliki javascript i style.

Sortowanie tabel i filtrowanie zostało wykonane przy użyciu zewnętrznej biblioteki jquery.dataTables.js.

Dodane zostało proste stylowanie i menu, żeby można było łatiwej poruszać się pp aplikacji.
Stylowanie jest wspólne dla obu zadań.

Do utowrzenia kodu i jego sfromatowania wykorzystano Visual Studio Code.

W opisie brak informacji na temat powiązań pomiędzy tabelami:
pozycje faktury - brak id faktury
płatnosci - brak id faktury, id klienta

# 2. zadanie 
W pliku comments.php zostały dołaczone moje komentarze do kodu.
Oddzielona została warstwa prezentacja (widoku) od warstwy logiki.

<html><body bgcolor=$dg_bgcolor> - stylowanie przeniesione do pliku css.
<table width=95%> - podobnie - wykorzystano container
$i = "SELECT * FROM contracts WHERE $x ORDER BY $sql_orderby $b"; - wszystkie zapytania przenoiesione zostały do modelu, podobnie jak sortowanie

$c = mysql_query("SELECT * FROM contracts WHERE $x ORDER BY id"); - zmienna $x została ummieszczona poza warunkiem
  
Przykladowe wyniki zapytań do bazy wraz z kodem sql oraz podaną ścieżka:

http://www.localhost/zadanie/contracts.php
SELECT id, name, nip, amount FROM contracts order by id
[0]=>
  array(4) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(9) "Firma ABC"
    ["nip"]=>
    string(10) "1112485256"
    ["amount"]=>
    string(3) "6.0"
  }
  [1]=>
  array(4) {
    ["id"]=>
    int(2)
    ["name"]=>
    string(12) "Z recyckling"
    ["nip"]=>
    string(10) "3413266254"
    ["amount"]=>
    string(3) "5.0"
  }
  [2]=>
  array(4) {
    ["id"]=>
    int(3)
    ["name"]=>
    string(4) "XYZ "
    ["nip"]=>
    string(10) "5329155435"
    ["amount"]=>
    string(3) "2.0"
  }
  [3]=>
  array(4) {
    ["id"]=>
    int(4)
    ["name"]=>
    string(11) "Nowa Ziemia"
    ["nip"]=>
    string(10) "3791673121"
    ["amount"]=>
    string(6) "5000.0"
  }
  [4]=>
  array(4) {
    ["id"]=>
    int(5)
    ["name"]=>
    string(13) "Anna Kowalska"
    ["nip"]=>
    string(10) "8237725286"
    ["amount"]=>
    string(6) "1000.0"
  }

http://www.localhost/zadanie/contracts.php?akcja=5
SELECT id, name, nip, amount FROM contracts WHERE amount > 10 order by 2, 4 DESC

  [0]=>
  array(4) {
    ["id"]=>
    int(5)
    ["name"]=>
    string(13) "Anna Kowalska"
    ["nip"]=>
    string(10) "8237725286"
    ["amount"]=>
    string(6) "1000.0"
  }
  [1]=>
  array(4) {
    ["id"]=>
    int(4)
    ["name"]=>
    string(11) "Nowa Ziemia"
    ["nip"]=>
    string(10) "3791673121"
    ["amount"]=>
    string(6) "5000.0"
  }

http://www.localhost/zadanie/contracts.php?akcja=5&sort=1
SELECT id, name, nip, amount FROM contracts WHERE amount > 10 order by 2, 4 DESC

http://www.localhost/zadanie/contracts.php?akcja=5&sort=2
SELECT id, name, nip, amount FROM contracts WHERE amount > 10 order by amount

[0]=>
  array(4) {
    ["id"]=>
    int(5)
    ["name"]=>
    string(13) "Anna Kowalska"
    ["nip"]=>
    string(10) "8237725286"
    ["amount"]=>
    string(6) "1000.0"
  }
  [1]=>
  array(4) {
    ["id"]=>
    int(4)
    ["name"]=>
    string(11) "Nowa Ziemia"
    ["nip"]=>
    string(10) "3791673121"
    ["amount"]=>
    string(6) "5000.0"


