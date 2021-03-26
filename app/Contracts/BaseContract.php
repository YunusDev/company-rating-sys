<?php
namespace App\Contracts;

interface BaseContract
{
    /**
     * Create a model instance
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a model instance
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, string $id);

    /**
     * Return all model rows
     * @param int $numPaginated
     * @param string $orderBy
     * @param string $sortBy
     * @param array $relationship
     * @return mixed
     */
    public function all(int $numPaginated = 9, string $orderBy = 'created_at', string $sortBy = 'desc', array $relationship = []);

    /**
     * Return all model rows
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function paginate(array $data, int $paginate);

    /**
     * Delete one by Id
     * @param int $id
     * @return mixed
     */
    public function delete(string $id);
}
