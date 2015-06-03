<?php

namespace xiuchanghu\recommend\models;

use Yii;

/**
 * This is the model class for table "recommend_list".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
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
            [['name', 'type', 'fontnum', 'width', 'height', 'filedir'], 'required'],
            [['type', 'fontnum', 'width', 'height'], 'integer'],
            [['name'], 'string', 'max' => 10],
            [['filedir'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '名称'),
            'type' => Yii::t('app', '类型'),
            'fontnum' => Yii::t('app', '字数'),
            'width' => Yii::t('app', '图片宽度'),
            'height' => Yii::t('app', '图片高度'),
            'filedir' => Yii::t('app', '路径'),
        ];
    }

    static public function get($array = [], $level = 0, $add = 2, $repeat = '　')
    {
        $strRepeat = '';
        // add some spaces or symbols for non top level categories
        if ($level > 1) {
            for ($j = 0; $j < $level; $j++) {
                $strRepeat .= $repeat;
            }
        }

        $newArray = array ();
        //performance is not very good here
        foreach ((array)$array as $v) {
                $item = (array)$v;
                $item['label'] = $v['name'];
                $newArray[] = $item;
        }
        return $newArray;
    }
}
