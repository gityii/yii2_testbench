<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/10/25
 * Time: 16:54
 */

namespace app\modules\admin\controllers;
use app\models\admin\LoginForm;
use app\models\admin\ContactForm;
use app\controllers\BaseController;
use Yii;

class AdminController extends BaseController
{

    public function actionLogin()
    {
        if(!\Yii::$app->user->isGuest) {
            return $this->goHome();//这里应该跳到注册页面
        }
/*
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
*/
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', ['model' => $model,]);

    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
         return $this->goHome();
        //return \Yii::$app->getResponse()->redirect('/admin/admin/login');
    }

}