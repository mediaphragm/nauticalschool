<?php

namespace Stcw\DeskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="desk_index")
     */
    public function indexAction($name = "desk")
    {
        return $this->render('StcwDeskBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * @Route("/chooselanguage/{lang}", name="lang_choose")
     */
    public function choose_languageAction($lang = null)
    {
        $valid_langs = array('en_US','fr','nl');
        if(!in_array($lang, $valid_langs) || is_null($lang))
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("The language chosen is not a valid language");
        }
        $ref = $this->get('request')->headers->get('referer');
        $this->getRequest()->getSession()->setLocale($lang);
        if(empty($ref))
        {
            $ref = $this->container->get('router')->generate('desk_index');
        }
        return new RedirectResponse($ref);
        
    }
}
