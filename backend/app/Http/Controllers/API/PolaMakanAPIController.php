<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePolaMakanAPIRequest;
use App\Http\Requests\API\UpdatePolaMakanAPIRequest;
use App\Models\PolaMakan;
use App\Repositories\PolaMakanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PolaMakanResource;
use Response;

/**
 * Class PolaMakanController
 * @package App\Http\Controllers\API
 */

class PolaMakanAPIController extends AppBaseController
{
    /** @var  PolaMakanRepository */
    private $polaMakanRepository;

    public function __construct(PolaMakanRepository $polaMakanRepo)
    {
        $this->polaMakanRepository = $polaMakanRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/polaMakans",
     *      summary="getPolaMakanList",
     *      tags={"PolaMakan"},
     *      description="Get all PolaMakans",
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
     *                  @OA\Items(ref="#/definitions/PolaMakan")
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
        $polaMakans = $this->polaMakanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PolaMakanResource::collection($polaMakans), 'Pola Makans retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Post(
     *      path="/polaMakans",
     *      summary="createPolaMakan",
     *      tags={"PolaMakan"},
     *      description="Create PolaMakan",
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
     *                  ref="#/definitions/PolaMakan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePolaMakanAPIRequest $request)
    {
        $input = $request->all();

        $polaMakan = $this->polaMakanRepository->create($input);

        return $this->sendResponse(new PolaMakanResource($polaMakan), 'Pola Makan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/polaMakans/{id}",
     *      summary="getPolaMakanItem",
     *      tags={"PolaMakan"},
     *      description="Get PolaMakan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaMakan",
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
     *                  ref="#/definitions/PolaMakan"
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
        /** @var PolaMakan $polaMakan */
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            return $this->sendError('Pola Makan not found');
        }

        return $this->sendResponse(new PolaMakanResource($polaMakan), 'Pola Makan retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/polaMakans/{id}",
     *      summary="updatePolaMakan",
     *      tags={"PolaMakan"},
     *      description="Update PolaMakan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaMakan",
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
     *                  ref="#/definitions/PolaMakan"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePolaMakanAPIRequest $request)
    {
        $input = $request->all();

        /** @var PolaMakan $polaMakan */
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            return $this->sendError('Pola Makan not found');
        }

        $polaMakan = $this->polaMakanRepository->update($input, $id);

        return $this->sendResponse(new PolaMakanResource($polaMakan), 'PolaMakan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/polaMakans/{id}",
     *      summary="deletePolaMakan",
     *      tags={"PolaMakan"},
     *      description="Delete PolaMakan",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of PolaMakan",
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
        /** @var PolaMakan $polaMakan */
        $polaMakan = $this->polaMakanRepository->find($id);

        if (empty($polaMakan)) {
            return $this->sendError('Pola Makan not found');
        }

        $polaMakan->delete();

        return $this->sendSuccess('Pola Makan deleted successfully');
    }
}
