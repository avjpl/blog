<?php
namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Form\LoginType;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller {

    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        $user = new User();

        $form = $this->createForm(new LoginType(), $user, array(
            'action' => $this->generateUrl('login_check')
        ));

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attribute->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else if (null !== $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'BloggerUserBundle:Security:login.html.twig',
            array(
                // last user entered by thr user
                'last_username' => $lastUsername,
                'error'         => $error,
                'form'          => $form->createView()
            )
        );
    }
}