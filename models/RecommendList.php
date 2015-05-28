<?php

namespace xiuchanghu\recommend\models;

use Yii;

/**
 * This is the model class for table "recommend_list".
 *
 * @property integer $lid
 * @property string $lname
 * @property integer $fontnum
 * @property integer $width
 * @property integer $height
 * @property string $filedir
 */
class RecommendList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recommend_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lname', 'fontnum', 'width', 'height', 'filedir'], 'required'],
            [['fontnum', 'width', 'height'], 'integer'],
            [['lname'], 'string', 'max' => 10],
            [['filedir'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lid' => Yii::t('app', 'Lid'),
            'lname' => Yii::t('app', 'Lname'),
            'fontnum' => Yii::t('app', 'Fontnum'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'filedir' => Yii::t('app', 'Filedir'),
        ];
    }
}
