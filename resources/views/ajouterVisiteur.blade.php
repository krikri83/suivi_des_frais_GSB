@extends ('sommaire2')
@section('contenu1')

<div id="contenu">
    <h2>Ajouter un visiteur</h2>
    <form method="post"  action="{{ route('chemin_sauvegardeVisiteur') }}">
                    {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm">
            <fieldset> <br>
                @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs])
               
			    <p>
                    <label>Nom</label>
                    <input type = "text" name = "nom"  size = "30" maxlength = "45" required >
                </p>
                <p>
                    <label>Prénom</label>
                    <input type = "text" name = "prenom"  size = "30" maxlength = "45" required >
                </p>
                <p>
                    <label>l'adresse</label>
                    <input type = "text" name = "adresse"  size = "30" maxlength = "45" required >
                </p>
                <p>
                    <label>CP</label>
                    <input type = "text" name = "cp"  size = "30" maxlength = "45" required >
                </p>
                <p>
                    <label>Ville</label>
                    <input type = "text" name = "ville"  size = "30" maxlength = "45" required >
                </p>
                <!--<p>
                    <label>Date d'embauche</label>
                    <input type = "text" name = "datedEmbauche"  size = "30" maxlength = "45" required >
                </p>-->
                <br><br>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
            <input id="ok" type="submit" value="Ajouter" size="20" />
            <input id="annuler" type="reset" value="Annuler" size="20" />
            </p> 
        </div>
    </form>
</div>
@endsection