<?php

namespace App\DataTables;

use App\Models\OnlineOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OnlineOrdersDataTable extends DataTable
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
            ->addColumn('restaurant_name', function ($row) {
                return $row->restaurant->name;
            })
            ->addColumn('customer_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('customer_phone', function ($row) {
                return $row->user->phone;
            })
            ->addColumn('payment_method', function ($row) {
                return $row->payment_method;
            })
            ->addColumn('action', function ($row) {
                return generateActionButtons(
                    auth()->user()->user_type == User::USER_TYPE['admin'] ?  route('admin.online-orders.show', [$row->id]) : route('restaurants.online-orders.show', [currentRestaurant()->slug, $row->id]),
                    auth()->user()->user_type == User::USER_TYPE['admin'] ?  route('admin.online-orders.destroy', [$row->id]) : route('restaurants.online-orders.destroy', [currentRestaurant()->slug, $row->id])
                );
            })
            ->rawColumns(['action', 'customer_name', 'customer_phone'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OnlineOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OnlineOrder $model): QueryBuilder
    {
        return $model->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('onlineorders-table')
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
            Column::make('restaurant_name'),
            Column::make('customer_name'),
            Column::make('customer_phone'),
            Column::make('payable_amount'),
            Column::make('payment_method'),
            Column::make('order_status'),
            Column::make('date'),
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
        return 'OnlineOrders_' . date('YmdHis');
    }
}
