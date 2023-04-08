<?php

namespace App\DataTables;

use App\Models\PosOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PosOrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('table', function ($row) {
                return $row->table->name;
            })
            ->addColumn('action', function ($row) {
                return generateActionButtons(
                    auth()->user()->user_type == User::USER_TYPE['admin'] ?  route('admin.pos-orders.show', [currentRestaurant()->slug, $row->id]) : route('restaurants.pos-orders.show', [currentRestaurant()->slug, $row->id]),
                    auth()->user()->user_type == User::USER_TYPE['admin'] ?  route('admin.pos-orders.destroy', [currentRestaurant()->slug, $row->id]) : route('restaurants.pos-orders.destroy', [currentRestaurant()->slug, $row->id])
                );
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PosOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PosOrder $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('posorders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('table'),
            Column::make('total_amount'),
            Column::make('order_date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PosOrders_' . date('YmdHis');
    }
}
