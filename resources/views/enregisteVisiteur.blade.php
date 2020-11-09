@extends ('ajouterVisiteur')
@section('contenu2')

<div id="contenu">
    <h2>Visiteur est enregisté.</h2>
    <form method="get"  action="{{ route('chemin_enregisteVisiteur') }}">
                    {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm">
            <fieldset> <br>
           
                 <p>
                    <label>Id : {{$login}}</label>
                </p>
                <p>
                    <label>Mots de passe : {{$mdp}}</label>
                </p>
                
			    <p>
                    <label>Nom : {{$nom}}</label>
                </p>
                <p>
                    <label>Prénom : {{$prenom}}</label>
                    
                </p>
                <p>
                    <label>L'adresse : {{$adresse}}</label>
                </p>
                <p>
                    <label>CP : {{$cp}}</label>
                </p>
                <p>
                    <label>Ville : {{$ville}}</label>
                </p>
                <p>
                    <label>Date d'embauche : {{$dateEmbauche}}</label>
                </p>
                <br><br>
            </fieldset>
        </div>
        <div class="piedForm">
            
        </div>
    </form>
</div>
@endsection