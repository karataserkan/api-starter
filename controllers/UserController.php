<?php
namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBearerAuth;

class UserController extends ActiveController
{
    public function behaviors()
    {
    	return ArrayHelper::merge([
            'BAuthenticator' => [
	            'class' => HttpBearerAuth::className(),
            ]
    	], parent::behaviors());
    }

    public $modelClass = 'app\models\User';

    /**
     * Rest Description: Your endpoint description.
     * Rest Fields: ['field1', 'field2'].
     * Rest Filters: ['filter1', 'filter2'].
     * Rest Expand: ['expandRelation1', 'expandRelation2'].
     */
    public function actionTest()
    {
        return Yii::$app->request->post();
    }

}
