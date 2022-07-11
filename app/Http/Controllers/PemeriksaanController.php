<?php

namespace App\Http\Controllers;

use App\DataTables\PemeriksaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePemeriksaanRequest;
use App\Http\Requests\UpdatePemeriksaanRequest;
use App\Repositories\PemeriksaanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PemeriksaanController extends AppBaseController
{
    /** @var PemeriksaanRepository $pemeriksaanRepository*/
    private $pemeriksaanRepository;

    public function __construct(PemeriksaanRepository $pemeriksaanRepo)
    {
        $this->pemeriksaanRepository = $pemeriksaanRepo;
    }

    /**
     * Display a listing of the Pemeriksaan.
     *
     * @param PemeriksaanDataTable $pemeriksaanDataTable
     *
     * @return Response
     */
    public function index(PemeriksaanDataTable $pemeriksaanDataTable)
    {
        return $pemeriksaanDataTable->render('pemeriksaans.index');
    }

    /**
     * Show the form for creating a new Pemeriksaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemeriksaans.create');
    }

    /**
     * Store a newly created Pemeriksaan in storage.
     *
     * @param CreatePemeriksaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePemeriksaanRequest $request)
    {
        $input = $request->all();

        $pemeriksaan = $this->pemeriksaanRepository->create($input);

        Flash::success('Pemeriksaan saved successfully.');

        return redirect(route('pemeriksaans.index'));
    }

    /**
     * Display the specified Pemeriksaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }

        return view('pemeriksaans.show')->with('pemeriksaan', $pemeriksaan);
    }

    /**
     * Show the form for editing the specified Pemeriksaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }

        return view('pemeriksaans.edit')->with('pemeriksaan', $pemeriksaan);
    }

    /**
     * Update the specified Pemeriksaan in storage.
     *
     * @param int $id
     * @param UpdatePemeriksaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemeriksaanRequest $request)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }

        $pemeriksaan = $this->pemeriksaanRepository->update($request->all(), $id);

        Flash::success('Pemeriksaan updated successfully.');

        return redirect(route('pemeriksaans.index'));
    }

    /**
     * Remove the specified Pemeriksaan from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }

        $this->pemeriksaanRepository->delete($id);

        Flash::success('Pemeriksaan deleted successfully.');

        return redirect(route('pemeriksaans.index'));
    }
}
