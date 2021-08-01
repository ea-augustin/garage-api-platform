<?php

namespace App\Controller;

use App\Repository\AdvertisementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    private $advertisementRepository;

    /**
     * SearchController constructor.
     * @param AdvertisementRepository $advertisementRepository
     */
    public function __construct(AdvertisementRepository $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }


    #[Route('/api/search', name: 'search')]
    public function index(
        Request $request
    ): Response {
        $filters = [
            'brand' => $request->query->get('brand'),
            'fueltype' => $request->query->get('fueltype'),
            'model' => $request->query->get('model'),
            'maxKm' => $request->query->get('maxKm'),
            'minKm' => $request->query->get('minKm'),
            'maxYear' => $request->query->get('maxYear'),
            'minYear' => $request->query->get('minYear'),
            'maxPrice' => $request->query->get('maxPrice'),
            'minPrice' => $request->query->get('minPrice'),
        ];

        $results = $this->advertisementRepository->search($filters);
        $searchResults = ['results' => $results, 'filters' => $filters];
        return $this->json($searchResults);
    }
}
