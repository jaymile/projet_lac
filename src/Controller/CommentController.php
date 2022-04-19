<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class CommentController extends AbstractController
{
    //#[Route('/comment', name: 'comment')]

    /**
     * @Route"/article/{id}/comment/new", name="post_comment", methods={"POST}
     */
    public function post(Article $article, Request $request, EntityManagerInterface $em, MailerInterface $mailer, SluggerInterface $slugger)
    {
        if ($this->isCsrfTokenValid('post_comment', $request->query->get('csrf'))) {

            $comment = new Comment;

            $comment->setCreatedBy($this->getUser());

            $date = new \DateTime();
            $comment->setDatePublication($date);
            $comment->setContenu($request->request->get('contenu'));
            $comment->setArticle($article);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $mailer->send(
                (new TemplatedEmail())
                    ->from('LAC <testdev.jay@gmail.com>')
                    ->to($article->getCreatedBy()->getEmail())
                    ->text('Un utilisateur a commenté votre article "' . $article->getTitle() . '"')
            );

            return $this->json($comment, 201, [], [
                'groups' => ['to-serialize']
            ]);
        } else {
            return new Response;
        }



        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
