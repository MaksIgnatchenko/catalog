<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\Modules\StaticContent\DataTables;

use App\Modules\StaticContent\Enums\StaticContentStatusEnum;
use App\Modules\StaticContent\Models\StaticContent;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class TermDataTable extends DataTable
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
            ->addColumn('action', 'terms.datatables_actions')
            ->editColumn('payload_en', function ($query){
                return $query->getTranslation('payload', 'en', false);
            })
            ->editColumn('payload_ar', function ($query){
                return $query->getTranslation('payload', 'ar', false);
            })
            ->editColumn('status', function ($query){
                if (StaticContentStatusEnum::ACTIVE === $query->status) {
                    return "<div style='color:#3097d1'>" . $query->status . "</div>";
                }
                return "<div class style='color:#aa4a24'>" . $query->status . "</div>";
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param StaticContent $model
     * @return Builder
     */
    public function query(StaticContent $model): Builder
    {
        return $model->termsAndConditions()->newQuery();
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
            ->addAction(['width' => '25%'])
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
                'name' => 'payload',
                'data' => 'payload_en',
                'title' => 'English',
                'width' => '25%',
                'orderable' => false,
            ],
            [
                'name' => 'payload',
                'data' => 'payload_ar',
                'title' => 'Arabic',
                'width' => '25%',
                'orderable' => false,
            ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => 'Status',
                'width' => '10%',
                'orderable' => false,
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
