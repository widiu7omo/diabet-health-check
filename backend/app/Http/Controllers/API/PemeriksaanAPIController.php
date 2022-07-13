<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePemeriksaanAPIRequest;
use App\Http\Requests\API\UpdatePemeriksaanAPIRequest;
use App\Models\Pemeriksaan;
use App\Repositories\PemeriksaanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PemeriksaanResource;
use OpenApi\Annotations as OA;
use Response;

/**
 * Class PemeriksaanController
 * @package App\Http\Controllers\API
 */
class PemeriksaanAPIController extends AppBaseController
{
    /** @var  PemeriksaanRepository */
    private $pemeriksaanRepository;

    public function __construct(PemeriksaanRepository $pemeriksaanRepo)
    {
        $this->pemeriksaanRepository = $pemeriksaanRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/pemeriksaans",
     *      summary="getPemeriksaanList",
     *      tags={"Pemeriksaan"},
     *      description="Get all Pemeriksaans",
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
     *                  @OA\Items(ref="#/definitions/Pemeriksaan")
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
        $pemeriksaans = $this->pemeriksaanRepository->all(
            array_merge($request->except(['skip', 'limit']), ['pasien_id' => $request->user()->id]),
            $request->get('skip'),
            $request->get('limit'),
            ['pasien', 'dokter']
        );
        return $this->sendResponse(PemeriksaanResource::collection($pemeriksaans), 'Pemeriksaans retrieved successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/pemeriksaans",
     *      summary="createPemeriksaan",
     *      tags={"Pemeriksaan"},
     *      description="Create Pemeriksaan",
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
     *                  ref="#/definitions/Pemeriksaan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePemeriksaanAPIRequest $request)
    {
        $input = $request->all();

        $pemeriksaan = $this->pemeriksaanRepository->create($input);

        return $this->sendResponse(new PemeriksaanResource($pemeriksaan), 'Pemeriksaan saved successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/pemeriksaans/{id}",
     *      summary="getPemeriksaanItem",
     *      tags={"Pemeriksaan"},
     *      description="Get Pemeriksaan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pemeriksaan",
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
     *                  ref="#/definitions/Pemeriksaan"
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
        /** @var Pemeriksaan $pemeriksaan */
        $pemeriksaan = $this->pemeriksaanRepository->find($id, ['dokter', 'pasien']);

        if (empty($pemeriksaan)) {
            return $this->sendError('Pemeriksaan not found');
        }

        return $this->sendResponse(new PemeriksaanResource($pemeriksaan), 'Pemeriksaan retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/pemeriksaans/{id}",
     *      summary="updatePemeriksaan",
     *      tags={"Pemeriksaan"},
     *      description="Update Pemeriksaan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pemeriksaan",
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
     *                  ref="#/definitions/Pemeriksaan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePemeriksaanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pemeriksaan $pemeriksaan */
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            return $this->sendError('Pemeriksaan not found');
        }

        $pemeriksaan = $this->pemeriksaanRepository->update($input, $id);

        return $this->sendResponse(new PemeriksaanResource($pemeriksaan), 'Pemeriksaan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/pemeriksaans/{id}",
     *      summary="deletePemeriksaan",
     *      tags={"Pemeriksaan"},
     *      description="Delete Pemeriksaan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pemeriksaan",
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
        /** @var Pemeriksaan $pemeriksaan */
        $pemeriksaan = $this->pemeriksaanRepository->find($id);

        if (empty($pemeriksaan)) {
            return $this->sendError('Pemeriksaan not found');
        }

        $pemeriksaan->delete();

        return $this->sendSuccess('Pemeriksaan deleted successfully');
    }
}
