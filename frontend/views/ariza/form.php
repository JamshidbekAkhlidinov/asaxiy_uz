<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\widgets\MaskedInput;

?>

<div class="container-fluid">

    <h2 class="text-center">Ariza topshirish uchun formani to'ldiring!</h2>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_of_origin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->widget(MaskedInput::class,[
        'mask'=>'+999999999999',
    ])->textInput(['value'=>'+998']) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'hired')->radioList(['1'=>"Ha","0"=>"Yo'q"]) ?>

    <div class="form-group">
        <?= Html::submitButton("Arizani yuborish", ['class' => 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>