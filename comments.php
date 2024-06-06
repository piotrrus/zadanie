<?php
// contracts

// 0 => id, 2 => nazwa przedsiebiorcy, 4 => NIP, 10 => kwota,
$dg_bgcolor = "#fff"; //brak zdefiniowanej zmiennej

if (isset($_GET['akcja']) && $_GET['akcja'] == 5) {

    // show contracts with amount more than 10
    //co to jest ? $_GET[i] i czy jest tu potrzebne, skoro - show contracts! with amount more than 10? 
    //czy rzeczywiście powinniśmy filtrować po id skoro chcemy wszystkie kontrakty z kwotą powyżej 10,
    //a mamy WHERE id =x, czyli tylko pojedynczą pozycję
    $x = "id = {$_GET[i]} AND kwota > 10; ";

    switch ($_GET['sort']) {

        case 1:
            $sql_orderby = " order by 2, 4"; //sortowanie wg. nipu, ale ta wartość nie jest pokazywana w tabeli
            break;

        case 2:
            $sql_orderby = " order by 10"; //kwota nie powinna też być sortowana od najwiekszej? DESC
            break;
    }

    if ($sql_orderby == ' order by 2, 4')
        $b = 'DESC';

    $i = "SELECT * FROM contracts WHERE $x ORDER BY $sql_orderby $b";
    echo "<p>" . $i . "</p>";

    echo "<html><body bgcolor=$dg_bgcolor>";
    if ($z[10] > 5) //po co tu jest ten warunek, skoro kwerenda zwraca juz przefiltrowane dane
    {
        echo ' ';
        echo $z[10];

    }
    echo '</td><tr>';
    echo "<br>";

    echo "<table width=95%>";
    //Function 'mysql_fetch_array' has been removed and is available up to PHP 5
    // while ($z = mysql_fetch_array($a)) {

} else {
    $x = (isset($_GET['i'])) ? $_GET['i'] : ">0";
    // $x = "id = {$_GET[i]} ; "; //??
    $query = "SELECT * FROM contracts WHERE $x ORDER BY id";
    //Undefined variable $x in C:\xampp8\htdocs\zadanie\refactoring.php on line 40
    // zmienna $x jest poza warunkiem!
    //jesli pobieramy jedną daną  - WHERE $x - to sortowanie wg.id jest bez sensu - ORDER BY id"
    // $c = mysql_query("SELECT * FROM contracts WHERE $x ORDER BY id");
    echo $query;

    echo "<html><body bgcolor=$dg_bgcolor>";

    echo "<br>";

    echo "<table width=95%>";
}

echo '</table></body></html>';