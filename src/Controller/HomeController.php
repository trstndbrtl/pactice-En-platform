<?php

namespace App\Controller;

use App\Entity\Verb;
use App\Utility\ToolsUtility;
use App\Repository\VerbRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(VerbRepository $vr)
    {
        $startVerbs = ToolsUtility::getVerbHomePage();
        $verb = $vr->findOneBy(['present' => $startVerbs[0]]);
        
        $verbsIrregular = $vr->findAllVerbIrregularByAlphabetical();
        $verbsRegular = $vr->findAllVerbRegularByAlphabetical();
        
        return $this->render('home/index.html.twig', [
            'page_title' => $verb->getPresent(),
            'verb' => $verb,
            'verbsIrregular' => $verbsIrregular,
            'verbsRegular' => $verbsRegular
        ]);
    }


    /**
     * @Route("/{present}", name="app_one_verb")
     */
    public function oneVerb(VerbRepository $vr, Verb $verb)
    {

        $verbsIrregular = $vr->findAllVerbIrregularByAlphabetical();
        $verbsRegular = $vr->findAllVerbRegularByAlphabetical();

        return $this->render('home/index.html.twig', [
            'page_title' => $verb->getPresent(),
            'verb' => $verb,
            'verbsIrregular' => $verbsIrregular,
            'verbsRegular' => $verbsRegular
        ]);
    }

}
