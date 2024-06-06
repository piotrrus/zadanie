<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    </meta>
    <title>Contracts</title>
</head>

<body>
    <div class="container">
        <?php
        include 'app.php';
        $contracts = new \App\Controllers\ContractsController;
        ?>
        <h2>Kontrakty</h2>
        <br>
        <table class="simple-table">
            <?php
            echo $contracts->printTable();
            ?>
        </table>

    </div>
</body>

</html>