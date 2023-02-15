<?php

namespace App\Http\Controllers\API\V1\CatFacts\Rest;

use App\Http\Controllers\Controller;
use App\Repositories\CatFactRepository;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends Controller
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

        try {
            $deleted = $this->repository->destroy($catFact);
        } catch (Exception $exception) {
            abort(500, $exception->getMessage());
        }

        if (!$deleted) {
            abort(500, 'Cat fact could not be deleted');
        }

        return response()->json(null, 204);
    }
}
