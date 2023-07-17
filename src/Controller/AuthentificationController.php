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
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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

        $user = new Utilisateurs();
        $error= $authenticationUtils->getLastAuthenticationError();
        $lastUsername= $authenticationUtils->getLastUsername();
        $form=$this->createForm(UtilisateursType::class, $user);

        // if($form->isSubmitted() && $form->isValid()){
        //     $selectedRole=$form->get('role')->getData();
        //     if($selectedRole->getNomRole()=="Client"){
        //         $client=new Client();
        //         $passwordHashed = $passwordHasher->hashPassword($user, $user->getPassword());
        //         $em ->persist($user);
        //         $client -> setPassword($passwordHashed);
        //         $selectedRole = $form->get('role')->getData();
        //         $client->setRole($selectedRole);
        //         $client -> setCreerPar(1);
        //         $client -> setCreerLe(new \DateTime('@'.strtotime('now')));
        //         $em ->flush();   
        //     }
        // }else{
        //     $responsable =new Responsable();
        //     $passwordHashed = $passwordHasher->hashPassword($user, $user->getPassword());
        //     $em ->persist($user);
        //     $responsable -> setPassword($passwordHashed);
        //     $selectedRole = $form->get('role')->getData();
        //     $responsable->setRole($selectedRole);
        //     $responsable -> setCreerPar(1);
        //     $responsable -> setCreerLe(new \DateTime('@'.strtotime('now')));
        //     $em ->flush();
        // }
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
    public function logout(): Response
    {
        $this->getUser().session_destroy();
		return $this->redirectToRoute('app_login');
    }

}
