<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\LoginFormType;
use App\Form\UtilisateursType;
use App\Repository\UtilisateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class AuthentificationController extends AbstractController
{

    #[Route('/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        
        $error= $authenticationUtils->getLastAuthenticationError();
        $lastUsername= $authenticationUtils->getLastUsername();

        if($this->isGranted("ROLE_RESPONSABLE")){
            return $this->redirectToRoute('app_home');
        }

        if($this->isGranted("ROLE_CLIENT")){
            return $this->redirectToRoute('app_home');
        }

        return $this->render('authentification/index.html.twig', [
            'error'=>$error,
            'lastusername'=> $lastUsername,
        ]);
    }

    

    #[Route('/register', name: 'app_register')]
    public function creerCompte(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher)
    {
        $user = new Utilisateurs();
        $form=$this->createForm(UtilisateursType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
             
            $passwordHashed = $passwordHasher->hashPassword($user, $user->getPassword());
            $em ->persist($user);
            $user -> setPassword($passwordHashed);
            $selectedRole = $form->get('role')->getData();
            $user->setRole($selectedRole);
            $user -> setCreerPar(1);
            $user -> setCreerLe(new \DateTime('@'.strtotime('now')));
            $user -> setModifieLe(new \DateTime('@'.strtotime('now')));
            $user -> setModifiePar(1);
            $em ->flush();

          
           return $this->redirectToRoute('app_login');
  
        }
        return $this->render('authentification/register.html.twig',[
            'form'=>$form->createView(), 

        ]);
    }


    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

