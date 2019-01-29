<?php
namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return 'api';
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            // rest\Controller преобразует массив в json.
            return [
                'token' => $token->token,
                'expired' => date(DATE_RFC3339, $token->expired_at)
            ];
        } else {
            // в случае ошибки возвращаем модель.
            // rest\Controller сам сгенерирует список ошибок из модели (см. yii\rest\Serializer->serialize()).
            return $model;
        }
    }

    protected function verbs()
    {
        return [
            'login' => ['post']
        ];
    }
}
