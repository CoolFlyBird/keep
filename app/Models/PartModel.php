<?php
/**
 * Created by PhpStorm.
 * Author: ${user}
 */

namespace App\Models;

/**
 * 所属模块模型
 * Class NoteModel
 * @package App\Models
 */
class PartModel extends BaseModel
{
    protected $table = 'part';

    public function notes()
    {
        return $this->hasMany('App\Models\NoteModel');
    }
}
