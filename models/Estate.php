<?php

namespace app\models;

use app\models\extend\AbstractActiveRecord;

/**
 * Class Estate
 *
 * @package app\models
 *
 * @property int    $id
 * @property string $credential
 * @property string $description
 * @property string $address
 * @property string $district
 * @property string $source
 * @property int    $price
 * @property string $type
 * @property int    $rooms
 * @property int    $square
 * @property int    $level
 * @property int    $maxLevel
 */
class Estate extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'estate';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['credential', 'required', 'on' => 'create_empty'],
            [['description', 'address', 'district', 'source', 'price', 'type', 'rooms', 'square', 'level', 'maxLevel'], 'safe', 'on' => 'create_empty']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'credential' => 'ключ',
            'description' => 'описание'
        ];
    }

    ### relations

    ### functions
}