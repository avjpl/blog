<?php
namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    public function registerAction()
    {
        /* TODO
         *
         * Check if a admin user already exist.
         * If so redirect to login page.
         * */

        $user = new User();

        $form = $this->createForm(new RegistrationType(), $user, array(
            'action' => $this->generateUrl('account_create')
        ));

        return $this->render(
            'BloggerUserBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
    {
        $factory = $this->get('security.encoder_factory');
        $em = $this->getDoctrine()->getManager();
        $user = new User();

        $form = $this->createForm(new RegistrationType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);

            $em->persist($registration);
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerBlog_homepage'));
        }

        return $this->render($this->generateUrl('login'));
    }
}