<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{
    public function userAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        // last username entered by the user
        return $this->render('AppBundle::login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    public function adminAction()
    {

        return new Response('<html><body>Admin page!</body></html>');

    }
    public function usersAction()
    {

        return new Response('<html><body>Users page!</body></html>');

    }
    public function logoutAction()
    {
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();

        return $this->redirect($this->generateUrl('home'));
    }
}
