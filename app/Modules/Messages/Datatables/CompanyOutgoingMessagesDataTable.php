<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.10.2018
 *
 */

namespace App\Modules\Messages\DataTables;

use App\Modules\Messages\Helpers\SenderPrettyTypeName;
use App\Modules\Messages\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class CompanyOutgoingMessagesDataTable extends DataTable
{

    private $companyId;

    /**
     * @param int $id
     * @return $this
     */
    public function setCompanyId(int $id)
    {
        $this->companyId = $id;
        return $this;
    }

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
            ->addColumn('send_to', function () {
                return 'Admin';
            })
            ->addColumn('action', 'company.outgoingMessage.datatables_actions');

    }

    /**
     * Get query source of dataTable.
     *
     * @param Message $model
     * @return Builder
     */
    public function query(Message $model): Builder
    {
        return $model->companyOutgoing($this->companyId)->newQuery();
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
                'name' => 'send_to',
                'data' => 'send_to',
                'title' => 'Send to',
                'width' => '25%',
            ],
            [
                'name' => 'purpose',
                'data' => 'purpose',
                'title' => 'Purpose',
                'width' => '25%',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Date',
                'width' => '25%',
            ]
        ];
    }
}