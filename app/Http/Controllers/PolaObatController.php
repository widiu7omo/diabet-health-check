<?php

namespace App\Http\Controllers;

use App\DataTables\PolaObatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePolaObatRequest;
use App\Http\Requests\UpdatePolaObatRequest;
use App\Repositories\PolaObatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PolaObatController extends AppBaseController
{
    /** @var PolaObatRepository $polaObatRepository*/
    private $polaObatRepository;

    public function __construct(PolaObatRepository $polaObatRepo)
    {
        $this->polaObatRepository = $polaObatRepo;
    }

    /**
     * Display a listing of the PolaObat.
     *
     * @param PolaObatDataTable $polaObatDataTable
     *
     * @return Response
     */
    public function index(PolaObatDataTable $polaObatDataTable)
    {
        return $polaObatDataTable->render('pola_obats.index');
    }

    /**
     * Show the form for creating a new PolaObat.
     *
     * @return Response
     */
    public function create()
    {
        return view('pola_obats.create');
    }

    /**
     * Store a newly created PolaObat in storage.
     *
     * @param CreatePolaObatRequest $request
     *
     * @return Response
     */
    public function store(CreatePolaObatRequest $request)
    {
        $input = $request->all();

        $polaObat = $this->polaObatRepository->create($input);

        Flash::success('Pola Obat saved successfully.');

        return redirect(route('polaObats.index'));
    }

    /**
     * Display the specified PolaObat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            Flash::error('Pola Obat not found');

            return redirect(route('polaObats.index'));
        }

        return view('pola_obats.show')->with('polaObat', $polaObat);
    }

    /**
     * Show the form for editing the specified PolaObat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            Flash::error('Pola Obat not found');

            return redirect(route('polaObats.index'));
        }

        return view('pola_obats.edit')->with('polaObat', $polaObat);
    }

    /**
     * Update the specified PolaObat in storage.
     *
     * @param int $id
     * @param UpdatePolaObatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePolaObatRequest $request)
    {
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            Flash::error('Pola Obat not found');

            return redirect(route('polaObats.index'));
        }

        $polaObat = $this->polaObatRepository->update($request->all(), $id);

        Flash::success('Pola Obat updated successfully.');

        return redirect(route('polaObats.index'));
    }

    /**
     * Remove the specified PolaObat from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            Flash::error('Pola Obat not found');

            return redirect(route('polaObats.index'));
        }

        $this->polaObatRepository->delete($id);

        Flash::success('Pola Obat deleted successfully.');

        return redirect(route('polaObats.index'));
    }
}
