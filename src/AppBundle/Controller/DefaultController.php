<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $a = '<strong>holaaaaa</strong>';
        $foo = uniqid();

        return $this->render('@App/default/index.html.twig', array(
            'var1' => $foo,
            'a' => $a
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
