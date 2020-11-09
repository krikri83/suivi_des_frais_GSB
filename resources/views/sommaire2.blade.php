@extends ('modeles/gestionnaire')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li>
                      <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                      
                   </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_gestionnaire')}}" title="Gestion des visiteurs ">Gérer les visiteurs</a>
                  </li>
               <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection      