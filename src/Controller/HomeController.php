<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdaterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ListingRepository $listingRepository,
        PaginatorInterface $paginator,
        FilterBuilderUpdaterInterface $builderUpdater,
        Request $request
    ): Response
    {

        $qb = $listingRepository->getQbAll();
        $listing = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            12
        );
         dump($listing);
        return $this->render('front/home/index.html.twig', [
            'listing'=> $listing
        ]);
    }

    #[Route('/detail{id}', name: 'app_detail')]
    public function detail(
        ListingRepository $listingRepository,
        $id
    ): Response
    {

        $qb = $listingRepository->find($id);


        return $this->render('front/partials/detailListing.html.twig', [
            'listing'=> $qb
        ]);
    }


}
