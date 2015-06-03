<?php

namespace xiuchanghu\recommend\models;

use Yii;

/**
 * This is the model class for table "recommend_data".
 *
 * @property integer $id
 * @property integer $lid
 * @property string $subject
 * @property string $color
 * @property string $summary
 * @property string $img
 * @property string $url
 * @property integer $pubtime
 */
class RecommendData extends \yii\db\ActiveRecord
{
    public $file;
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
            [['lid', 'subject', 'color', 'summary', 'url', 'pubtime'], 'required'],
            [['lid', 'pubtime'], 'integer'],
            [['summary'], 'string'],
            [['subject'], 'string', 'max' => 80],
            [['color'], 'string', 'max' => 10],
            [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['url'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lid' => Yii::t('app', '推荐位'),
            'subject' => Yii::t('app', '标题'),
            'color' => Yii::t('app', '标题颜色'),
            'summary' => Yii::t('app', '简介'),
            'img' => Yii::t('app', '展示图'),
            'url' => Yii::t('app', '链接地址'),
            'pubtime' => Yii::t('app', 'Pubtime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(RecommendList::className(), ['id' => 'lid']);
    }
}
