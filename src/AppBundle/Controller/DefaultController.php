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

        $c1 = new Categoria();

        $c1->setNombre('Categoria 2')
            ->setEstado('A');

        $p1 = new Producto();

        $p1
            ->setNombre('Producto 1')
            ->setEstado('A')
            ->setPrecio(1000)
            ->setOferta(false)
            ->setNuevo(new \DateTime())
            ->setCategoria($c1);


        $em->persist($c1);
        $em->persist($p1);
        $em->flush();

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
