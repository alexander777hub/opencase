<?php


namespace app\controllers;


use app\models\Userform;
use Yii;

/**
 * Class LinkController
 * @package app\controllers
 */
class LinkController extends \yii\web\Controller
{

    public function actionSetLink($id)
    {
        /*$link =  'links' . ':'  .base64_encode($id) . 't' . time();

        Yii::$app->redis->set($link, strval($id));
        Yii::$app->redis->expire($link, 60 * 60);
        //$t = Yii::$app->redis->ttl($link);
        $res = Yii::$app->cache->get(strval($link));
        /*if($res == false){
            $res = Yii::$app->cache->add(strval($link), strval($id)
                , 21600);
        }

        Yii::$app->getSession()->setFlash('success', "Ссылка добавлена"); */

        return $this->redirect(["/mng"]);

    }

    public function actionIndex()
    {
        /*$res = Yii::$app->redis->keys("links" . ':*');
        $arr = [];
        if($res){
            foreach($res as $k=>$val){
                 $id =  Yii::$app->redis->get($val);
                 if($id){
                     $arr["https://svidanie.ml/userform/demo?hash=" . $val] = [
                         'id' => $id,
                         'exp' => floor((Yii::$app->redis->ttl($val) )/ 60)
                     ];
                    // $arr[$id]["links"]['exp'] = ($hours * 60 + $minutes);
                 }
            }

        }
        return $this->render("index", ['links' => $arr]); */
    }

}