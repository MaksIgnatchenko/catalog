<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\Modules\Permissions\DataTables;

use App\Modules\Permissions\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class RoleDataTable extends DataTable
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
        return $dataTable
            ->addColumn('action', 'role.datatables_actions')
            ->addColumn('permissions_count', function($role) {
                return $role->permissions->count();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Role $model
     * @return Builder
     */
    public function query(Role $model): Builder
    {
        return $model->newQuery()->with('permissions');
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
                'responsive' => true,
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
                'data' => 'display_name',
                'title' => 'Name',
                'width' => '20%',
            ],
            [
                'data' => 'permissions_count',
                'title' => 'Contain<br>permissions',
                'width' => '20%',
                'searchable' => false,
                'orderable' => false,
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
