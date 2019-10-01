<?php


namespace AppBundle\Controller;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\View\View;
use Symfony\Component\Routing\Annotation\Route;


class AutoemailController extends AbstractFOSRestController implements ClassResourceInterface
{
    /**
     * @Route("/automail", name="app_automail")
     */
    public $name = 'ali';
    public function indexAction($name, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('hi@alidnd.com')
            ->setTo('alidindin@icloud.com')

        ;
        $mailer->send($message);
    }
}