<?php

namespace App\Http\Controllers;

use App\DataTables\PolaMakanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePolaMakanRequest;
use App\Http\Requests\UpdatePolaMakanRequest;
use App\Repositories\PolaMakanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PolaMakanController extends AppBaseController
{
    /** @var PolaMakanRepository $polaMakanRepository*/
    private $polaMakanRepository;

    public function __construct(PolaMakanRepository $polaMakanRepo)
    {
        $this->polaMakanRepository = $polaMakanRepo;
    }

    /**
     * Display a listing of the PolaMakan.
     *
     * @param PolaMakanDataTable $polaMakanDataTable
     *
     * @return Response
     */
    public function index(PolaMakanDataTable $polaMakanDataTable)
    {
        return $polaMakanDataTable->render('pola_makans.index');
    }

    /**
     * Show the form for creating a new PolaMakan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pola_makans.create');
    }

    /**
     * Store a newly created PolaMakan in storage.
     *
     * @param CreatePolaMakanRequest $request
     *
     * @return Response
     */
    public function store(CreatePolaMakanRequest $request)
    {
        $input = $request->all();

        $polaMakan = $this->polaMakanRepository->create($input);

        Flash::success('Pola Makan saved successfully.');

        return redirect(route('polaMakans.index'));
    }

    /**
     * Display the specified PolaMakan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            Flash::error('Pola Makan not found');

            return redirect(route('polaMakans.index'));
        }

        return view('pola_makans.show')->with('polaMakan', $polaMakan);
    }

    /**
     * Show the form for editing the specified PolaMakan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            Flash::error('Pola Makan not found');

            return redirect(route('polaMakans.index'));
        }

        return view('pola_makans.edit')->with('polaMakan', $polaMakan);
    }

    /**
     * Update the specified PolaMakan in storage.
     *
     * @param int $id
     * @param UpdatePolaMakanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePolaMakanRequest $request)
    {
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            Flash::error('Pola Makan not found');

            return redirect(route('polaMakans.index'));
        }

        $polaMakan = $this->polaMakanRepository->update($request->all(), $id);

        Flash::success('Pola Makan updated successfully.');

        return redirect(route('polaMakans.index'));
    }

    /**
     * Remove the specified PolaMakan from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            Flash::error('Pola Makan not found');

            return redirect(route('polaMakans.index'));
        }

        $this->polaMakanRepository->delete($id);

        Flash::success('Pola Makan deleted successfully.');

        return redirect(route('polaMakans.index'));
    }
}
