<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>gestion</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </head>
    <body class="antialiased">
       
        @section("contenu")
        <div class="container">
            <div>
                <div class="mt-3 p-3 bg-body rounded shadow-sm">
                    <h1 class="border-bottom pb-2 mb-4">Modifier un etudiant</h1>
                    <div class="mt-4">
                        @if (session()->has ("success"))
                        <div class="alert alert-success">
                            <h4>{{session()->get('success') }} </h4>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class=" alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('etudiant.update',['etudiant'=>$etudiant->id])}}">
                        @csrf
                        <input type="hidden" name="_method" id="put">
                            <div class="mt-3">
                                <label class="form-label">Nom de l'etudiant</label>
                                <input type="text" class="form-control" value="{{$etudiant->nom}}">
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Prénom de l'etudiant</label>
                                <input type="text" class="form-control" value="{{$etudiant->prenom}}">
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Classe</label>
                                <select class="form-control">
                                    <option value=""></option>
                                    @foreach($classes as $classe)
                                    @if($classe->id == $etudiant->classe_id)
                                        <option value="{{$classe->id}}" selected>{{ $classe ->libelle}}</option>
                                        @else
                                        <option value="{{$classe->id}}">{{ $classe ->libelle}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Emregistre</button>
                            <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>

                        </form>
                    </div>

                </div>    
            </div>
        </div>
      
    </body>
</html>
