<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrameRequest;
use App\Repositories\FrameRepository;
use Illuminate\Http\JsonResponse;

class FrameController extends Controller
{
    private $frameRepository ;

    /**
     * @param $frameRepository
     */
    public function __construct(FrameRepository $frameRepository)
    {
        $this->frameRepository = $frameRepository;
    }

    /**
     * @param FrameRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(FrameRequest $request) : JsonResponse
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $status = $request->input('status');
        $stock = $request->input('stock');
        $prices = $request->prices;
        $this->frameRepository->create( $name ,  $description , $status, $stock , $prices);
        return response()->json('success',201);
    }


}
