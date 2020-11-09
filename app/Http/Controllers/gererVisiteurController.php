<?php

namespace App\Http\Controllers;
use PdoGsb;
use MyDate;
use Illuminate\Http\Request;
///Erreur nom gererVisiteurController
class gererVisiteurController extends Controller
{
    function gererVisiteur(Request $request)
    {
        if(session('gestionnaire') != null)
        {
            $gestionnaire = session('gestionnarie');
            //il faut avoir le nom de la site entre les parandes
            $view = view('gererVisiteur')->with('gestionnaire', $gestionnaire);
            return $view;
        }
        else
        {
            return view('connexion')->with('erreurs',null);
        }
    }
    function ajoutVisiteur(Request $request)
    {
        if(session('gestionnaire') != null)
        {
           
            $gestionnaire = session('gestionnaire'); 
            $message="";
            return view('ajouterVisiteur')->with('gestionnaire', session('gestionnaire'))
            ->with('erreurs',null)->with('message', $message);;
        }
        else
        {
            return view('connexion') ->with('erreurs',null);
        } 
    }
    function choisirVisiteur(Request $request)
    {
       if(session('gestionnaire')!= null)
       {
            $gestionnaire = session('gestionnaire');
			
			$message="";
		    $tousVisiteurs = PdoGsb::getInfoVisiteur();
   
            $view = view('listevisiteurs')->with('lesVisiteurs',$tousVisiteurs)
                        ->with('gestionnaire',$gestionnaire)->with('erreurs',null)
                        ->with('message', $message);
            return $view;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
   
     
    }
    function modifierVisiteur(Request $request)
    {
       
        if(session('gestionnaire')!= null)
        { 
             $gestionnaire = session('gestionnaire');
             
             $idVisiteur = $request['lstId'];
             
             $unVisiteur = PdoGsb::getInfoUnVisiteur($idVisiteur);
             $tousVisiteurs = PdoGsb::getInfoVisiteur();
            $message="";
           
             //var_dump($unVisiteur);
             //dd($unVisiteur);
             $view = view('modifierVisiteur')->with('lesVisiteurs',$tousVisiteurs)
                ->with('erreurs',null)
                ->with('message', $message)
                 ->with('gestionnaire', $gestionnaire)
                 ->with('unVisiteur', $unVisiteur);
             return $view;
         }
         else{
             return view('connexion')->with('erreurs',null);
         }
    
      
    }
   
    function sauvegarderVisiteur(Request $request)
    {
        if( session('gestionnaire')!= null)
        {
            $gestionnaire = session('gestionnaire');
			
            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $adresse = $request['adresse'];
            $cp = $request['cp'];
            $ville = $request['ville'];
            $dateEmbauche = date('Y-m-d');
            /*
            $date = $request['datedEmbauche'];
            $dateComparer = date('YYYY-MM-dd');
            if($date != dateComparer)
            {
                $erreurs[] ="Le date doit être YYYY-MM-dd!";
                $view = view('ajouterVisiteur')->with('erreurs',$erreurs)->with('gestionnaire', $gestionnaire);
            }
             */
            $idVisiteur = PdoGsb::generer_idVisiteur();
			$login = PdoGsb::generer_login($nom,$prenom);
            $mdp=PdoGsb::generer_mdp(5);
            //dd($cp);
          
            if(is_numeric($cp) && strlen($cp) == 5)
            {
                //dd("ssssss");
                 PdoGsb::ajoutNouveauVisiteur($idVisiteur, $nom, $prenom, $login, $mdp, 
                $adresse, $cp, $ville, $dateEmbauche);
                $erreurs =null;
                
                
                $view = view('enregisteVisiteur')->with('idVisiteur', $idVisiteur)
                ->with('gestionnaire', $gestionnaire)
                ->with('nom',$nom)
                ->with('erreurs',$erreurs)
                
                ->with('prenom',$prenom)
                ->with('adresse',$adresse)
                ->with('cp',$cp)
                ->with('ville', $ville)
                ->with ('dateEmbauche',$dateEmbauche)
                ->with('login', $login)
                ->with('mdp', $mdp);
                
            }
           else
           {
            
            $erreurs[] ="La code postal doit être numériques et de 5 chiffres";
            $view = view('ajouterVisiteur')->with('erreurs',$erreurs)->with('gestionnaire', $gestionnaire);
           }
            //dd($view);
            return $view;
            /*return view('ajouterVisiteur', compact('nom', 'prenom'));*/
        }  
        else
        {
            return view('connexion')->with('erreurs',null);
        }
    }
    function updateVisiteur(Request $request)
    {
        if( session('gestionnaire')!= null)
        {
            $gestionnaire = session('gestionnaire');
            
            $adresse = $_REQUEST['adresse'];
            $cp = $_REQUEST['cp'];
            $ville = $_REQUEST['ville'];
            $dateEmbauche = $_REQUEST['dateEmbauche'];
            $idVisiteur=$_REQUEST['idVisiteur'];
            if(is_numeric($cp) && strlen($cp) == 5)
            {
                PdoGsb::modifierVisiteur($idVisiteur, $adresse, $cp, $ville, $dateEmbauche);

                $tousVisiteurs = PdoGsb::getInfoVisiteur();
                $erreurs =null;
                $message ="Mise à jour étais fait!";
                $view = view('listevisiteurs')->with('lesVisiteurs',$tousVisiteurs)
                        ->with('gestionnaire',$gestionnaire)
                        ->with('erreurs',$erreurs)
                        ->with('message', $message);
            }
            else{
                $erreurs[] ="La code postal doit être numériques et de 5 chiffres";
                $message ="";
                $tousVisiteurs = PdoGsb::getInfoVisiteur();
                $view = view('listevisiteurs')->with('message', $message)
                ->with('erreurs',$erreurs)->with('gestionnaire', $gestionnaire)
                ->with('lesVisiteurs',$tousVisiteurs);
            }
            
            return $view;
        }  
        else
        {
            return view('connexion')->with('erreurs',null);
        }
    }
}
