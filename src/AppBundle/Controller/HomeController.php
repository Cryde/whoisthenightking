<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Theory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $theory = $this->getDoctrine()->getRepository(Theory::class)->getRandom();

        return $this->render('@App/home/home.html.twig', ['theory' => $theory]);
    }
}
