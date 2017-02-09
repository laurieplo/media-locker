<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is licensed exclusively to Laurie Plociennik.
 *
 * @copyright   Copyright © 2017 Laurie Plociennik
 * @license     All rights reserved
 * @author      Laurie Plociennik
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
