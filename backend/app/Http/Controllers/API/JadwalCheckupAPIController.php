<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJadwalCheckupAPIRequest;
use App\Http\Requests\API\UpdateJadwalCheckupAPIRequest;
use App\Models\JadwalCheckup;
use App\Repositories\JadwalCheckupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Response;

/**
 * Class JadwalCheckupController
 * @package App\Http\Controllers\API
 */

class JadwalCheckupAPIController extends AppBaseController
{
    /** @var  JadwalCheckupRepository */
    private $jadwalCheckupRepository;

    public function __construct(JadwalCheckupRepository $jadwalCheckupRepo)
    {
        $this->jadwalCheckupRepository = $jadwalCheckupRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Get(
     *      path="/jadwalCheckups",
     *      summary="getJadwalCheckupList",
     *      tags={"JadwalCheckup"},
     *      description="Get all JadwalCheckups",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/definitions/JadwalCheckup")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $jadwalCheckups = $this->jadwalCheckupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jadwalCheckups->toArray(), 'Jadwal Checkups retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Post(
     *      path="/jadwalCheckups",
     *      summary="createJadwalCheckup",
     *      tags={"JadwalCheckup"},
     *      description="Create JadwalCheckup",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *                type="object",
     *                required={""},
     *                @OA\Property(
     *                    property="name",
     *                    description="desc",
     *                    type="string"
     *                )
     *            )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/JadwalCheckup"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJadwalCheckupAPIRequest $request)
    {
        $input = $request->all();

        $jadwalCheckup = $this->jadwalCheckupRepository->create($input);

        return $this->sendResponse($jadwalCheckup->toArray(), 'Jadwal Checkup saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/jadwalCheckups/{id}",
     *      summary="getJadwalCheckupItem",
     *      tags={"JadwalCheckup"},
     *      description="Get JadwalCheckup",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of JadwalCheckup",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/JadwalCheckup"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var JadwalCheckup $jadwalCheckup */
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            return $this->sendError('Jadwal Checkup not found');
        }

        return $this->sendResponse($jadwalCheckup->toArray(), 'Jadwal Checkup retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/jadwalCheckups/{id}",
     *      summary="updateJadwalCheckup",
     *      tags={"JadwalCheckup"},
     *      description="Update JadwalCheckup",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of JadwalCheckup",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *                type="object",
     *                required={""},
     *                @OA\Property(
     *                    property="name",
     *                    description="desc",
     *                    type="string"
     *                )
     *            )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/JadwalCheckup"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJadwalCheckupAPIRequest $request)
    {
        $input = $request->all();

        /** @var JadwalCheckup $jadwalCheckup */
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            return $this->sendError('Jadwal Checkup not found');
        }

        $jadwalCheckup = $this->jadwalCheckupRepository->update($input, $id);

        return $this->sendResponse($jadwalCheckup->toArray(), 'JadwalCheckup updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/jadwalCheckups/{id}",
     *      summary="deleteJadwalCheckup",
     *      tags={"JadwalCheckup"},
     *      description="Delete JadwalCheckup",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of JadwalCheckup",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var JadwalCheckup $jadwalCheckup */
        $jadwalCheckup = $this->jadwalCheckupRepository->find($id);

        if (empty($jadwalCheckup)) {
            return $this->sendError('Jadwal Checkup not found');
        }

        $jadwalCheckup->delete();

        return $this->sendSuccess('Jadwal Checkup deleted successfully');
    }
}
