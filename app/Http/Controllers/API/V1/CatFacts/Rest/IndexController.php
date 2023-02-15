<?php

namespace App\Http\Controllers\API\V1\CatFacts\Rest;

use App\Http\Controllers\Controller;
use App\Repositories\CatFactRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    protected CatFactRepository $repository;

    public function __construct(CatFactRepository $catFactRepository)
    {
        $this->repository = $catFactRepository;
    }

    public function __invoke(Request $request): Response
    {
        $catFacts = $this->repository->getAllWithPagination($request->all());

        return response()->json($catFacts);
    }
}
