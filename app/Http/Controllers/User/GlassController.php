<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGlassRequest;
use App\Repositories\GlassRepository;

class GlassController extends Controller
{
    private $glassRepository;

    /**
     * @param $glassRepository
     */
    public function __construct(GlassRepository $glassRepository)
    {
        $this->glassRepository = $glassRepository;
    }
    public function create(CreateGlassRequest $request)
    {
        $frameId = $request->input('frame_id');
        $lensId = $request->input('lens_id');
        $this->glassRepository->create($frameId , $lensId );
        return response()->json('success',201);

    }


}
