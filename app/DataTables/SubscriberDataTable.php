<?php

namespace App\DataTables;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubscriberDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     *
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('delete', 'admin.subscriber.delete')
            ->addColumn('update', 'admin.subscriber.update')
            ->setRowId('id')
            ->rawColumns(['delete','update']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Subscriber $model
     *
     * @return QueryBuilder
     */
    public function query(Subscriber $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subscriber-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('username'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('update'),
            Column::make('delete'),
        ];
    }

    /**
     * Get filename for export.
     * @return string
     */
    protected function filename(): string
    {
        return 'Subscriber_' . date('YmdHis');
    }
}
