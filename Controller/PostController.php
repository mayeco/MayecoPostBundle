<?php

namespace Mayeco\PostBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostController
 * @package Mayeco\PostBundle\Controller
 */
class PostController extends \Mayeco\BaseBundle\Controller\Controller
{

    /**
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $page = $request->query->get('page');
        if(!$page)
            $page = 1;

        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $this->getPaginator($repository->queryAllPost(), $page);

        $this->addData($posts, "posts");
        $this->addData($page, "page");
        $this->setTemplate("MayecoPostBundle::Post/list.html.twig");

        return $this->view();
    }

    /**
     * @param $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function singleAction(Request $request, $id)
    {
        $page = $request->query->get('page');
        if(!$page)
            $page = 1;

        $this->addData($page, "page");
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $post = $repository->findPost($id);
        $comments = $this->getPaginator($repository->queryComments($id), $page, 2);

        $this->addData($comments, "comments");
        $this->addData($post, "post");
        $this->setTemplate("MayecoPostBundle::Post/single.html.twig");

        return $this->view();
    }

}
