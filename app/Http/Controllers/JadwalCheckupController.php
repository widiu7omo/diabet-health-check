<?php

namespace App\Http\Controllers;

use App\DataTables\JadwalCheckupDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJadwalCheckupRequest;
use App\Http\Requests\UpdateJadwalCheckupRequest;
use App\Repositories\JadwalCheckupRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JadwalCheckupController extends AppBaseController
{
    /** @var JadwalCheckupRepository $jadwalCheckupRepository*/
    private $jadwalCheckupRepository;

    public function __construct(JadwalCheckupRepository $jadwalCheckupRepo)
    {
        $this->jadwalCheckupRepository = $jadwalCheckupRepo;
    }

    /**
     * Display a listing of the JadwalCheckup.
     *
     * @param JadwalCheckupDataTable $jadwalCheckupDataTable
     *
     * @return Response
     */
    public function index(JadwalCheckupDataTable $jadwalCheckupDataTable)
    {
        return $jadwalCheckupDataTable->render('jadwal_checkups.index');
    }

    /**
     * Show the form for creating a new JadwalCheckup.
     *
     * @return Response
     */
    public function create()
    {
        return view('jadwal_checkups.create');
    }

    /**
     * Store a newly created JadwalCheckup in storage.
     *
     * @param CreateJadwalCheckupRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalCheckupRequest $request)
    {
        $input = $request->all();

        $jadwalCheckup = $this->jadwalCheckupRepository->create($input);

        Flash::success('Jadwal Checkup saved successfully.');

        return redirect(route('jadwalCheckups.index'));
    }

    /**
     * Display the specified JadwalCheckup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        return view('jadwal_checkups.show')->with('jadwalCheckup', $jadwalCheckup);
    }

    /**
     * Show the form for editing the specified JadwalCheckup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        return view('jadwal_checkups.edit')->with('jadwalCheckup', $jadwalCheckup);
    }

    /**
     * Update the specified JadwalCheckup in storage.
     *
     * @param int $id
     * @param UpdateJadwalCheckupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJadwalCheckupRequest $request)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        $jadwalCheckup = $this->jadwalCheckupRepository->update($request->all(), $id);

        Flash::success('Jadwal Checkup updated successfully.');

        return redirect(route('jadwalCheckups.index'));
    }

    /**
     * Remove the specified JadwalCheckup from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        $this->jadwalCheckupRepository->delete($id);

        Flash::success('Jadwal Checkup deleted successfully.');

        return redirect(route('jadwalCheckups.index'));
    }
}
