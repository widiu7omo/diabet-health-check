<?php

namespace App\DataTables;

use App\Models\JadwalCheckup;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class JadwalCheckupDataTable extends DataTable
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
            ->editColumn('catatan', function ($jadwalCheckup) {
                return $jadwalCheckup->catatan == null ? "Belum ada catatan" : $jadwalCheckup->catatan;
            })->editColumn('dokter', function ($jadwalCheckup) {
                return $jadwalCheckup->dokter->name;
            })->editColumn('pasien', function ($jadwalCheckup) {
                return $jadwalCheckup->pasien->name;
            })->editColumn('status', function ($jadwalCheckup) {
                if ($jadwalCheckup->status == "dijadwalkan") {
                    $classStatus = "warning";
                } else if ($jadwalCheckup->status == "terlewat") {
                    $classStatus = "danger";
                } else {
                    $classStatus = "success";
                }
                return "<span class='badge badge-$classStatus'>$jadwalCheckup->status</span>";
            })->addColumn('action', 'jadwal_checkups.datatables_actions')->rawColumns(array_merge($columns, ['action']))->escapeColumns('status');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JadwalCheckup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JadwalCheckup $model)
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
            'checkup',
            'tgl_checkup',
            'status',
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
            'catatan',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'jadwal_checkups_datatable_' . time();
    }
}
