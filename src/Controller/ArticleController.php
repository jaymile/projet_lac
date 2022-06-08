<?php

namespace App\Controller;

use App\Entity\Image;
use DateTimeImmutable;
use App\Entity\Article;
use App\Entity\Comment;
use App\Form\ArticleType;
use App\Form\CommentType;
use App\Service\UploadService;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(), //modifier et mettre en premier les derniere creation. findby(['created_at' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UploadService $uploader, SluggerInterface $slugger): Response
    {
        $article = new Article();
        $article->setCreatedBy($this->getUser());

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            //on recupere les images transmises
            $images = $form->get('images')->getData();
            //on boucle sur les images car on peut en avoir plusieur
            foreach ($images as $image) {
                //on genere un nouveau nom de fichier aleatoir
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                //on copie le fichier dans le dossier imagres en utilisant la methode 'move()'
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // on stock le nom de limage dans la bse de donné
                $img = new Image();
                $img->setName($fichier);
                $article->addImage($img);
            }


            $date = new \DateTime();
            $article->setCreatedAt($date);
            $article->setUpdatedAt($date);
            $article->setCreatedBy($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,

        ]);
    }


    /**
     * @Route("/{id}", name="article_show", methods={"GET","POST"})
     */
    public function show(Article $article, Request $request,  MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        //commentaire

        //on créé le commentaire "vierge"
        $comment = new Comment;

        //on genere le formulaire
        $commentForm = $this->createForm(CommentType::class, $comment);

        $commentForm->handleRequest($request);

        //traitement du formulaire
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setDatePublication(new \DateTime());
            $comment->setCreatedBy($this->getUser());
            $comment->setArticle($article);


            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('message', 'votre commentaire a été bien envoyé');
            // return $this->redirectToRoute('article_show', ['slug' => $article->getSlug()]);
        }

        /*


        $date = new \DateTime();
        $contenu = "";
        if (!is_null($request->request->get('contenu'))) {
            $contenu = $request->request->get('contenu');
        }

        $comment->setDatePublication($date)
            ->setCreatedBy($this->getUser())
            ->setArticle($article)
            ->setContenu($contenu);

        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        $this->addFlash('message', 'votre commentaire a été bien envoyé');
        //return $this->redirectToRoute('article_show', ['slug' => $article->getSlug()]);

            $mailer->send(
                (new TemplatedEmail())
                    ->from('LAC <testdev.jay@gmail.com>')
                    ->to($article->getCreatedBy()->getEmail())
                    ->text('Un utilisateur a commenté votre article "' . $article->getTitle() . '"')
            );
            return $this->render('article/show.html.twig', [
                'groups' => ['to-serialize'],
                'commentForm' => $commentForm->createView()
                ]);
            } else {
                return new Response;
                */
        //  return $this->redirectToRoute('article_show', [], Response::HTTP_SEE_OTHER);
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'commentForm' => $commentForm->createView(),
        ]);
        // }
        return new Response;
    }

    #[Route('/{id}/edit', name: 'article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article, EntityManagerInterface $entityManager,  UploadService $uploader, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on recupere les images transmises
            $images = $form->get('images')->getData();
            //on boucle sur les images car on peut en avoir plusieur
            foreach ($images as $image) {
                //on genere un nouveau nom de fichier aleatoir
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                //on copie le fichier dans le dossier imagres en utilisant la methode 'move()'
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // on stock le nom de limage dans la bse de donné
                $img = new Image();
                $img->setName($fichier);
                $article->addImage($img);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{supprime/image{id}}', name: 'article_delete_image', methods: ['DELETE'])]
    public function deleteImage(Image $image, Request $request)
    {
        $data = json_decode($request->getContent(), true);

        //on verifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            //on recupere le nom du fichier
            $nom = $image->getName();
            //et on supprime le fichier
            unlink($this->getParameter('images_directory') . '/' . $nom);
            //on supprime lentré de la base de donné
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($image);
            $entityManager->flush();

            //on repond un success en json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
}
