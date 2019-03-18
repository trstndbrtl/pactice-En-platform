<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreationVerbsController extends AbstractController
{
    /**
     * @Route("/playground/creation", name="app_admin_creation")
     */
    public function index()
    {
        return $this->render('admin/verb-regular-creation.html.twig', [
            'page_title' => 'CreationVerbsController',
        ]);
    }
}
