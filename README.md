# zadanie
Oba zadania zostały połączone, ze względu na użycie kilku wspólnych skryptów.
Architektura aplikacji zostala oparta o wzorzec MVC, struktura na popularnych frameworkach.

W folderze public zostały umieszczone pliki javascript i style.
W pliku Config/config.php zotały zapisane ustawienia dla bazy danych i aplikacji.

Zaprojektowana została baza danych, utworzone tabele clients, contracts, invoices, payments oraz invoices details.
Tabele zostały wypełnione przykładowymi danymi, dane dot. nr konta bankowego zostały pobrane ze strony http://randomiban.com/?country=Poland.
Dołaczony został plik contracts.sql.

Sortowanie tabel i wyszukiwanie zostało wykonane przy użyciu zewnętrznej biblioteki jquery.dataTables.js opartej na jQuery.

W pliku comments.php zostały dołaczone moje komentarze do kodu.
# 2. zadanie
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


