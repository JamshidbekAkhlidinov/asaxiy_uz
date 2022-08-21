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
                    'label'=>'<span>status</span>',
                    'icon'=>'home',
                    'url'=>Url::to(['/status/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'status/index',
                        'status/view',
                        'status/update',
                        'status/create',
                    ]),
                    
                ],

                [
                    'label'=>'<span>members</span>',
                    'icon'=>'home',
                    'url'=>Url::to(['/members/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'members/index',
                        'members/view',
                        'members/update',
                        'members/create',
                    ]),
                    
                ],

                [
                    'label'=>'<span>notes</span>',
                    'icon'=>'home',
                    'url'=>Url::to(['/notes/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'notes/index',
                        'notes/view',
                        'notes/update',
                        'notes/create',
                    ]),
                    
                ],


            ],
         ]);
    }



}



?>