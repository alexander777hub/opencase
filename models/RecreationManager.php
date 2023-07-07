<?php


namespace app\models;

use app\models\RecreationZoneSearch;

/**
 * Class RecreationManager
 * @package app\models
 */
class RecreationManager extends Manager
{

    public RecreationZoneSearch $searchModel;

    public function __construct(RecreationZoneSearch $searchModel)
    {
        $this->searchModel = $searchModel;
    }

    public function getAll($params)
    {

        $dataProvider = $this->searchModel->search($params);
        foreach ($dataProvider->getModels() as &$model) {
            $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
            $model->type_name = isset(RecreationZone::getZoneList()[$model->city_id]) ? RecreationZone::getZoneList()[$model->city_id] : null;
        }
        return $dataProvider;

    }


    public static function getOne($model)
    {
        // TODO: Implement getOne() method.
    }
}