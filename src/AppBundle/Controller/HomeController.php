<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $images = [
          'bran-1.jpg',
          'bran-2.jpg',
          'bran-3.jpg',
          'the-king.jpeg',
          'aria-1.jpg',
          'george-1.jpg',
        ];
        shuffle($images);
        // replace this example code with whatever you need
        return $this->render('@App/home/home.html.twig', ['king_image' => $images[0]]);
    }
}
