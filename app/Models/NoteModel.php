<?php
/**
 * Created by PhpStorm.
 * Author: ${user}
 */

namespace App\Models;
/**
 * 笔记模型
 * Class NoteModel
 * @package App\Models
 */
class NoteModel extends BaseModel
{
    protected $table = 'note';

    public function detail()
    {
        return $this->hasOne('App\Models\NoteDetailModel');
    }
}
