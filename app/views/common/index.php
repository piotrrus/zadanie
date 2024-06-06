<h2><?= $title ?>
    <?= isset($description) ? $description : ''; ?>
</h2>
<hr>

<?php
use App\Library\Template;
use App\Library\ErrorMessage;
use App\Library\Request;

$message = new ErrorMessage();
$template = new Template();
$request = new Request();

if ($request->get('action') === 'reports') {
    include 'App/views/common/report_menu.php';
}

if ($dataAmount > 0) {
    $newTable = [
        'tableName' => 'common',
        'tableData' => $tableData,
        'cols' => $tableColumns,
        'search' => true,
        'scroll' => false,
    ];
    echo $template->render('common/table_tpl_js', $newTable);
} else {
    echo $message::dataNotFoundMsg();
}
