<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePolaObatAPIRequest;
use App\Http\Requests\API\UpdatePolaObatAPIRequest;
use App\Models\PolaObat;
use App\Repositories\PolaObatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PolaObatResource;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Response;

/**
 * Class PolaObatController
 * @package App\Http\Controllers\API
 */
class PolaObatAPIController extends AppBaseController
{
    /** @var  PolaObatRepository */
    private $polaObatRepository;

    public function __construct(PolaObatRepository $polaObatRepo)
    {
        $this->polaObatRepository = $polaObatRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/polaObats",
     *      summary="getPolaObatList",
     *      tags={"PolaObat"},
     *      description="Get all PolaObats",
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
     *                  @OA\Items(ref="#/definitions/PolaObat")
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
        $polaObats = $this->polaObatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit'), ['jadwal_checkup', 'pemeriksaan']
        );

        return $this->sendResponse(PolaObatResource::collection($polaObats), 'Pola Obats retrieved successfully');
    }

    /**
     * @param CreatePolaObatAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/polaObats",
     *      summary="createPolaObat",
     *      tags={"PolaObat"},
     *      description="Create PolaObat",
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
     *                  ref="#/definitions/PolaObat"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePolaObatAPIRequest $request)
    {
        $input = $request->all();

        $polaObat = $this->polaObatRepository->create($input);

        return $this->sendResponse(new PolaObatResource($polaObat), 'Pola Obat saved successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/polaObats/{id}",
     *      summary="getPolaObatItem",
     *      tags={"PolaObat"},
     *      description="Get PolaObat",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaObat",
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
     *                  ref="#/definitions/PolaObat"
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
        /** @var PolaObat $polaObat */
        $polaObat = $this->polaObatRepository->find($id, ['jadwal_checkup', 'pemeriksaan']);

        if (empty($polaObat)) {
            return $this->sendError('Pola Obat not found');
        }

        return $this->sendResponse(new PolaObatResource($polaObat), 'Pola Obat retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/polaObats/{id}",
     *      summary="updatePolaObat",
     *      tags={"PolaObat"},
     *      description="Update PolaObat",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaObat",
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
     *                  ref="#/definitions/PolaObat"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePolaObatAPIRequest $request)
    {
        $input = $request->all();

        /** @var PolaObat $polaObat */
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            return $this->sendError('Pola Obat not found');
        }

        $polaObat = $this->polaObatRepository->update($input, $id);

        return $this->sendResponse(new PolaObatResource($polaObat), 'PolaObat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/polaObats/{id}",
     *      summary="deletePolaObat",
     *      tags={"PolaObat"},
     *      description="Delete PolaObat",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaObat",
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
        /** @var PolaObat $polaObat */
        $polaObat = $this->polaObatRepository->find($id);

        if (empty($polaObat)) {
            return $this->sendError('Pola Obat not found');
        }

        $polaObat->delete();

        return $this->sendSuccess('Pola Obat deleted successfully');
    }
}
