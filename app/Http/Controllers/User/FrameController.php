<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\FrameRepository;
use Illuminate\Http\JsonResponse;

class FrameController extends Controller
{
    private $frameRepository;

    /**
     * @param $frameRepository
     */
    public function __construct(FrameRepository $frameRepository)
    {
        $this->frameRepository = $frameRepository;
    }
    public function getActiveFrames() : JsonResponse
    {
        $frames = $this->frameRepository->getActiveFrames();
        return response()->json($frames);
    }


}
