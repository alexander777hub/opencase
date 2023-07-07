<?php


namespace app\commands;
use app\models\Client;
use Yii;

/**
 * Class TestController
 * @package app\commands
 */
class TestController extends \yii\console\Controller
{
  public function actionIndex()
  {
      $cache = Yii::$app->cache;
     // $str = substr(sha1(microtime()), rand(0, 5), 20);
      if(Yii::$app->cache->get("top_records")){
          Yii::$app->cache->delete("top_records");
      }
      $client = new Client();
      $response = $client->getToprated();
      $res = Yii::$app->cache->add("top_records", json_decode((string)$response->getBody(), true)
          , 21600);

  }
}