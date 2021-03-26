<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, string $id) : bool
    {
        return $this->find($id)->update($attributes);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @param array $relationship
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'created_at', string $sortBy = 'desc', array $relationship = [])
    {
        return $this->model->orderBy($orderBy, $sortBy)->with($relationship)->get($columns);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function paginate(array $data, int $paginate)
    {
        return $this->model->where($data)->paginate($paginate);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(string $id) : bool
    {
        return $this->model->find($id)->delete();
    }

}
