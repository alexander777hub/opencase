<?php


namespace app\models;
use Yii;

/**
 * Class Client
 * @package app\models
 */
class Client
{
    public $client;

    public function actionAuth()
    {
        $this->client = new \GuzzleHttp\Client([

            'base_uri' => \Yii::$app->params['api_url'],
            'auth' => [
                \Yii::$app->params['client_id'],
                \Yii::$app->params['client_secret'],
            ]
        ]);

        $response = $this->client->request('POST', 'oauth2/token/' , [
            'headers' =>
                ['Cache-Control' => 'no-cache', 'Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ]
        ]);
        $res = json_decode((string)$response->getBody(), true);
        if ($res && isset($res['access_token']) && isset($res['expires_in'])){
            $this->addToken($res['access_token'], $res['expires_in']);
        }
        return $res;

    }
    public function addToken($token, $exp)
    {

        $cache = Yii::$app->cache;

        $cache->add('token', $token, $exp);

    }
    public function checkExp()
    {
        if (!Yii::$app->cache->get('token')) {
           return false;
        }
        return true;
    }

    public function getToprated()
    {
        if (!$this->checkExp()) {
            $this->actionAuth();
        }

        $this->client = new \GuzzleHttp\Client([

            'base_uri' => \Yii::$app->params['api_url'],
        ]);


        $response = $this->client->request('GET', 'api/v1/influencers/?ordering=-pk' , [
            'headers' =>
                ['Content-Type' => 'application/json',
                 'Accept' => 'application/json',
                 'X-CSRF-Token'=> 'MT9KYG2XOjczdR4QL4oJ1FQ1YtJ5F6zSKxjQjaV599mWIi3sGmX0lt0QDPx2xlO9',
                 'Authorization' => 'Bearer ' . Yii::$app->cache->get('token'),
                ],
        ]);
        return $response;
    }

}