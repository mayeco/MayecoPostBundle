<?php

namespace Mayeco\PostBundle\Controller;


/**
 * Class DefaultController
 * @package Mayeco\PostBundle\Controller
 */
class PostController extends \Mayeco\BaseBundle\Controller\Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $repository->findAllPost();

        $this->addData($posts, "posts");
        $this->setTemplate("MayecoPostBundle::Post/list.html.twig");

        return $this->view();
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function singleAction($id)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $post = $repository->findPost($id);

        $this->addData($post, "post");
        $this->setTemplate("MayecoPostBundle::Post/single.html.twig");

        return $this->view();
    }

}
