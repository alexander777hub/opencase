<?php


namespace app\models;

use app\models\Userform;
use app\models\UserformSearch;
use yii\helpers\Json;


/**
 * Class UserformManager
 * @package app\models
 */

class UserformManager extends Manager
{
    public UserformSearch $searchModel;

    public function __construct(UserformSearch $searchModel)
    {
        $this->searchModel = $searchModel;
    }

    public function getAll($params)
    {

        $dataProvider = $this->searchModel->search($params);

        foreach ($dataProvider->getModels() as &$model) {

            $model->city_name       = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
            $model->sexname         = isset(Profile::$sex_list[$model->sex]) ? Profile::$sex_list[$model->sex] : null;
            $model->relocate_status = isset(Userform::getRelocateStatus()[$model->ready_to_relocate]) ? Userform::getRelocateStatus()[$model->ready_to_relocate] : null;
            if (!empty($model->target)) {
                $target_names = [];
                $arr          = Json::decode($model->target);
                if (is_int($arr)) {
                    $model->target_name = Userform::getTargets()[intval($arr)];
                } elseif(is_array($arr)) {
                    foreach ($arr as $item) {
                        $target_names[] = Userform::getTargets()[intval($item)];
                    }
                    $model->target_name = implode(',', $target_names);
                }
            }
            $model->find_zone_name = isset(Userform::getFindZone()[$model->find_zone]) ? Userform::getFindZone()[$model->find_zone] : null;
        }


        return $dataProvider;

    }

    public static function getOne($model)
    {

        if (!empty($model->target)) {
            $target_names = [];
            $arr          = Json::decode($model->target);
            if (is_int($arr)) {
                $model->target_name = Userform::getTargets()[intval($arr)];
            } elseif(is_array($arr)) {
                foreach ($arr as $item) {
                    $target_names[] = Userform::getTargets()[intval($item)];
                }
                $model->target_name = implode(',', $target_names);
            }
        }

        if (!empty($model->meeting_purpose)) {
            $target_names = [];
            $arr = Json::decode($model->meeting_purpose);
            if (is_int($arr)) {
                $model->target_meeting_purpose_name = Userform::getMeetingTargetsView()[intval($arr)];
            } elseif(is_array($arr)) {
                foreach ($arr as $item) {
                    $target_names[] = Userform::getMeetingTargetsView()[intval($item)];

                }
                $model->target_meeting_purpose_name = implode(',', $target_names);
            }
        }

        $model->city_name       = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
        $model->sexname         = isset(Profile::$sex_list[$model->sex]) ? Profile::$sex_list[$model->sex] : null;
        $model->relocate_status = isset(Userform::getRelocateStatus()[$model->ready_to_relocate]) ? Userform::getRelocateStatus()[$model->ready_to_relocate] : null;
        $model->find_zone_name  = isset(Userform::getFindZone()[$model->find_zone]) ? Userform::getFindZone()[$model->find_zone] : null;
        $model->height = $model->height != false ? $model->height : 0;
        $model->weight = $model->weight != false ? $model->weight : 0;
        //$model->partner_sex_name =  isset(Profile::$sex_list[$model->partner_sex]) ? Profile::$sex_list[$model->partner_sex] : null;

        return $model;
    }

}