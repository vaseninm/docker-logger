<?php

namespace app\controllers;

use yii\base\Exception;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

class SiteController extends Controller
{
    public function init()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        parent::init();
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'It\'s svoy logger!!!';
    }

    /**
     * @return string
     */
    public function actionError()
    {
        if (($exception = \Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, Yii::t('yii', 'Page not found.'));
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: Yii::t('yii', 'Error');
        }
        if ($code) {
            $name .= " (#$code)";
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = Yii::t('yii', 'An internal server error occurred.');
        }

        return [
            'name' => $name,
            'message' => $message,
            'exception' => $exception,
        ];
    }
}
