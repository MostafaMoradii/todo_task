<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleGroceriesCreateGroceriesStream extends Migration
{

    /**
     * This migration creates the stream.
     * It should be deleted on rollback.
     *
     * @var bool
     */
    protected $delete = true;

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'groceries',
        'title_column' => 'name',
        'translatable' => false,
        'versionable' => false,
        'trashable' => true,
        'searchable' => false,
        'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'translatable' => false,
            'required' => true,
        ],
        'slug' => [
            'unique' => true,
            'required' => true,
        ],
        'description' => [
            'required' => true
        ]
    ];
}
