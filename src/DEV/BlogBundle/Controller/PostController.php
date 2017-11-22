<?php

namespace DEV\BlogBundle\Controller;

use ClassesWithParents\F;
use DEV\BlogBundle\Entity\Post;
use DEV\BlogBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;


class PostController extends Controller
{

    /**
     *
     * @Route("/admin/posts/new", name="post_new")
     * @Method({"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('admin');
        }
        return $this->render('DEVBlogBundle:Post:new.html.twig',array(
            'form' => $form->createView()
        ));
    }

    /**
     *
     * @Route("/posts/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        dump($post);
        return $this->render('DEVBlogBundle:Post:posts_unique.html.twig',
            ['post' => $post]);

    }
    /**
     * @Route("/admin/posts", name="posts_admin")
     */
    public function listToAdminAdminAction(){
        //repo posts
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repository->findAll();
        dump($posts);
        return $this->render('DEVBlogBundle:Post:posts_admin.html.twig',
            array('posts' => $posts));

    }

    /**
     * @Route("/", name="posts_viewer")
     */
    public function listToViewerAction(){
        $repository = $this->getDoctrine()->getRepository(Post::class);
        //une requete find all marche pas avec les criterie
        $posts = $repository->findAllByNotPublished();
        dump($posts);
        return $this->render('DEVBlogBundle:Post:posts_viewer.html.twig',
            ['posts' => $posts]);
    }

    /**
     * @Route("/admin/posts/{id}/publish", name="post_publish")
     */
    public function publish(Post $post){
        //manager doctrine
        $doctrineManager = $this->getDoctrine()->getManager();
        $datePublish = new \DateTime('now');
        $post->setPublishedAt($datePublish);
        $doctrineManager->persist($post);
        $doctrineManager->flush();
        $message = 'Post published with success';
        $data = ['content' => $message];
        return $this->render('DEVBlogBundle:Components:confirmation.html.twig',
            ['message' => $data]);
    }



}
