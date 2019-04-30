<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaseModel extends Model
{
    /**
     * 新增
     * @author huxinlu
     * @param array $options
     * @return bool
     */
    public function add(array $options = [])
    {
        if (!empty($options)) {
            foreach ($options as $k => $v) {
                $this->$k = $v;
            }
        }

        return $this->save();
    }

    /**
     * 主键更新
     * @author huxinlu
     * @param array $option 更新数据
     * @return bool
     */
    public function edit(array $option)
    {
        $query = $this->query()->find($option['id']);
        foreach ($option as $k => $v) {
            $query->$k = $v;
        }
        return $query->save();
    }

    /**
     * 条件更新
     * @author huxinlu
     * @param array $where 查询条件
     * @param array $options 更新数据
     * @return int
     */
    public function update(array $where = [], array $options = [])
    {
        return $this->query()->where($where)->update($options);
    }

    /**
     * 主键删除
     * @author huxinlu
     * @param $id int 主键
     * @return mixed
     */
    public function del(int $id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    /**
     * 主键获取详情
     * @author huxinlu
     * @param int $id 主键ID
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getDetail(int $id)
    {
        return $this->query()->where('id', $id)->get()->first();
    }

    /**
     * 列表
     * @author huxinlu
     * @param array $where 查询条件
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getList(array $where = [])
    {
        return $this->query()->where($where)->get()->toArray();
    }

    /**
     * 分页列表
     * @author huxinlu
     * @param int $limit 每页显示数
     * @param array $where 查询条件
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPageList($limit, array $where = [])
    {
        return $this->query()->where($where)->paginate($limit)->toArray();
    }

    /**
     * 添加并获取主键
     * @author huxinlu
     * @param array $option
     * @return mixed
     */
    public function insertGetId(array $option = [])
    {
        $this->insertAndSetId($this->query(), $option);
        return $this->id;
    }

    /**
     * 批量添加
     * @author huxinlu
     * @param array $option
     * @return bool
     */
    public function addAll(array $option = [])
    {
        return DB::table($this->table)->insert($option);
    }

    /**
     * 条件批量删除
     * @author huxinlu
     * @param array $where
     * @return mixed
     */
    public function delAll(array $where)
    {
        return $this->query()->where($where)->delete();
    }
}
