<?php

namespace frontend\controllers;

use common\models\Members;
use Yii;
use yii\web\Controller;

class ArizaController extends Controller{

    public function actionForm(){

        $model = new Members();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success',"Arizangiz qabul qilindi");
                return $this->redirect(['form']);
            }
        } else {
            // Yii::$app->session->setFlash('danger',"Ariza topshirishda xatolik yuz berdi");   
            $model->loadDefaultValues();
        }


        return $this->render('form',[
            'model'=>$model,
        ]);

    }

}
