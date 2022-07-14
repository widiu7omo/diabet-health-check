<?php

namespace App\Http\Controllers;

use App\DataTables\JadwalDokterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJadwalDokterRequest;
use App\Http\Requests\UpdateJadwalDokterRequest;
use App\Repositories\JadwalDokterRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Response;

class JadwalDokterController extends AppBaseController
{
    /** @var JadwalDokterRepository $jadwalDokterRepository */
    private $jadwalDokterRepository;
    private $userRepository;

    public function __construct(JadwalDokterRepository $jadwalDokterRepo, UserRepository $userRepository)
    {
        $this->jadwalDokterRepository = $jadwalDokterRepo;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the JadwalDokter.
     *
     * @param JadwalDokterDataTable $jadwalDokterDataTable
     *
     * @return Response
     */
    public function index(JadwalDokterDataTable $jadwalDokterDataTable)
    {
        return $jadwalDokterDataTable->render('jadwal_dokters.index');
    }

    /**
     * Show the form for creating a new JadwalDokter.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $days = ["senin" => "Senin", 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => "Sabtu", 'minggu' => 'Minggu'];
        $selectedDay = [];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [];
        return view('jadwal_dokters.create')
            ->with('days', $days)
            ->with("selectedDay", $selectedDay)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters);
    }

    /**
     * Store a newly created JadwalDokter in storage.
     *
     * @param CreateJadwalDokterRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalDokterRequest $request)
    {
        $input = $request->all();

        $jadwalDokter = $this->jadwalDokterRepository->create($input);

        Flash::success('Jadwal Dokter saved successfully.');

        return redirect(route('jadwalDokters.index'));
    }

    /**
     * Display the specified JadwalDokter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jadwalDokter = $this->jadwalDokterRepository->find($id);

        if (empty($jadwalDokter)) {
            Flash::error('Jadwal Dokter not found');

            return redirect(route('jadwalDokters.index'));
        }

        return view('jadwal_dokters.show')->with('jadwalDokter', $jadwalDokter);
    }

    /**
     * Show the form for editing the specified JadwalDokter.
     *
     * @param int $id
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $jadwalDokter = $this->jadwalDokterRepository->find($id);
        $days = ["senin" => "Senin", 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => "Sabtu", 'minggu' => 'Minggu'];
        $selectedDay = [$jadwalDokter->hari];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [$jadwalDokter->dokter_id];
        if (empty($jadwalDokter)) {
            Flash::error('Jadwal Dokter not found');

            return redirect(route('jadwalDokters.index'));
        }
        return view('jadwal_dokters.edit')
            ->with('jadwalDokter', $jadwalDokter)
            ->with('days', $days)->with("selectedDay", $selectedDay)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters);
    }

    /**
     * Update the specified JadwalDokter in storage.
     *
     * @param int $id
     * @param UpdateJadwalDokterRequest $request
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateJadwalDokterRequest $request)
    {
        $jadwalDokter = $this->jadwalDokterRepository->find($id);

        if (empty($jadwalDokter)) {
            Flash::error('Jadwal Dokter not found');

            return redirect(route('jadwalDokters.index'));
        }

        $jadwalDokter = $this->jadwalDokterRepository->update($request->all(), $id);

        Flash::success('Jadwal Dokter updated successfully.');

        return redirect(route('jadwalDokters.index'));
    }

    /**
     * Remove the specified JadwalDokter from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jadwalDokter = $this->jadwalDokterRepository->find($id);

        if (empty($jadwalDokter)) {
            Flash::error('Jadwal Dokter not found');

            return redirect(route('jadwalDokters.index'));
        }

        $this->jadwalDokterRepository->delete($id);

        Flash::success('Jadwal Dokter deleted successfully.');

        return redirect(route('jadwalDokters.index'));
    }
}
