<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\LensRepository;
use Illuminate\Http\JsonResponse;

class LensController extends Controller
{
    protected $lensRepository;

    /**
     * @param $lensRepository
     */
    public function __construct(LensRepository $lensRepository)
    {
        $this->lensRepository = $lensRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getLenses() : JsonResponse
    {
        $lenses = $this->lensRepository->getLenses();
        return response()->json($lenses);
    }

}
