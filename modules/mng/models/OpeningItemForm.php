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


    public function create()
    {
       
        foreach($this->model->item_ids as $item){
            $model = new OpeningItemInit();
            $model->case_id = $this->model->id;
            $model->item_id = $item;
            $model->price = $this->model->price;
            $model->save(false);

        }
    }
}