<?php
$jssearch = "";
$jsscroll = "";
$paging = ", \"paging\": true";
$info = ", \"info\": false";

if ($search == false) {
    $jssearch = ", \"searching\": false,";
    $paging = ", \"paging\": false";
}
if ($scroll == true) {
    $jsscroll = ", \"scrollY\": \"450px\", \"scrollCollapse\": true,";
    $info = ", \"info\": true";
    $paging = ", \"paging\": false";
}
/*
if ($newTable['length'] && $newTable['length']<10){
    $jssearch = ", \"searching\": false,";
    $paging = ", \"paging\": false";
}*/

?>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#<?php echo $tableName ?>').dataTable({
            "bInfo": false,
            "bLengthChange": false
            <?php echo $info . PHP_EOL ?>
            <?php echo $paging . PHP_EOL ?>
            <?php echo $jssearch ?>
            <?php echo $jsscroll ?>
        });
    }
    );
</script>

<div class="container">
    <section>
        <table id="<?php echo $tableName; ?>" class="table table-striped table-borderless" class="table-full-width">
            <?php echo $cols; ?>
            <tbody>
                <?php echo $tableData; ?>
            </tbody>
        </table>
    </section>
</div>
<div class='clear h20'></div>