<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\DataTables;

use App\Modules\Admins\Models\Category;
use App\Modules\Admins\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class TypeDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'type.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Achievement $model
     * @return Builder
     */
    public function query(Type $model): Builder
    {
        return $model->newQuery()->with('speciality');
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
            ->addAction(['width' => '30%'])
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
                'width' => '20%',
            ],
            [
                'name' => 'speciality',
                'data' => 'speciality.name',
                'title' => 'Speciality',
                'width' => '20%',
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'description',
                'data' => 'description',
                'title' => 'Description',
                'width' => '30%',
                'orderable' => false,
            ],
        ];
    }
}