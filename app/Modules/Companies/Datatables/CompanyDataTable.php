<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Datatables;

use App\Modules\Companies\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class CompanyDataTable extends DataTable
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
            ->editColumn('created_at', function($company) {
                return Carbon::parse($company->created_at)->toDateString();
            })
            ->addColumn('action', 'company.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Company $model
     * @return Builder
     */
    public function query(Company $model): Builder
    {
        return $model->withCount('images')->with(['category', 'speciality', 'type', 'country', 'city'])->newQuery();
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
            ->addAction(['width' => '10%'])
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
                'data' => 'name',
                'title' => 'Name',
                'width' => '10%',
            ],
            [
                'data' => 'category.name',
                'title' => 'Category',
                'width' => '10%',
            ],
            [
                'data' => 'speciality.name',
                'title' => 'Speciality',
                'width' => '10%',
            ],
            [
                'data' => 'type.name',
                'title' => 'Type',
                'width' => '10%',
            ],
            [
                'data' => 'country.name',
                'title' => 'Country',
                'width' => '10%',
            ],
            [
                'data' => 'city.name',
                'title' => 'City',
                'width' => '10%',
            ],
            [
                'data' => 'status',
                'title' => 'Status',
                'width' => '10%',
            ],
            [
                'data' => 'images_count',
                'title' => 'Images',
                'width' => '10%',
                'searchable' => false,
            ],
            [
                'data' => 'created_at',
                'title' => 'Registration date',
                'width' => '10%',
                'searchable' => false,
            ],
            [
                'data' => 'email',
                'title' => 'Email',
                'width' => '10%',
                'orderable' => false,
            ],
        ];
    }
}
