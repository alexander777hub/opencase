<?php


namespace app\models;

/**
 * Class JsonExecutor
 * @package app\models
 */
class JsonExecutor implements Executor
{

    public function save(UsersItem $item)
    {
        if ($this->checkUniqueFio($item)) {
            $rows_item = array_combine(['id', 'first_name', 'second_name', 'soname', 'email', 'phone'],
                [intval(round(microtime(true))), $item->first_name, $item->second_name,
                 $item->soname, $item->email, $item->phone]);

            $fp = fopen('json/' .  intval(round(microtime(true))) . '.json', 'w');
            fwrite($fp, json_encode($rows_item, JSON_PRETTY_PRINT));
            fclose($fp);
            return [
                'status' => 'ok',
            ];
        } else {
            return [
                'error' => 'FIO should be unique',
            ];
        }

    }

    public function getAll()
    {
        $dir   = "json/";
        $arr   = [];
        $files = scandir($dir);
        foreach ($files as $file) {
            if (!empty($file) && !is_dir($file)) {
                $json    = file_get_contents($dir . $file);
                $decoded = json_decode($json, true);
                $arr[]   = $decoded;
            }
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