@extends ('listevisiteurs')
@section('contenu2')

 <!--<div id="contenu">-->
 <!--   <h2>Modifier un visiteur</h2>-->
 <form method="post"  action="{{ route('chemin_updateVisiteur') }}">
                    {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm">
  
         <fieldset> <br>
                <p>
				    <label>numero</label>
				    <input type = "texte" name = "idVisiteur"  value="{{$unVisiteur['id']}}"size = "5" maxlength = "5" required readonly="readonly" >
				</p>
             <p>
                    <label>Nom : {{$unVisiteur['nom']}}</label>
                    <input type = "text" name = "leNom"  value="{{$unVisiteur['nom']}}" size = "30" maxlength = "45" required readonly="readonly" >
 			  
                </p>
                <p>
                    <label>Prénom</label>
                    <input type = "text" name = "lePrenom" value="{{$unVisiteur['prenom']}}" size = "30" maxlength = "45" readonly="readonly" required >
                 
                </p>
                <p>
                    <label>l'adresse</label>
                    <input type = "text" name = "adresse" value ="{{$unVisiteur['adresse']}}" size = "30" maxlength = "45" required >
                    
                </p>
                <p>
                    <label>CP</label>
                    <input type = "text" name = "cp"  value ="{{$unVisiteur['cp']}}" size = "30" maxlength = "45" required >
                
                </p>
                <p>
                    <label>Ville</label>
                    <input type = "text" name = "ville" value ="{{$unVisiteur['ville']}}" size = "30" maxlength = "45" required >
                
                </p>
                <p>
                    <label>Date d'Embauche</label>
                    <input type = "date" name = "dateEmbauche" value="{{$unVisiteur['dateEmbauche']}}" size = "30" maxlength = "45" required >
                   
                </p>
                <br><br>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
            <input id="ok" type="submit" value="Modifier" size="20" />
            <input id="annuler" type="reset" value="Annuler" size="20" />
            </p> 
  <!--      </div>
    </form>   -->
@endsection