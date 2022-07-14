<?php

namespace App\DataTables;

use App\Models\JadwalDokter;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class JadwalDokterDataTable extends DataTable
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
        return $dataTable->editColumn('jam_mulai', function ($jadwalDokter) {
            return $jadwalDokter->jam_mulai . " sampai " . $jadwalDokter->jam_selesai;
        })->editColumn('dokter_id', function ($jadwalDokter) {
            return $jadwalDokter->dokter->name;
        })->addColumn('action', 'jadwal_dokters.datatables_actions')->rawColumns(array_merge($columns, ['action']))->escapeColumns('status');;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JadwalDokter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JadwalDokter $model)
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
                'data' => 'dokter_id',
                'title' => 'Dokter',
                'orderable' => false, 'searchable' => false,

            ],
            'hari',
            [
                'data' => 'jam_mulai',
                'title' => 'Jam Dinas',
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
        return 'jadwal_dokters_datatable_' . time();
    }
}
