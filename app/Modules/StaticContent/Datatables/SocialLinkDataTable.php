<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\Modules\StaticContent\DataTables;

use App\Helpers\CustomUrl;
use App\Helpers\FieldPrettyName;
use App\Modules\StaticContent\Models\SocialLink;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class SocialLinkDataTable extends DataTable
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
            ->addColumn('action', 'socialLink.datatables_actions')
            ->editColumn('social_resource', function ($query) {
                return FieldPrettyName::transform($query->social_resource);
            })
            ->addColumn('social_icon', function ($query) {
                return "<img height='50' src=" . CustomUrl::getFull($query->social_icon) . " title='" . $query->alt . "'/>";
            })
            ->rawColumns(['social_icon', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param SocialLink $model
     * @return Builder
     */
    public function query(SocialLink $model): Builder
    {
        return $model->newQuery();
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
                'dom' => 'frtip',
                'order' => [[0, 'desc']],
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
                'name' => 'social_icon',
                'data' => 'social_icon',
                'title' => 'Icon',
                'width' => '5%',
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'social_resource',
                'data' => 'social_resource',
                'title' => 'Social Resource',
                'width' => '20%',
            ],
            [
                'name' => 'url',
                'data' => 'url',
                'title' => 'Url',
                'width' => '30%',
            ],
            [
                'name' => 'alt',
                'data' => 'alt',
                'title' => 'Popup icon text',
                'width' => '20%',
            ],
        ];
    }
}
