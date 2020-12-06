<?php

namespace App\Controller;

use App\Entity\User;
use App\Events\UserRegisteredEvent;
use App\Form\model\UserRegistrationFormModel;
use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        GuardAuthenticatorHandler $gard,
        LoginFormAuthenticator $authenticator,
        EntityManagerInterface $em,
        EventDispatcherInterface $dispatcher
    )
    {
        $form = $this->createForm(UserRegistrationFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var UserRegistrationFormModel $userModel
             */
            $userModel = $form->getData();

            $user = new User();

            $user
                ->setEmail($userModel->email)
                ->setFirstName($userModel->firstName)
                ->setPassword($passwordEncoder->encodePassword(
                    $user,
                    $userModel->plainPassword
                ));

            $em->persist($user);
            $em->flush();

            $dispatcher->dispatch(new UserRegisteredEvent($user));

            return $gard->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                "main"
            );

        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView()
        ]);
    }
}
