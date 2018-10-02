<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactarType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/orlas", name="orlas")
     */
    public function orlasAction(Request $request)
    {
        // replace this example code with whatever you need
//        return $this->render('default/orlas.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
        return $this->render('default/orlas.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/fotoescuela", name="fotoescuela")
     */
    public function fotoescuelaAction(Request $request)
    {
        return $this->render('default/fotoescuela.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/graduaciones", name="graduaciones")
     */
    public function graduacionesAction(Request $request)
    {
        return $this->render('default/graduaciones.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/estudio", name="estudio")
     */
    public function estudioAction(Request $request)
    {
        return $this->render('default/estudio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('default/about.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/contactar", name="contactar")
     */
    public function contactarAction(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactarType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contacto = $form->getData();

            $message = (new \Swift_Message($contacto['asunto']))
                ->setFrom('apartefotografia@apartefotografia.es')
//                ->setTo('info@apartefotografia.es')
                ->setTo('info@apartefotografia.es')
                ->setBody(
                    $this->renderView(
                        'Emails/contacto.html.twig',
                        array('contacto' => $contacto)
                    ),
                    'text/html'
                )
            ;
            $mailer->send($message);

            return $this->render('default/contactar-enviado.html.twig');
        }

        return $this->render('default/contactar.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mantenimiento", name="mantenimiento")
     */
    public function mantenimientoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/mantenimiento.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
