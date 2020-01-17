@if(!empty($comments))
    <ul>

        @foreach($comments as $tache)
                id: {{$tache->id}} <br>
                Contenue: {{$tache->content}} <br>
                Note: {{$tache->note}}<br>
                Validation: {{$tache->validated}} <br>
                Id Utilisateur: {{$tache->user_id}} <br>
                Id Séries: {{$tache->serie_id}}<br> <br>
        @endforeach
    </ul>

@else
    <h3>aucun commentaire</h3>
@endif

