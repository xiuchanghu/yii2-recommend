<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use xiuchanghu\recommend\Module;

/* @var $this yii\web\View */
/* @var $searchModel xiuchanghu\recommend\models\RecommendDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recommend Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-data-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recommend Data'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'lid',
                'value'=>function ($model) {
                    return $model->list->name;
                },
            ],
            'subject',
            // 'summary:ntext',
            // 'img',
            // 'url:url',
            'pubtime:datetime',

            ['class' => 'yii\grid\ActionColumn','header' => '操作',]
        ],
    ]); ?>

</div>
