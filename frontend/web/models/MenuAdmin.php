<?php


namespace backend\models;

use backend\widgets\Menu;
use Yii;
use yii\base\Model;
use yii\helpers\Url;

class MenuAdmin extends Model{

    public static function getData()
    {
        return  Menu::widget([
            'options'=>[
                'class'=>'sidebar-menu',
                'data-widget'=>"tree",
            ],
            'encodeLabels' => false,
            'items'=>[
                [
                    'label' => 'Asosiy menyu',
                    'options' =>[
                            'class' => 'header',
                    ]
                ],
                [
                    'label' => 'Bosh sahifa',
                    'icon' => 'home',
                    'url' => Url::to(['/dashboard/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'dashboard/index',
                        'dashboard/view',
                        'dashboard/update',
                        'dashboard/create',
                    ]),
                ],
                [
                    'label' => 'Video kurslar',
                    'icon' => 'telegram',
                    'url' => '#',
                    'items' => [
                        [
                            'label'=>'<span>Users</span>',
                            'icon'=>'home',
                            'url'=>Url::to(['/videokurslar/index']),
                            'active' => in_array(Yii::$app->controller->getRoute(), [
                                'videokurslar/index',
                                'videokurslar/view',
                                'videokurslar/update',
                                'videokurslar/create',
                            ]),
                        ],
                        
                       
                    ],
                ],
            ],
         ]);
    }



}



?>