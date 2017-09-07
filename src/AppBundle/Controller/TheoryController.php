<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Theory;
use AppBundle\Form\TheoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TheoryController extends Controller
{

    /**
     * @Route("/theory/add", name="theory_add")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $theory = new Theory();
        $form = $this->createForm(TheoryType::class, $theory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($theory);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('theory_show', ['id' => $theory->getId()]);
        }

        return $this->render('@App/theory/add.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/theory/show/{id}", name="theory_show")
     * @ParamConverter(class="AppBundle\Entity\Theory", name="theory")
     *
     * @param Theory $theory
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Theory $theory)
    {
        return $this->render('@App/theory/show.html.twig', ['theory' => $theory]);
    }
}