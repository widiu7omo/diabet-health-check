<?php

namespace App\Http\Controllers;

use App\DataTables\JadwalCheckupDataTable;
use App\Http\Requests\CreateJadwalCheckupRequest;
use App\Http\Requests\UpdateJadwalCheckupRequest;
use App\Models\JadwalCheckup;
use App\Models\JadwalDokter;
use App\Models\User;
use App\Notifications\NotificationScheduleCreated;
use App\Repositories\JadwalCheckupRepository;
use App\Repositories\PemeriksaanRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

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
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CreateJadwalCheckupRequest $request)
    {
        $input = $request->all();
        if (auth()->user()->hasRole('Dokter')) {
            $input['dokter_id'] = auth()->user()->id;
        }
        $selectedDate = Carbon::createFromFormat('Y-m-d H:i:s', $input['tgl_checkup'])->translatedFormat('Y-m-d');
        $selectedDateFull = Carbon::createFromFormat('Y-m-d H:i:s', $input['tgl_checkup'])->translatedFormat('l, Y-m-d H:i');
        $userAkanDijadwalkan = $this->jadwalCheckupRepository->makeModel()->where("pasien_id")->orWhereDate('tgl_checkup', '=', $selectedDate)->get();
        if (count($userAkanDijadwalkan) > 0) {
            Flash::error('Jadwal Checkup gagal dibuat, Pasien sudah didaftarkan di hari '.$selectedDateFull);
            return redirect(route('jadwalCheckups.index'));
        }
        $jadwalCheckup = $this->jadwalCheckupRepository->create($input);
        if ($jadwalCheckup) {
            $jadwalCheckup->pasien->notify(new NotificationScheduleCreated($jadwalCheckup));
        }

        Flash::success('Jadwal Checkup saved successfully.');

        return redirect(route('jadwalCheckups.index'));
    }

    /**
     * Display the specified JadwalCheckup.
     *
     * @param int $id
     *
     * @return Application|Factory|View|Response
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
     * @return Application|RedirectResponse|Redirector|Response
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
        $minimalServing = 10;
        //pelayanan pasien minimal 10 Menit

        $quantum = 3;
        //pergantian dokter 3 jam sekali

        $quantumInMinutes = ($quantum * 60);
        // konversi nilai quantum 3 jam x 60 menit

        $input = $request->except("_token");
        //mengambil nilai request, kecuali atribut _token

        $dayPick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('l');
        //mengambil nilai dari tanggal yang dipilih oleh admin, dan menkonversinya dalam bentuk hari. contoh: Rabu

        $datePick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('Y-m-d');
        //mengambil nilai dari tanggal yang dipilih oleh admin, dan menkonversinya dalam bentuk tanggal dengan format YYYY-MM-DD. contoh: 2022-07-02

        $hourPick = Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->translatedFormat('H:i');
        //mengambil nilai dari tanggal yang dipilih oleh admin, dan menkonversinya dalam bentuk jam dengan format HH:MM. contoh: 08:34

        $dayPickLower = strtolower($dayPick);
        //mengubah string case ke lowerCase contoh Rabu => rabu
        $jadwalsDokter = JadwalDokter::with('dokter')->where('hari', '=', $dayPickLower)->get();
        //Mengambil semua jadwal dokter yang sesuai dengan hari yang dipilih oleh admin. contoh: Admin memilih hari rabu -> semua jadwal dokter di hari rabu
        $doctorDates = $jadwalsDokter->map(function ($item) use ($minimalServing, $quantumInMinutes, $datePick, $hourPick) {
            //mapping -> melooping jadwal dokter yang telah diambil sebelumnya
            $doctorDateStart = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $item->jam_mulai)->subMinutes($minimalServing);
            //mengambil waktu mulai dokter jaga untuk dikurang dengan minimal pelayanan -> supaya pasien dapat dijadwalkan dengan dokter lain jika pasien datang kurang dari waktu minimal pelayanan
            $doctorDateFinish = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $item->jam_selesai)->subMinutes($minimalServing);
            //mengambil waktu selesai dokter jaga untuk dikurang dengan minimal pelayanan -> supaya pasien dapat dijadwalkan dengan dokter lain jika pasien datang kurang dari waktu minimal pelayanan

            $diffDateStart = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $hourPick)->diffInMinutes($doctorDateStart);
            //mengambil nilai perbedaan/selisih dari tanggal yang dipilih admin dan waktu mulai dokter jaga dalam satuan menit

            $diffDateFinish = Carbon::createFromFormat('Y-m-d H:i', $datePick . ' ' . $hourPick)->diffInMinutes($doctorDateFinish);
            //mengambil nilai perbedaan/selisih dari tanggal yang dipilih admin dan waktu selesai dokter jaga dalam satuan menit
            if (($diffDateStart <= $quantumInMinutes) && ($diffDateFinish <= $quantumInMinutes)) {
                //dokter yang akan dipilih apabila memenuhi kondisi seperti ini. (jika waktu mulai kurang dari nilai quantum dan waktu selesai kurang dari kuantum)
                if (($diffDateStart == 0)) {
                    //Jika selisih waktu antara waktu yang dipilih dan waktu mulai dokter jaga sama dengan 0, (tidak ada selisih) maka dokter tidak akan dipilih
                    //Ini berguna untuk menghindari pemilihan dokter yang dobel. 2 kali memilih
                    $isDoctorPicked = false;
                } else {
                    $isDoctorPicked = true;
                }
            } else {
                $isDoctorPicked = false;
            }
            $returnValue = [
                'picked' => $isDoctorPicked,
                'dokter' => $item->dokter,
                "diff_time_start" => $diffDateStart,
                'diff_time_finish' => $diffDateFinish,
                'jadwal' => $item->jam_mulai . '-' . $item->jam_selesai,
                'start' => $item->jam_mulai,
                'end' => $item->jam_selesai
            ];
            
            return $returnValue;
            //Mengembalikan nilai value dan di simpan ke variabel array $doctorDates
        });
        $pickedDoctor = $doctorDates->filter(function ($item) {
            //Melakukan filter dokter yang dipilih saja.

            return $item['picked'] == true;
        });
        if ($pickedDoctor == null) {
            //Jika tidak ada dokter yang dipilih, maka kembalikan nilai "Dokter not found"

            return Response::json(['success' => false, 'message' => 'Doctor not found']);
        }
        $dokterPicked = $pickedDoctor->first();
        //Jika dokter yang dipilih ada, ambil array pertama

        $jadwalTerakhir = null;
        //Mendeklarasikan variabel jadwalTerakhir

        if ($dokterPicked != null) {
            //Jika dokter pertama yang dipilih nilainya tidak sama dengan null

            $from = $datePick . ' ' . $dokterPicked['start'];
            //menggabungkan antara tanggal yang dipilih admin dan waktu mulai dokter jaga

            $to = $datePick . ' ' . $dokterPicked['end'];
            //menggabungkan antara tanggal yang dipilih admin dan waktu selesai dokter jaga

            $jadwalTerakhir = JadwalCheckup::with("dokter")->where('dokter_id', '=', $dokterPicked['dokter']->id)->whereBetween('tgl_checkup', [$from, $to])->orderBy('tgl_checkup', 'desc')->get()->first();
            //mengambil jadwal terakhir untuk mengambil nilai antrian terakhir di antara waktu dokter jaga
        }
        return Response::json(['success' => true, 'dokters' => $doctorDates, 'day' => $dayPick, 'hour' => $hourPick, 'pickedDoctor' => $dokterPicked, 'jadwalTerakhir' => $jadwalTerakhir]);
        //Mengembalikan nilai -> response json, untuk di consume oleh client -> Javascript (Jquery)
    }
}
