<?php

namespace Mayeco\PostBundle\Controller;

/**
 * Class PostController
 * @package Mayeco\PostBundle\Controller
 */
class PostController extends \Mayeco\BaseBundle\Controller\Controller
{

    /**
     * @param $pagina
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($page)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $this->getPaginator($repository->queryAllPost(), $page, 10);

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
