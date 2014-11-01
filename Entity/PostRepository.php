<?php

namespace Mayeco\PostBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PostsRepository
 *
 */
class PostRepository extends EntityRepository
{

    public function findAllPost()
    {
        return $this->queryAllPost()->execute();
    }

    public function queryAllPost()
    {
        $q = $this->createQueryBuilder('post')
            ->select('post, children')
            ->leftJoin('post.children', 'children')
            ->where('post.posttype = :posttype')
            ->andWhere('children.posttype = :commenttype')
            ->setParameter('posttype', 'post')
            ->setParameter('commenttype', 'comment')
            ->getQuery()
        ;

        return $q;
    }

    public function queryPost($id)
    {
        $q = $this->createQueryBuilder('post')
            ->select('post')
            ->leftJoin('post.children', 'children')
            ->where('post.posttype = :posttype')
            ->andWhere('children.posttype = :commenttype')
            ->andWhere('post.id = :id')
            ->setParameter('posttype', 'post')
            ->setParameter('commenttype', 'comment')
            ->setParameter('id', $id)
            ->getQuery()
        ;

        return $q;
    }

    public function findPost($id)
    {

        return $this->queryPost($id)->getSingleResult();
    }

}