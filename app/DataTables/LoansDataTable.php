<?php

namespace App\DataTables;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LoansDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', function (Loan $loan) {
                return view('components.loan.status', compact('loan'));
            })
            ->editColumn('book_id', function (Loan $loan) {
                return $loan->book->title;
            })
            ->editColumn('member_id', function (Loan $loan) {
                return $loan->member->name;
            })
            ->editColumn('action', function (Loan $loan) {
                return view('components.data-tables.button', [
                    'id' => $loan->id,
                ]);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Loan $model): QueryBuilder
    {
        if (Auth::guard('admin')->check()) {
            return $model->newQuery()->with('book', 'member');
        }
        if (Auth::guard('member')->check()) {
            return $model->newQuery()->with('book', 'member')->where('member_id', Auth::id());
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('loans-table')
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
     */
    public function getColumns(): array
    {
        if (Auth::guard('admin')->check()) {
            return [
                Column::make('book_id'),
                Column::make('member_id'),
                Column::make('loan_date'),
                Column::make('return_date'),
                Column::make('status'),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        }
        if (Auth::guard('member')->check()) {
            return [
                Column::make('book_id'),
                Column::make('member_id'),
                Column::make('loan_date'),
                Column::make('return_date'),
                Column::make('status'),
            ];
        }
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Loans_' . date('YmdHis');
    }
}
