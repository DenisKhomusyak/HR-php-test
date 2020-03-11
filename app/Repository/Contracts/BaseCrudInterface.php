<?php

namespace App\Repository\Contracts;

/**
 * Interface BaseCrudInterface
 * @package App\Repository\Contracts
 */
interface BaseCrudInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function all(array $data = []);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $da
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $id
     * @return mixed
     */
    public function findOrFail($id);

    /**
     * @param array $relations
     * @return mixed
     */
    public function with(array $relations);
}
