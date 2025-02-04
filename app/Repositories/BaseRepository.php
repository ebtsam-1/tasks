<?php

namespace App\Repositories;


class BaseRepository
{
    public function __construct(private $model, private $searchColumn = '')
    {
    }

    public function get($search = false, array $filters = [],
      $with = false, $paginate = true, $pageNum = 15)
    {
        $filters = $this->prepareFilters($filters);
        $query = $this->model->where($filters);
        $query = $search != false && $this->searchColumn != '' ? $query->where($this->searchColumn, $search) : $query;
        $with == false ? $query : $query = $query->with($with);
        $query = $query->orderBy('id', 'desc');
        return $paginate == false ? $query->get() : $query->paginate($pageNum);
    }

    public function show($by, $column = 'id')
    {
       return $this->model->where($column, $by)->first();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($by , $data, $column = 'id')
    {
        $this->model->where($column, $by)->update($data);
    }

    public function destroy($by, $column = 'id')
    {
        $this->model->where($column, $by)->delete();
    }

    public function prepareFilters($filters)
    {
        return array_diff($filters, ['*']);
    }
}


?>
