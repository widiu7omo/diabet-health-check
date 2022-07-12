<?php

namespace App\Http\Controllers;

use App\DataTables\PolaObatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePolaObatRequest;
use App\Http\Requests\UpdatePolaObatRequest;
use App\Repositories\JadwalCheckupRepository;
use App\Repositories\PemeriksaanRepository;
use App\Repositories\PolaObatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Response;

class PolaObatController extends AppBaseController
{
    /** @var PolaObatRepository $polaObatRepository */
    private $polaObatRepository;
    private $pemeriksaanRepository;
    private $jadwalCheckupRepository;

    public function __construct(PolaObatRepository $polaObatRepo, PemeriksaanRepository $pemeriksaanRepository, JadwalCheckupRepository $jadwalCheckupRepository)
    {
        $this->polaObatRepository = $polaObatRepo;
        $this->pemeriksaanRepository = $pemeriksaanRepository;
        $this->jadwalCheckupRepository = $jadwalCheckupRepository;
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $pemeriksaans = $this->pemeriksaanRepository->all()->pluck('id', 'pemeriksaan');
        $selectedPemeriksaan = [];
        $jadwals = $this->jadwalCheckupRepository->all()->pluck('id', 'checkup');
        $selectedJadwal = [];
        return view('pola_obats.create')
            ->with('pemeriksaans', $pemeriksaans)
            ->with('selectedPemeriksaan', $selectedPemeriksaan)
            ->with('jadwals', $jadwals)
            ->with('selectedJadwal', $selectedJadwal);
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
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $polaObat = $this->polaObatRepository->find($id);
        $pemeriksaans = $this->pemeriksaanRepository->all()->pluck('pemeriksaan', 'id');
        $selectedPemeriksaan = [$polaObat->pemeriksaan->id];
        $jadwals = $this->jadwalCheckupRepository->all()->pluck('checkup', 'id');
        $selectedJadwal = [$polaObat->jadwal_checkup->id];
        if (empty($polaObat)) {
            Flash::error('Pola Obat not found');

            return redirect(route('polaObats.index'));
        }

        return view('pola_obats.edit')
            ->with('polaObat', $polaObat)
            ->with('pemeriksaans', $pemeriksaans)
            ->with('selectedPemeriksaan', $selectedPemeriksaan)
            ->with('jadwals', $jadwals)
            ->with('selectedJadwal', $selectedJadwal);
    }

    /**
     * Update the specified PolaObat in storage.
     *
     * @param int $id
     * @param UpdatePolaObatRequest $request
     *
     * @return Application|Redirector|RedirectResponse
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
