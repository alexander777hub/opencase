<?php


namespace app\models;

/**
 * Class AdsManager
 * @package app\models
 */
class AdsManager extends Manager
{

    public $searchModel;

    public function __construct($searchModel)
    {
        $this->searchModel = $searchModel;
    }

    public function getAll($params)
    {

        $dataProvider = $this->searchModel->search($params);
        $q= $dataProvider->query->createCommand()->getRawSql();
        foreach ($dataProvider->getModels() as &$model) {
           /* $model->link     = Profile::find()->where(['user_id' => $model->user_id])->one() ? Profile::find()->where(['user_id' => $model->user_id])->one()->vk_link : null;
            $model->username = Profile::find()->where(['user_id' => $model->user_id])->one() ? Profile::find()->where(['user_id' => $model->user_id])->one()->name : null;
            $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null; */
            $model->status_name = isset(Ad::getStatusList()[$model->status]) ? Ad::getStatusList()[$model->status] : ' ';
        }
        return $dataProvider;

    }


    public static function getOne($model)
    {
        // TODO: Implement getOne() method.
    }
}