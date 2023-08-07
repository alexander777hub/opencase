<?php


namespace app\modules\mng\models;

use yii\base\BaseObject;
use yii\base\Model;

/**
 * Class OpeningItemForm
 *
 * @package app\modules\mng\models
 */
class OpeningItemForm extends BaseObject
{
    public Opening $model;
    public function __construct($config = [])
    {
        $this->model = $config;
    }
    public static function getCase()
    {
        $cases = [];
        $cases_random = [];
        $sql = [];
        foreach (Opening::getRarityList() as $k => $val) {
            foreach (Opening::getExteriorList() as $ext) {
                $query = (new \yii\db\Query())->select(['*'])->from('item')->where(['rarity' => $val['name'], 'exterior' => $ext['name']]);
                $raw = $query->createCommand()->getRawSql();

                $command = $query->createCommand();
                $data = $command->queryAll();
                if (!empty($data)) {
                    foreach ($data as $item) {
                        $cases[$val['name']][$ext['name']][] = $item['id'];
                    }


                }
            }
        }
        $cases_random = [];
        foreach($cases as $k => $case){
            $c = $case;
            foreach ($case as $r => &$item){
                shuffle($item);
                foreach ($item as $key => $value){
                    if($key == 10){
                        break;
                    }
                    $cases_random[$k][$r][] = $value;
                }
            }
        }


        $final_case = [];
        foreach($cases_random as $rarity => $exteriors){
            foreach($exteriors as $ext){
                foreach($ext as $id) {
                    $final_case[] = $id;
                }
            }
        }


        $f = $final_case;
        return $final_case;

    }


    public function create()
    {
        $cases = self::getCase();
        $ids = array_unique(array_merge($cases, $this->model->item_ids));
        foreach($ids as $item){
            $model = new OpeningItemInit();

            $model->case_id = $this->model->id;
            $model->item_id = $item;
            $model->price = $this->model->price;

            $model->save(false);

        }
    }
}