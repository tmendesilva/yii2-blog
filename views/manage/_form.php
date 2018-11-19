<?php
/**
 * @module yii2-blog
 * @description powerful blog module for yii2
 * @author akiraz2
 * @email akiraz@bk.ru
 * Copyright (c) 2018.
 */

use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\Module;
use kartik\markdown\MarkdownEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\BlogPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-post-form">

    <?php $form = ActiveForm::begin([
        //'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        /*'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-10\">{input}{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],*/
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'category_id')->dropDownList(BlogCategory::getList(), ['prompt' => Module::t('blog', 'Select category')]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::class, [
        'moduleId' => $model->module->redactorModule,
        'clientOptions' => [
            'plugins' => ['clips', 'fontcolor', 'imagemanager']
        ]
    ]); ?>

    <?= $form->field($model, 'banner')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('blog', 'Create') : Module::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>