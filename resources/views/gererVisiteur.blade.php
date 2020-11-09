@extends ('sommaire2')
@section('contenu1')
<div id="contenu">
    <h2>Gerer Les Visiter</h2><br>
    
         <button type="button" onclick="window.location='{{ route('chemin_ajouter') }}'">Ajouter</button>
        <br>
        <br>
        <button type="button" onclick="window.location='{{ route('chemin_choisirVisiteur')}}'">Modifier</button>

    <br><br>
      
    </div>
    
@endsection