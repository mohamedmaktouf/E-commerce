<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LensRequest;
use App\Repositories\LensRepository;

class LensController extends Controller
{
    private $lensRepository;

    /**
     * @param $lensRepository
     */
    public function __construct(LensRepository $lensRepository)
    {
        $this->lensRepository = $lensRepository;
    }

    public function create(LensRequest $request)
    {
         $colour = $request->input('colour');
         $description = $request->input('description');
         $prescription = $request->input('prescription_type');
         $type = $request->input('lens_type');
         $stock = $request->input('stock');
         $prices = $request->prices;
         $this->lensRepository->create( $colour ,  $description ,  $prescription , $type, $stock , $prices);
         return response()->json('success',201);
    }

}
