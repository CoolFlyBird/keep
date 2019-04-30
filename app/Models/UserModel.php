<?php
/**
 * Created by PhpStorm.
 * Author: ${user}
 */

namespace App\Models;

/**
 * 用户模型
 * Class UserModel
 * @package App\Models
 */
class UserModel extends BaseModel
{
    protected $table = 'user';

    public function notes()
    {
        return $this->hasMany('App\Models\NoteModel');
    }
}
