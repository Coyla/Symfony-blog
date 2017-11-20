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


class PostController extends Controller
{
    /**
     * Lists all post entities for guest users
     *
     * @Route("/posts", name="post_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('DEVBlogBundle:Post')->findAll();

        return $this->render('post/admin_template.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Creates a new post entity.
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
            dump($post);
            return $this->redirectToRoute('admin');
        }
        dump($form);

        return $this->render('post/new.html.twig',array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/posts/ne", name="post_get_new")
     * @Method({"POST"})
     */
    public function newGetAction(){
        return $this->render('DEVBlogBundle:Admin:admin_template.html.twig');
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("admin/posts/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        dump($post);
        return $this->render('DEVBlogBundle:Post:posts_unique.html.twig',
            ['post' => $post]);

    }
    /**
     * @Route("admin/posts", name="posts_admin")
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



}
