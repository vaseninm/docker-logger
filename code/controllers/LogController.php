<?php

namespace app\controllers;

use app\models\Logs;
use yii\web\Controller;
use yii\web\Response;

class LogController extends Controller
{
    public $defaultAction = 'list';

    public function init()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        parent::init();
    }

    /**
     * @param $app
     * @return Logs[]
     */
    public function actionList(string $app) : array
    {
        return Logs::find()
            ->setApp($app)
            ->setDateRange(\Yii::$app->request->get('from'), \Yii::$app->request->get('to'))
            ->setProcess(\Yii::$app->request->get('process'))
            ->orderBy('id DESC')
            ->offset(\Yii::$app->request->get('offset', 0))
            ->limit(100)
            ->all();
    }

    /**
     * @return Logs
     * @throws \Exception
     */
    public function actionCreate() : Logs
    {
        $log = new Logs();

        $log->app = \Yii::$app->request->post('app');
        $log->process = \Yii::$app->request->post('process');
        $log->text = \Yii::$app->request->post('text');

        if (! $log->save()) {
            $errors = $log->getFirstErrors();
            throw new \Exception(!empty($errors) ? array_pop($errors) : 'Неизвестная ошибка');
        }

        return $log;
    }
}
