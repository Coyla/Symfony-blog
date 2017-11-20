<?php

namespace DEV\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/blog")
     */
    public function indexAction()
    {
        return $this->render('DEVBlogBundle:Default:admin_template.html.twig');
    }
}
