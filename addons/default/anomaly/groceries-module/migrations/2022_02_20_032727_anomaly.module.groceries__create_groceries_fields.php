<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleGroceriesCreateGroceriesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'slug' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type' => '_'
            ],
        ],
        'description' => 'anomaly.field_type.textarea',
        'creeated_by_id' => [
            'type' => 'anomaly.field_type.relationship',
            'config' => [
                'related' => \Anomaly\UsersModule\User\UserModel::class
            ]
        ]
    ];

}
