<?php

namespace App\Http\Controllers;

use App\DataTables\MotivasiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMotivasiRequest;
use App\Http\Requests\UpdateMotivasiRequest;
use App\Repositories\MotivasiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MotivasiController extends AppBaseController
{
    /** @var MotivasiRepository $motivasiRepository*/
    private $motivasiRepository;

    public function __construct(MotivasiRepository $motivasiRepo)
    {
        $this->motivasiRepository = $motivasiRepo;
    }

    /**
     * Display a listing of the Motivasi.
     *
     * @param MotivasiDataTable $motivasiDataTable
     *
     * @return Response
     */
    public function index(MotivasiDataTable $motivasiDataTable)
    {
        return $motivasiDataTable->render('motivasis.index');
    }

    /**
     * Show the form for creating a new Motivasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('motivasis.create');
    }

    /**
     * Store a newly created Motivasi in storage.
     *
     * @param CreateMotivasiRequest $request
     *
     * @return Response
     */
    public function store(CreateMotivasiRequest $request)
    {
        $input = $request->all();

        $motivasi = $this->motivasiRepository->create($input);

        Flash::success('Motivasi saved successfully.');

        return redirect(route('motivasis.index'));
    }

    /**
     * Display the specified Motivasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $motivasi = $this->motivasiRepository->find($id);

        if (empty($motivasi)) {
            Flash::error('Motivasi not found');

            return redirect(route('motivasis.index'));
        }

        return view('motivasis.show')->with('motivasi', $motivasi);
    }

    /**
     * Show the form for editing the specified Motivasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $motivasi = $this->motivasiRepository->find($id);

        if (empty($motivasi)) {
            Flash::error('Motivasi not found');

            return redirect(route('motivasis.index'));
        }

        return view('motivasis.edit')->with('motivasi', $motivasi);
    }

    /**
     * Update the specified Motivasi in storage.
     *
     * @param int $id
     * @param UpdateMotivasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMotivasiRequest $request)
    {
        $motivasi = $this->motivasiRepository->find($id);

        if (empty($motivasi)) {
            Flash::error('Motivasi not found');

            return redirect(route('motivasis.index'));
        }

        $motivasi = $this->motivasiRepository->update($request->all(), $id);

        Flash::success('Motivasi updated successfully.');

        return redirect(route('motivasis.index'));
    }

    /**
     * Remove the specified Motivasi from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $motivasi = $this->motivasiRepository->find($id);

        if (empty($motivasi)) {
            Flash::error('Motivasi not found');

            return redirect(route('motivasis.index'));
        }

        $this->motivasiRepository->delete($id);

        Flash::success('Motivasi deleted successfully.');

        return redirect(route('motivasis.index'));
    }
}
