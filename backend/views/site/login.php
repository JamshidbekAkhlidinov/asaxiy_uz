<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<div class="row">
    <div class="col-xs-8">
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary ', 'name' => 'login-button']) ?>
    </div>


</div>
<?php ActiveForm::end(); ?>

