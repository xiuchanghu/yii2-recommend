<?php

namespace xiuchanghu\recommend\models;

use Yii;

/**
 * This is the model class for table "recommend_data".
 *
 * @property integer $id
 * @property integer $lid
 * @property string $subject
 * @property string $summary
 * @property string $img
 * @property string $url
 * @property integer $pubtime
 */
class RecommendData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recommend_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lid', 'subject', 'summary', 'img', 'url', 'pubtime'], 'required'],
            [['lid', 'pubtime'], 'integer'],
            [['summary'], 'string'],
            [['subject'], 'string', 'max' => 80],
            [['img', 'url'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lid' => Yii::t('app', 'Lid'),
            'subject' => Yii::t('app', 'Subject'),
            'summary' => Yii::t('app', 'Summary'),
            'img' => Yii::t('app', 'Img'),
            'url' => Yii::t('app', 'Url'),
            'pubtime' => Yii::t('app', 'Pubtime'),
        ];
    }
}
