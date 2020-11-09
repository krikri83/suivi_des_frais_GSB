@extends ('sommaire2')
  @section('contenu1')
      <div id="contenu">
      @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs])
      @includeWhen($message != "", 'message', ['message' => $message])
        <h2>Modifier visiteurs</h2>
        <h3>Visiteur à sélectionner : </h3>
      <form action="{{ route('chemin_modifierVisiteur') }}" method="get">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
       
        <div class="corpsForm"><p>
       
          <label for="lstId" >nom : </label>
          <select id="lstId" name="lstId">
              @foreach($lesVisiteurs as $unVisiteur)
                    <option value="{{ $unVisiteur['id'] }}">
                      {{ $unVisiteur['id']}} / {{ $unVisiteur['nom']  }}
                    </option>
               
              @endforeach
          </select>
        </p>
        </div>
        <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
        
  @endsection 
 