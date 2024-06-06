<?php
namespace App\Controllers;


class ReportsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->index();
    }
    public function index()
    {
        $reportsTable = new \App\Helpers\ReportsTable();
        $reportType = parent::getRequest('type') ? parent::getRequest('type') : 1;
        $reportsList = $this->getReportData($reportType);
        $tableCols = $reportsTable::TABLE_COLUMNS;
        $sortpath = 'index.php?action=reports&type=' . $reportType;

        $properties = [
            'search' => (count($reportsList) < 11) ? false : true,
            'dataAmount' => count($reportsList),
            'tableData' => $reportsTable->printTable($reportsList),
            'tableColumns' => $this->html->table_cols2($tableCols, $sortpath),
            'title' => "Raport",
            'description' => $reportsTable->getReportName($reportType)
        ];
        echo $this->view->render('common/index', $properties);
    }

    private function getReportData(int $reportType): array
    {
        $reports = new \App\Models\Reports();

        switch ($reportType) {
            case 0:
                $reportsList = $reports->afterDeadlineReport();
                break;
            case 1:
                $reportsList = $reports->notPaidReport();
                break;
            case 2:
                $reportsList = $reports->surplusReport();
                break;
            default:
                $reportsList = $reports->afterDeadlineReport();
                break;
        }

        return $reportsList;

    }
}