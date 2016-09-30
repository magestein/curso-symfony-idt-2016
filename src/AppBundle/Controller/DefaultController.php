<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Producto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $productos = $em->getRepository('AppBundle:Producto')->findAll();

        dump($productos);

        $a2 = '<strong>holaaaaa</strong>';
        $foo = uniqid();

        return $this->render('@App/default/index.html.twig', array(
            'var1' => $foo,
            'a' => $a2
        ));
    }

    public function contactoAction()
    {
        return $this->render('@App/default/contacto.html.twig');
    }

    public function productosAction()
    {
        return $this->render('@App/default/productos.html.twig');
    }
}
