<?php

namespace Mayeco\PostBundle\Controller;


class DefaultController extends \Mayeco\BaseBundle\Controller\Controller
{

    public function listAction()
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $repository->findAll();

        return $this->render('MayecoPostBundle:Post:list.html.twig', array('posts' => $posts));
    }

    public function singleAction($id)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $post = $repository->findOneBy(array("id" => $id));

        return $this->render('MayecoPostBundle:Post:single.html.twig', array('post' => $post));
    }

}
