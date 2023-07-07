<?php


namespace app\models;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Class XslxExecutor
 * @package app\models
 */
class XslxExecutor implements Executor
{

    public function save(UsersItem $item)
    {
        if ($this->checkUniqueFio($item)) {
            $rows      = [];
            $rows_item = array_combine(['id', 'first_name',
                                        'second_name', 'soname', 'email', 'phone'],
                [ intval(round(microtime(true))), $item->first_name, $item->second_name, $item->soname, $item->email, $item->phone]);
            $rows[]    = $rows_item;
            $keys      = array_keys($rows[0]);
            $formats   = ['B' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_00];
            $this->writeXLSX(strval($rows[0]['id']) . '.xlsx', $rows, $keys, $formats);
            return [
                'status' => 'ok',
            ];
        } else {
            return [
                'error' => 'FIO shold be unuque'
            ];
        }

    }

    public function writeXLSX($filename, $rows, $keys = [], $formats = []) {

        $doc = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $doc->getActiveSheet();
        if ($keys) {
            $offset = 2;
        } else {
            $offset = 1;
        }
        $i = 0;
        foreach($rows as $row) {
            $doc->getActiveSheet()->fromArray($row, null, 'A' . ($i++ + $offset));
        }
        if ($keys) {
            $doc->setActiveSheetIndex(0);
            $doc->getActiveSheet()->fromArray($keys, null, 'A1');
        }
        $last_column = $doc->getActiveSheet()->getHighestColumn();
        $last_row = $doc->getActiveSheet()->getHighestRow();
        for ($i = 'A'; $i <= $last_column; $i++) {
            $doc->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }

        if ($keys) {
            $doc->getActiveSheet()->freezePane('A2');
            $doc->getActiveSheet()->getStyle('A1:' . $last_column . '1')->getFont()->setBold(true);
        }

        $doc->getActiveSheet()->getStyle('A2:' . $last_column . $last_row)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        if ($formats) {

            foreach ($formats as $col => $format) {
                $doc->getActiveSheet()->getStyle($col . $offset . ':' . $col . $last_row)->getNumberFormat()->setFormatCode($format);
            }
        }
        $writer = new Xlsx($doc);
        $writer->save('xlsx/' . $filename);
    }
    public function getAll()
    {
        $dir   = "xlsx/";
        $arr   = [];
        $files = scandir($dir);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        foreach ($files as $file) {
            if (!empty($file) && !is_dir($file)) {
                $spreadsheet = $reader->load($dir . $file);
                $sheet       = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
                $data        = $sheet->toArray();
                if (isset($data[0]) && isset($data[1])) {
                    $item  = array_combine($data[0], $data[1]);
                    $arr[] = $item;
                }
                $sheet->disconnectCells();
            }
        }
        if($reader){
            $reader = null;
        }
        return $arr;
    }
    public function checkUniqueFio(UsersItem $item)
    {
        $records = $this->getAll();
        if (!empty($records)) {
            foreach ($records as $record){
                if ($record["first_name"] == $item->first_name &&
                    $record["second_name"] == $item->second_name &&
                    $record["soname"] == $item->soname) {
                    return false;
                }
            }
        }
        return true;

    }
}