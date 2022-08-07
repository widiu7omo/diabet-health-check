<?php

namespace App\DataTables;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends DataTable
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
        return $dataTable->editColumn('id', function ($pemeriksaan) {
            return $pemeriksaan->hasil_diagnosa != null ?"Pemeriksaan":"Checkup";
        })->editColumn('dokter', function ($pemeriksaan) {
            return $pemeriksaan->dokter->name;
        })->editColumn('pasien', function ($pemeriksaan) {
            return $pemeriksaan->pasien->name;
        })->addColumn('action', 'reports.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(Pemeriksaan $model)
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
            ->setTableId('reportdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
            ['data' => 'id', 'title' => "Jenis Pelayanan", 'orderable' => false],
            'pemeriksaan',
            'tgl_periksa',
            'hasil_diagnosa',
            [
                'data' => 'dokter',
                'title' => 'Dokter',
                'orderable' => false, 'searchable' => false,

            ],
            [
                'data' => 'pasien',
                'title' => 'Pasien',
                'orderable' => false, 'searchable' => false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Report_' . date('YmdHis');
    }
}
