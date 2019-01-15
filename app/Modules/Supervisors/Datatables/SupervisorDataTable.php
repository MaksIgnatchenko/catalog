<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\Modules\Supervisors\DataTables;

use App\Modules\Admins\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class SupervisorDataTable extends DataTable
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
            ->addColumn('action', 'supervisor.datatables_actions')
            ->addColumn('roles', function($supervisor) {
                $roles = '';
                foreach ($supervisor->roles as $role) {
                    $roles .= "<p>$role->display_name</p>";
                }
                return $roles;
            })
            ->rawColumns(['roles', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Admin $model
     * @return Builder
     */
    public function query(Admin $model): Builder
    {
        return $model->supervisors()->newQuery()->with('roles');
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
                'data' => 'name',
                'title' => 'Name',
                'width' => '20%',
            ],
            [
                'data' => 'roles',
                'title' => 'Roles',
                'width' => '15%',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'email',
                'data' => 'email',
                'title' => 'Email',
                'width' => '15%',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created',
                'width' => '10%',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'Updated',
                'width' => '10%',
            ],
        ];
    }
}
