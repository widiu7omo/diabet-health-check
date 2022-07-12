<?php

namespace App\Http\Controllers;

use App\DataTables\PemeriksaanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePemeriksaanRequest;
use App\Http\Requests\UpdatePemeriksaanRequest;
use App\Repositories\PemeriksaanRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Response;

class PemeriksaanController extends AppBaseController
{
    /** @var PemeriksaanRepository $pemeriksaanRepository */
    private $pemeriksaanRepository;
    private $userRepository;

    public function __construct(PemeriksaanRepository $pemeriksaanRepo, UserRepository $userRepository)
    {
        $this->pemeriksaanRepository = $pemeriksaanRepo;
        $this->userRepository = $userRepository;
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $pasiens = $this->userRepository->makeModel()->role('Pasien')->get()->pluck('name', 'id');
        $selectedPasiens = [];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [];
        return view('pemeriksaans.create')
            ->with('pasiens', $pasiens)
            ->with('selectedPasiens', $selectedPasiens)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters);
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
        if (auth()->user()->hasRole('Dokter')) {
            $input['dokter_id'] = auth()->user()->id;
        }
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
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        $pasiens = $this->userRepository->makeModel()->role('Pasien')->get()->pluck('name', 'id');
        $selectedPasiens = $pemeriksaan->pasien_id;
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = $pemeriksaan->dokter_id;

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }
        return view('pemeriksaans.edit')->with('pemeriksaan', $pemeriksaan)
            ->with('pasiens', $pasiens)
            ->with('selectedPasiens', $selectedPasiens)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters);
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
        $input = $request->all();
        if (auth()->user()->hasRole('Dokter')) {
            $input['dokter_id'] = auth()->user()->id;
        }
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            Flash::error('Pemeriksaan not found');

            return redirect(route('pemeriksaans.index'));
        }

        $pemeriksaan = $this->pemeriksaanRepository->update($input, $id);

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

    public function jadwalkan($id)
    {
        $pemeriksaan = $this->pemeriksaanRepository->find($id);
        $pasiens = $this->userRepository->makeModel()->role('Pasien')->get()->pluck('name', 'id');
        $selectedPasiens = [];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [];
        $selectedStatus = [];
        return view("jadwal_checkups.create")
            ->with("pemeriksaan", $pemeriksaan)
            ->with('pasiens', $pasiens)
            ->with('selectedPasiens', $selectedPasiens)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters)
            ->with('selectedStatus', $selectedStatus);
    }
}
