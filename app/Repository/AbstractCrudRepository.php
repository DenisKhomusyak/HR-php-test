<?php

namespace App\Repository;

use App\Repository\Contracts\BaseCrudInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractCrudRepository
 * @package App\Repository
 */
abstract class AbstractCrudRepository implements BaseCrudInterface
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractCrudRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = $model::query();
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function all(array $data = [])
    {
        if (isset($data['count']) && $data['count'] == -1) {

            return $this->query->get();
        }

        if (isset($data['with'])) {
            $this->query->with($data['with']);
        }

        return $this->query->paginate($data['count'] ?? 100);
    }

    /**
     * @param $id
     * @return Builder|Model|object|null
     */
    public function get($id)
    {
        return $this->query->find($id);
    }

    /**
     * @param array $data
     * @return Builder|Model
     */
    public function store(array $data)
    {
        return $this->query->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return bool|int|mixed
     */
    public function update($id, array $data)
    {
        $item = $this->query->where('id', $id)->first();

        return $item ? $item->update($data) : false;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateWithTap(int $id, array $data)
    {
        $model = $this->query->where('id', $id)->first();

        if ($model === null) {
            return false;
        }

        return tap($model)->update($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function updateModelWithTap(Model $model, array $data)
    {
        return tap($model)->update($data);
    }

    /**
     * @param $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = $this->query->where('id', $id)->first();

        return $item ? $item->delete() : false;
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|mixed
     */
    public function findOrFail($id)
    {
        return $this->query->findOrFail($id);
    }

    /**
     * @param array $relations
     * @return Builder|mixed
     */
    public function with(array $relations = [])
    {
        $this->query->with($relations);

        return $this;
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return $this
     */
    public function where(string $column, string $value)
    {
        $this->query->where($column, $value);

        return $this;
    }

    /**
     * @return Builder|Model|object|null
     */
    public function first()
    {
        return  $this->query->first();
    }
}
