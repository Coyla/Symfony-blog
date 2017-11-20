<?php

namespace DEV\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @Method({"GET"})
     */
    public function indexAction(){
        $test  = '2a$12$cyTWeE9kpq1PjqKFiWUZFuCRPwVyAZwm4XzMZ1qPUFl7/flCM3V0';

        return $this->render
        ('DEVBlogBundle:Admin:admin_template.html.twig');
    }
}
