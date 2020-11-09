<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);
 /*-------------------- Use case état des Visiteur---------------------------*/
 Route::get('selectionVisiteurs',[
        'as'=>'chemin_selectionVisiteurs',
        'uses'=>'etatFraisController@selectionnerVisiteurs'
]);

Route::post('listeVisiteurs',[
        'as'=>'chemin_listeVisiteurs',
        'uses'=>'etatFraisController@voirVisiteurs'
]);

       /*-------------------- Use case état des Visiteur---------------------------*/
 Route::get('selectionVisiteurs',[
        'as'=>'chemin_selectionVisiteurs',
        'uses'=>'etatFraisController@selectionnerVisiteurs'
]);

Route::post('listeVisiteurs',[
        'as'=>'chemin_listeVisiteurs',
        'uses'=>'etatFraisController@voirVisiteurs'
]);

        /*-------------------- Use case gérer les Visiteur---------------------------*/

        Route::get('gererVisiteur',[
                'as'=>'chemin_gestionnaire',
                'uses'=>'gererVisiteurController@gererVisiteur'
        ]);
        Route::get('ajouter',[
                'as'=>'chemin_ajouter',
                'uses'=>'gererVisiteurController@ajoutVisiteur'
        ]);
        
        Route::get('choisir',[
                'as'=>'chemin_choisirVisiteur',
                'uses'=>'gererVisiteurController@choisirVisiteur'
        ]);
        Route::get('modifier',[
                'as'=>'chemin_modifierVisiteur',
                'uses'=>'gererVisiteurController@modifierVisiteur'
        ]);
        Route::post('sauvegarderVisiteur',[
                'as'=>'chemin_sauvegardeVisiteur',
                'uses'=>'gererVisiteurController@sauvegarderVisiteur'
        ]);
        Route::post('updateVisiteur',[
                'as'=>'chemin_updateVisiteur',
                'uses'=>'gererVisiteurController@updateVisiteur'
        ]);
        Route::get('enregisteVisiteur', [
                'as' =>'chemin_enregisteVisiteur',
                'uses' => 'gererVisiteurController@enregisteVisiteur'
        ]);
        




