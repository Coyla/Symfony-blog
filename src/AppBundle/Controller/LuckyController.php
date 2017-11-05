<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 05/11/2017
 * Time: 01:19
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction(){
        $number = mt_rand(0,100);
        return new Response(
            '<html><body>Lucky number '.$number.'</body></html>'
        );
    }
}