<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $productos = $this->getDoctrine()
            ->getRepository('AppBundle:Producto')
            ->getNuevosProductos(8);

        return $this->render('@App/default/index.html.twig', array(
            'productos' => $productos
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

    public function dataImportAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $c1 = new Categoria();
        $c2 = new Categoria();
        $c3 = new Categoria();

        $c1->setNombre('Categoría 1')
            ->setEstado('A');

        $c2->setNombre('Categoría 2')
            ->setEstado('I');

        $c3->setNombre('Categoría 3')
            ->setEstado('A');


        $p1 = new Producto();
        $p2 = new Producto();
        $p3 = new Producto();
        $p4 = new Producto();
        $p5 = new Producto();
        $p6 = new Producto();
        $p7 = new Producto();
        $p8 = new Producto();
        $p9 = new Producto();
        $p10 = new Producto();

        $p1->setNombre('Producto 1')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p2->setNombre('Producto 2')
            ->setCategoria($c1)
            ->setPrecio(600)
            ->setEstado('A')
            ->setOferta(false);

        $p3->setNombre('Producto 3')
            ->setCategoria($c2)
            ->setPrecio(1500)
            ->setEstado('I')
            ->setOferta(false);

        $p4->setNombre('Producto 4')
            ->setCategoria($c3)
            ->setPrecio(5000)
            ->setEstado('A')
            ->setOferta(true);

        $p5->setNombre('Producto 5')
            ->setCategoria($c1)
            ->setPrecio(5500)
            ->setEstado('A')
            ->setOferta(false);

        $p6->setNombre('Producto 6')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p7->setNombre('Producto 7')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p8->setNombre('Producto 8')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p9->setNombre('Producto 9')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p10->setNombre('Producto 10')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $em->persist($p1);
        $em->persist($p2);
        $em->persist($p3);
        $em->persist($p4);
        $em->persist($p5);
        $em->persist($p6);
        $em->persist($p7);
        $em->persist($p8);
        $em->persist($p9);
        $em->persist($p10);

        $em->flush();

        die('importacion terminada');
    }
}
