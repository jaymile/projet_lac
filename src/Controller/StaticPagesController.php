<?php

namespace App\Controller;

use \App\Entity\Lodging;
use App\Repository\LodgingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticPagesController extends AbstractController
{

    /**
     * @var LodgingRepository
     */

    private $repository;

    public function __construct(LodgingRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        /**
         * on recupere les derniers creation garce a la function de lodgin grace a la function
         * findlatest(), qui a ete créé dans LodgingRepository
         * je l'inject dans le paramettre  de la function pour pourvoir la recuperé 
         */
        $lodgings = $this->repository->findlatest();
        dump($lodgings);
        return $this->render('static_pages/home.html.twig', [
            'lodgings' => $lodgings
        ]);
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu(): Response
    {
        return $this->render('static_pages/cgu.html.twig');
    }
}
