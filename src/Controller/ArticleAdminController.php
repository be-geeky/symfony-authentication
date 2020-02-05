<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleAdminController
 *
 * @package App\Controller
 */
class ArticleAdminController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN_ARTICLE")
     * @Route("/admin/article/new",name="admin_articles_new")
     */
    public function new(EntityManagerInterface $em)
    {
        die('todo');

        return new Response(sprintf(
            'Hiya! New Article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }

    /**
     * @Route("/admin/article/{id}/edit")
     * @param Article $article
     */
    public function edit(Article $article)
    {
        echo $article->getAuthor();
        echo "<br />";
        echo $this->getUser();
        if($article->getAuthor() != $this->getUser() && !$this->isGranted('ROLE_ADMIN_ARTICLE')){
            throw $this->createAccessDeniedException('No Access');
        }
        dd($article);
    }
}
