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
        foreach(Opening::getRarityList() as $val){
            foreach (Opening::getExteriorList() as $ext){
                $query = (new \yii\db\Query())->select(['*'])->from('item')->where(['rarity' => $val['name'], 'exterior'=> $ext['name']]);
                $raw = $query->createCommand()->getRawSql();
                $command = $query->createCommand();
                $data = $command->queryAll();
                if(!empty($data)){
                    foreach($data as $item){
                        $cases[] = $item['id'];
                    }
                  //  $cases[] = $data[mt_rand(0, count($data)-1)]['id'];
                }
            }

        }
        return $cases;

    }


    public function create()
    {
        $cases = self::getCase();
        $ids = array_merge($cases, $this->model->item_ids);
        foreach($ids as $item){
            $model = new OpeningItemInit();

            $model->case_id = $this->model->id;
            $model->item_id = $item;
            $model->price = $this->model->price;

            $model->save(false);

        }
    }
}