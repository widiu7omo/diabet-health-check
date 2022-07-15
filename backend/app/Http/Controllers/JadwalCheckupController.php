<?php

namespace App\Http\Controllers;

use App\DataTables\JadwalCheckupDataTable;
use App\Http\Requests\CreateJadwalCheckupRequest;
use App\Http\Requests\UpdateJadwalCheckupRequest;
use App\Models\JadwalCheckup;
use App\Models\JadwalDokter;
use App\Repositories\JadwalCheckupRepository;
use App\Repositories\PemeriksaanRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;

class JadwalCheckupController extends AppBaseController
{
    /** @var JadwalCheckupRepository $jadwalCheckupRepository */
    private $jadwalCheckupRepository;
    private $pemeriksaanRepository;
    private $userRepository;

    public function __construct(JadwalCheckupRepository $jadwalCheckupRepo, UserRepository $userRepository, PemeriksaanRepository $pemeriksaanRepository)
    {
        $this->jadwalCheckupRepository = $jadwalCheckupRepo;
        $this->userRepository = $userRepository;
        $this->pemeriksaanRepository = $pemeriksaanRepository;
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $pasiens = $this->userRepository->makeModel()->role('Pasien')->get()->pluck('name', 'id');
        $selectedPasiens = [];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [];
        $pemeriksaans = $this->pemeriksaanRepository->all()->pluck('pemeriksaan', 'id');
        $selectedPemeriksaans = [];
        $selectedStatus = [];
        return view('jadwal_checkups.create')
            ->with('pasiens', $pasiens)
            ->with('selectedPasiens', $selectedPasiens)
            ->with('pemeriksaans', $pemeriksaans)
            ->with('selectedPemeriksaans', $selectedPemeriksaans)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters)->with('selectedStatus', $selectedStatus);
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
        if (auth()->user()->hasRole('Dokter')) {
            $input['dokter_id'] = auth()->user()->id;
        }
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
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);
        $pasiens = $this->userRepository->makeModel()->role('Pasien')->get()->pluck('name', 'id');
        $selectedPasiens = [$jadwalCheckup->dokter_id];
        $dokters = $this->userRepository->makeModel()->role('Dokter')->get()->pluck('name', 'id');
        $selectedDokters = [$jadwalCheckup->pasien_id];
        $pemeriksaans = $this->pemeriksaanRepository->all()->pluck('pemeriksaan', 'id');
        $selectedPemeriksaans = [];
        $selectedStatus = [$jadwalCheckup->status];
        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        return view('jadwal_checkups.edit')
            ->with('jadwalCheckup', $jadwalCheckup)
            ->with('pasiens', $pasiens)
            ->with('selectedPasiens', $selectedPasiens)
            ->with('pemeriksaans', $pemeriksaans)
            ->with('selectedPemeriksaans', $selectedPemeriksaans)
            ->with('dokters', $dokters)
            ->with('selectedDokters', $selectedDokters)
            ->with('selectedStatus', $selectedStatus);
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
        $input = $request->all();
        if (auth()->user()->hasRole('Dokter')) {
            $input['dokter_id'] = auth()->user()->id;
        }
        if (empty($jadwalCheckup)) {
            Flash::error('Jadwal Checkup not found');

            return redirect(route('jadwalCheckups.index'));
        }

        $jadwalCheckup = $this->jadwalCheckupRepository->update($input, $id);

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

    public function makan($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);
        return view('pola_makans.create')->with('jadwalCheckup', $jadwalCheckup);
    }

    public function obat($id)
    {
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);
        return view('pola_obats.create')->with('jadwalCheckup', $jadwalCheckup);
    }

    public function generateAntrian(Request $request)
    {
        $minimalServing = 10; //pelayanan pasien minimal 15 Menit
        $quantum = 3; //pergantian dokter 3 jam sekali
        $quantumInMinutes = ($quantum * 60); // 3 jam x 60 menit
        $input = $request->except("_token");
        $dayPick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('l');
        $datePick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('Y-m-d');
        $hourPick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('H:i');
        $dayPickLower = strtolower($dayPick);

        $jadwalsDokter = JadwalDokter::with('dokter')->where('hari', '=', $dayPickLower)->get();
        $doctorDates = $jadwalsDokter->map(function ($item) use ($minimalServing, $quantumInMinutes, $datePick, $hourPick) {
            $doctorDateStart = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $item->jam_mulai)->subMinutes($minimalServing);
            $doctorDateFinish = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $item->jam_selesai)->subMinutes($minimalServing);
            $diffDateStart = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $hourPick)->diffInMinutes($doctorDateStart);
            $diffDateFinish = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $hourPick)->diffInMinutes($doctorDateFinish);
            if (($diffDateStart <= $quantumInMinutes) && ($diffDateFinish <= $quantumInMinutes)) {
                if (($diffDateStart == 0)) {
                    $isDoctorPicked = false;
                } else {
                    $isDoctorPicked = true;
                }
            } else {
                $isDoctorPicked = false;
            }
            return ['picked' => $isDoctorPicked, 'dokter' => $item->dokter, "diff_time_start" => $diffDateStart, 'diff_time_finish' => $diffDateFinish, 'jadwal' => $item->jam_mulai . '-' . $item->jam_selesai, 'start' => $item->jam_mulai, 'end' => $item->jam_selesai];
        });
        //filter only picked doctor
        $pickedDoctor = $doctorDates->filter(function ($item) {
            return $item['picked'] == true;
        });
        if ($pickedDoctor == null) {
            return Response::json(['success' => false, 'message' => 'Doctor not found']);
        }
        $dokterPicked = $pickedDoctor->first();
        $jadwalTerakhir = null;
        if ($dokterPicked != null) {
            //fetcho antrian by dokter and current time
            $from = $datePick . ' ' . $dokterPicked['start'];
            $to = $datePick . ' ' . $dokterPicked['end'];
            $jadwalTerakhir = JadwalCheckup::with("dokter")->where('dokter_id', '=', $dokterPicked['dokter']->id)->whereBetween('tgl_checkup', [$from, $to])->orderBy('tgl_checkup', 'desc')->get()->first();
        }
        //add +1 and publish to user
        return Response::json(['success' => true, 'dokters' => $doctorDates, 'day' => $dayPick, 'hour' => $hourPick, 'pickedDoctor' => $dokterPicked, 'jadwalTerakhir' => $jadwalTerakhir]);
    }
}
