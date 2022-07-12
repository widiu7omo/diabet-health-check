<?php

namespace App\DataTables;

use App\Models\PolaObat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PolaObatDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $columns = array_column($this->getColumns(), 'data');
        return $dataTable
            ->editColumn('pemeriksaan', function ($polaObat) {
                return $polaObat->pemeriksaan->pemeriksaan;
            })->editColumn('jadwal_checkup', function ($polaObat) {
                return $polaObat->jadwal_checkup->checkup . " ( " . $polaObat->jadwal_checkup->tgl_checkup . " )";
            })
            ->addColumn('action', 'pola_obats.datatables_actions')->rawColumns(array_merge($columns, ['action']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PolaObat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PolaObat $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'pemeriksaan',
                'title' => 'Hasil Pemeriksaan',
                'orderable' => false, 'searchable' => false,

            ],
            [
                'data' => 'jadwal_checkup',
                'title' => 'Jadwal Checkup',
                'orderable' => false, 'searchable' => false,

            ],
            'obat',
            'jumlah',
            'anjuran' => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pola_obats_datatable_' . time();
    }
}
