<?php

class SqlExport
{

    /**
     * [[exporta a csv o excel. solo permite consultas SELECT.]]
     * @param $sql
     * @param $typeArchive
     * @throws Exception
     */

    public function exportQuery($sql, $typeArchive)
    {
        $db = MysqliDb::getInstance();
        $query = $db->rawQuery($sql);
        if ($query) {
            if ($typeArchive == 1) {
                self::buildCSV($query);
            } else if ($typeArchive == 2) {
                self::buildXLS($query);
            }

        }else{
            throw new Exception('error when querying the database.');
        }
        $db->disconnect();
    }

    function buildCSV($query)
    {
        $f = fopen('php://memory', 'w');
        $isPrintHeader = false;
        $filename = "file_" . date('Y-m-d') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        foreach ($query as $row) {
            if (!$isPrintHeader) {
                fputcsv($f, array_keys($row), ';');
                $isPrintHeader = true;
            }
            fputcsv($f, $row, ';');
        }
        fseek($f, 0);
        fpassthru($f);
    }


    function buildXLS($query)
    {
        $isPrintHeader = false;
        $filename = "file_excel" . date('Y-m-d') . ".xls";
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        foreach ($query as $row) {
            if (!$isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }

}
