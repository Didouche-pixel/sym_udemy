<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
     $reponse = new Response("<center>hello</center><br><I>bonjour</I>");
        dump($reponse);die;
     return $reponse;
    }



    #[Route('/liste_article', name: 'liste d article' , methods: ["Get"])]
    
    public function liste_article(): Response
    {
        $url1 = $this->generateUrl('l article', ['id' => 1]);
        $url2 = $this->generateUrl('l article', ['id' => 2]);
        $url3 = $this->generateUrl('l article', ['id' => 3]);
        $url4 = $this->generateUrl('l article', ['id' => 4]);

       return new Response("<ul>
       <li><a href = '".$url1."'>article 1</li>
       <li><a href = '".$url2."'>article 2</li>
       <li><a href = '".$url3."'>article 3</li>
       <li><a href = '".$url4."'>article 4</li>
       </ul>") ;
    }

     #[Route('/{id}', name: 'l article' , requirements : ["id" => "\d+"], methods: ["Get"])]
    
    public function voir_article($id)
    {
        return new Response("<h1>article $id</h1><p>ce contenu de l article $id</p>
        <button><a href = '/liste_article'>retour</button>"); ;
    }
     
}
