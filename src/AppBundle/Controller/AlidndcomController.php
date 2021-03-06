<?php

namespace AppBundle\Controller;


use AppBundle\Entity\AlidndContact;
use AppBundle\Form\Type\AlidndContactType;
use AppBundle\Repository\AlidndContactRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;



/**
 * Class AlidndcomController
 * @package AppBundle\Controller
 *
 * @Rest\RouteResource("contact")
 */
class AlidndcomController extends AbstractFOSRestController implements ClassResourceInterface
{
    /**
     * Gets an individual AlidndContact
     *
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     */
    public function getAction($id)
    {
        return $this->getAlidndContactRepository()->createFindOneByIdQuery($id)->getSingleResult();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     */
    public function cgetAction()
    {
        return $this->getAlidndContactRepository()->createFindAllQuery()->getResult();
    }

    /**
     * @param Request $request
     * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\FormInterface
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(AlidndContactType::class, null, [
                'csrf_protection' => false,

        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()){
            return $form;
        }
        /**
         * @var $alidndContact AlidndContact
         */
        $alidndContact = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($alidndContact);
        $em->flush();

        $routeOptions = [
            'id' => $alidndContact->getId(),
            '_format' => $request->get('format'),
        ];

        return $this->routeRedirectView('get_contact', $routeOptions, Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\FormInterface
     */
    public function putAction(Request $request, $id)
    {
        /**
         * @var $alidndContact AlidndContact
         */
        $alidndContact = $this->getAlidndContactRepository()->find($id);

        if ( $alidndContact === null ){
            return new View(null, Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(AlidndContactType::class, $alidndContact, [
            'csrf_protection' => false,

        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()){
            return $form;
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $routeOptions = [
            'id' => $alidndContact->getId(),
            '_format' => $request->get('format'),
        ];

        return $this->routeRedirectView('get_contact', $routeOptions, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\FormInterface
     */
    public function patchAction(Request $request, $id)
    {
        /**
         * @var $alidndContact AlidndContact
         */
        $alidndContact = $this->getAlidndContactRepository()->find($id);

        $form = $this->createForm(AlidndContactType::class, $alidndContact, [
            'csrf_protection' => false,

        ]);

        $form->submit($request->request->all(), false);

        if (!$form->isValid()){
            return $form;
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $routeOptions = [
            'id' => $alidndContact->getId(),
            '_format' => $request->get('format'),
        ];

        return $this->routeRedirectView('get_contact', $routeOptions, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $id
     * @return View
     */
    public function deleteAction($id)
    {
       /**
        * @var $alidndContact AlidndContact
        */
        $alidndContact = $this->getAlidndContactRepository()->find($id);

       if ( $alidndContact === null ){
           return new View(null, Response::HTTP_NOT_FOUND);
       }

       $em = $this->getDoctrine()->getManager();
       $em->remove($alidndContact);
       $em->flush();

       return new View(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @return AlidndContactRepository
     */
    public function getAlidndContactRepository()
    {

        return $this->get('crv.doctrine_entity_repository.alidnd_contact');
    }
}
