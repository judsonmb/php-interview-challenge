<?php

namespace App\Http\Controllers\API\V1\DogFacts\Rest;

use App\Http\Controllers\Controller;
use App\Repositories\DogFactRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    protected DogFactRepository $repository;

    public function __construct(DogFactRepository $dogFactRepository)
    {
        $this->repository = $dogFactRepository;
    }

    public function __invoke(Request $request): Response
    {
        $dogFacts = $this->repository->getAllWithPagination($request->all());

        return response()->json($dogFacts);
    }
}
