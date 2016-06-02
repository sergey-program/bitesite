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
 * @property int    $price
 * @property string $type
 * @property int    $rooms
 * @property int    $square
 * @property int    $level
 * @property int    $maxLevel
 * @property string $contact
 * @property string $images
 *
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
            [['description', 'address', 'district', 'price', 'type', 'rooms', 'square', 'level', 'maxLevel', 'contact', 'images'], 'safe', 'on' => 'create_empty']
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
            // @todo add others
        ];
    }

    ### relations

    ### functions
}