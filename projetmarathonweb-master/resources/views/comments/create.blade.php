{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
@endif


        <h3>
            serie :  {{$serie->nom}}
        </h3>
        <form action="{{route('comments.store')}} " method="POST">
            @csrf


        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>


        <div>
            <label for="user_id"> <strong> User : </strong></label>
            <input type="int" name="user_id" id="user_id"
                   value="{{ old('user_id') }}">
    </div>


    <div>
        {{-- la date d'expiration  --}}
        <label for="note"><strong> Note: </strong></label>
        <input type="string" name="note" id="note"
               value="{{ old('note') }}">
    </div>


            <div>
                {{-- la date d'expiration  --}}
                <label for="description"><strong> description: </strong></label>
                <input type="string" name="description" id="description"
                       value="{{ old('description') }}">
            </div>






    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>


</form>


<style>
    label{
        text-decoration: underline;
        font-weight: bold;
    }

    input{
        margin: 1%;
    }

    textarea{
        margin-left: 1%;
        padding:0.5%;
    }

    button{
        margin-top: 1%;
    }

</style>