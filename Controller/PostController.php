<?php

namespace Mayeco\PostBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations\QueryParam;

/**
 * Class PostController
 * @package Mayeco\PostBundle\Controller
 */
class PostController extends \Mayeco\BaseBundle\Controller\Controller
{

    /**
     * @QueryParam(name="page", requirements="\d+", default="1", description="")
     */
    public function listAction(Request $request, $page)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $this->getPaginator($repository->queryAllPost(), $page);

        $this->addData($posts, "posts");
        $this->setTemplate("MayecoPostBundle::Post/list.html.twig");

        return $this->view();
    }

    /**
     * @QueryParam(name="page", requirements="\d+", default="1", description="")
     */
    public function singleAction(Request $request, $id, $_format, $page)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $post = $repository->findPost($id);
        $comments = $this->getPaginator($repository->queryComments($id), $page, 2);

        $this->addData($post, "post");

        if("html" == $_format) {

            $this->addData($comments, "comments");
            $this->setTemplate("MayecoPostBundle::Post/single.html.twig");

        }

        return $this->view();
    }

}
