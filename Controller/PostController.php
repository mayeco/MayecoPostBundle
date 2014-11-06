<?php

namespace Mayeco\PostBundle\Controller;

use Mayeco\PostBundle\Entity\Post;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Query;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
    public function listAction($page)
    {
        $repository = $this->getRepository('MayecoPostBundle:Post');
        $posts = $this->getPaginator($repository->queryAllPost(), $page);

        $this->addData($posts, "posts");
        $this->setTemplate("MayecoPostBundle::Post/list.html.twig");

        return $this->view();
    }

    /**
     * @QueryParam(name="page", requirements="\d+", default="1", description="")
     * @ParamConverter("post", class="MayecoPostBundle:Post")
     * @ParamConverter("commentsquery", class="MayecoPostBundle:Post", options={"repository_method" = "queryComments"})
     *
     */
    public function singleAction(Post $post, Query $commentsquery, $page)
    {
        $comments = $this->getPaginator($commentsquery, $page, 2);

        $this->addData($post, "post");
        $this->addData($comments, "comments");
        $this->setTemplate("MayecoPostBundle::Post/single.html.twig");

        return $this->view();
    }

}
