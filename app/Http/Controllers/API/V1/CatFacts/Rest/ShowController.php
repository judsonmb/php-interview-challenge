<?php

namespace App\Http\Controllers\API\V1\CatFacts\Rest;

use App\Http\Controllers\Controller;
use App\Repositories\CatFactRepository;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    protected CatFactRepository $repository;

    public function __construct(CatFactRepository $catFactRepository)
    {
        $this->repository = $catFactRepository;
    }

    public function __invoke(int $id): Response
    {
        $catFact = $this->repository->getById($id);

        if (!$catFact) {
            abort(404);
        }

        return response()->json($catFact);
    }
}
