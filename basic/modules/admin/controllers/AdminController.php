<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/10/25
 * Time: 16:54
 */

namespace app\modules\admin\controllers;
use app\models\admin\LoginForm;
use app\controllers\BaseController;
use Yii;

class AdminController extends BaseController
{

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return \Yii::$app->getResponse()->redirect('/admin/admin/login');
    }

}