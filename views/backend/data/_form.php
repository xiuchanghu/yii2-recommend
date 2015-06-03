<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use xiuchanghu\recommend\models\RecommendList;
use xiuchanghu\recommend\assets\AppAsset;

AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recommend-data-form">
    <?php $form = ActiveForm::begin([
        'options'=>[ 'enctype'=>'multipart/form-data'],
    ]); ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <label>标题颜色:</label>
        <div class="input-group my-colorpicker2 colorpicker-element">
        <input type="text" class="form-control" name="RecommendData[color]" value="<?=$model->color?>">
        <div class="input-group-addon">
        <i style="background-color: rgb(0, 0, 0);"></i>
        </div>
        </div><!-- /.input group -->
    </div>
    <?= $form->field($model, 'lid')->dropDownList(ArrayHelper::map(RecommendList::get(RecommendList::find()->asArray()->all()), 'id', 'label'), ['style' => 'width:auto;']) ?>

    <?= $form->field($model, 'summary')->widget('kucha\ueditor\UEditor', [
        'clientOptions' => [
            'initialFrameHeight' => '200',
            //定制菜单
            'toolbars' => [
                [
                    'fullscreen', 'source', 'undo', 'redo', '|',
                    'fontsize',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', '|',
                    'forecolor', 'backcolor', '|',
                ],
            ]
        ],
    ]); ?>
    <?= $form->field($model, 'img')->fileInput()?>
    <?php
    if ($model->img) {
        echo '<img id="preview" src="'.Yii::$app->params['siteurl']['frontend'] . $model->img.'">';
    }
    ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>  
<?php $this->beginBlock('myjs') ?>
$("#recommenddata-img").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    // console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#preview").attr("src", objUrl) ;
    }
}) ;
//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ; 
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['myjs'], \yii\web\View::POS_END); ?>  
</script>