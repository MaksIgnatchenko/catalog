<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\DataTables;

use App\Modules\Admins\Models\Speciality;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class SpecialityDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Result from query() method.
     * @return EloquentDataTable
     */
    public function dataTable($query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'speciality.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Speciality  $model
     * @return Builder
     */
    public function query(Speciality $model): Builder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return YajraBuilder
     */
    public function html(): YajraBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'frtip',
                'order'   => [[0, 'desc']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
            ],
            [
                'name' => 'category',
                'data' => 'category.name',
                'title' => 'Category',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'description',
                'data' => 'description',
                'title' => 'Description',
                'orderable' => false,
            ],
        ];
    }
}