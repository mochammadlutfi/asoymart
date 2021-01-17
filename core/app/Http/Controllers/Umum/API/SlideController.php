<?php

namespace App\Http\Controllers\Umum\API;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Prettus\Repository\Exceptions\RepositoryException;
use Flash;

/**
 * Class SlideController
 * @package App\Http\Controllers\API
 */

class SlideController extends Controller
{

    public function __construct()
    {
        // $this->slideRepository = $slideRepo;
    }

    /**
     * Display a listing of the Slide.
     * GET|HEAD /slides
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $slides = Promo::where('is_active', 1)->where('is_featured', 1)->get();
        // dd($slides);
        // return response()->json($slides->toArray());
        return $this->sendResponse($slides->toArray(), 'Slides retrieved successfully');
    }

    /**
     * Display the specified Slide.
     * GET|HEAD /slides/{id}
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        /** @var Slide $slide */
        if (!empty($this->slideRepository)) {
            $slide = $this->slideRepository->findWithoutFail($id);
        }

        if (empty($slide)) {
            return $this->sendError('Slide not found');
        }

        return $this->sendResponse($slide->toArray(), 'Slide retrieved successfully');
    }
}
