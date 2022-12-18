<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
            ->addColumn('delete', 'admin.blog.delete')
            ->addColumn('update', 'admin.blog.update')
            ->addColumn('image', function (Blog $blog){
                return '<img width="50px" src="'.asset($blog->image).'">';
            })
            ->setRowId('id')
            ->rawColumns(['delete','update','image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Blog $model
     *
     * @return QueryBuilder
     */
    public function query(Blog $model): QueryBuilder
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
            ->setTableId('blog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('image'),
            Column::make('title'),
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
        return 'Blog_' . date('YmdHis');
    }
}
