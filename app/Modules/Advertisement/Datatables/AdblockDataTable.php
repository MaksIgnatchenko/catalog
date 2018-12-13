<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Advertisement\Datatables;

use App\Modules\Advertisement\Models\Adblock;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class AdblockDataTable extends DataTable
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
            ->addColumn('action', 'adblock.datatables_actions')
            ->editColumn('image', function($query) {
                return $query->image ? '<img height="50" src="/storage/' . $query->image . '"  />' : '';
            })->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Adblock $model
     * @return Builder
     */
    public function query(Adblock $model): Builder
    {
        return $model->with(['country', 'city'])->newQuery();
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
                'data' => 'appear_start',
                'title' => 'Appear<br>from date',
                'width' => '10%',
            ],
            [
                'data' => 'appear_finish',
                'title' => 'Appear<br>to date',
                'width' => '10%',
            ],
            [
                'data' => 'position',
                'title' => 'Position',
                'width' => '10%',
            ],
            [
                'data' => 'type',
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
                'data' => 'image',
                'title' => 'Image',
                'width' => '10%',
                'searchable' => false,
                'orderable' => false,

            ],
            [
                'data' => 'url',
                'title' => 'Url',
                'width' => '10%',
                'orderable' => false,
            ],
            [
                'name' => 'description',
                'data' => 'description',
                'title' => 'Description',
                'width' => '10%',
                'orderable' => false,
            ],
        ];
    }
}