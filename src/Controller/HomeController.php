<?php

namespace App\Controller;

use App\Repository\TheoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param TheoryRepository $theoryRepository
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function indexAction(TheoryRepository $theoryRepository)
    {
        $theory = $theoryRepository->getRandom();

        return $this->render('home/home.html.twig', ['theory' => $theory]);
    }
}
