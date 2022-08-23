<?php

use common\models\Members;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            if($model->status_id == 1){
              return ['class' => 'primary'];
            } elseif($model->status_id == 2){
                return ['class' => 'warning'];
            } elseif($model->status_id == 3){
                return ['class' => 'success'];
            } elseif($model->status_id == 4){
                return ['class' => 'danger'];
            }
            
        },
        
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'status_id',
            [
                'attribute'=>'status_id',
                'value'=>function($data){
                    return $data->status->status_name;
                }
            ],
            'name',
            'family_name',
            // 'address',
            //'country_of_origin',
            //'email_adress:email',
            //'phone_number',
            'age',
            //'hired',
            [
                'class' => ActionColumn::className(),
                'template'=>'{view} {delete} {update} {reply}',
                'buttons'=>[
                    'reply'=>function($url,$model,$key){
                        return Html::a('<i class="fa fa-fw fa-mail-reply-all"></i> ',['notes/create','id'=>$model->id]);
                    }
                ],
                'urlCreator' => function ($action, Members $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
