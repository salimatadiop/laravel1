<!DOCTYPE html>
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
        <div class="container">
            <div>
        
                <div class="mt-3 p-3 bg-body rounded shadow-sm">
                    <h3 class="border-bottom pb-2 mb-4">Liste des etudiants inscrits</h3>
                    <div class="d-flex justify-content-end mb-4">
                        

                        <a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un nouvel etudiant</a>
                    </div>
                    @if (session()->has ("successDelete"))
                        <div class="alert alert-success">
                            <h3>{{session()->get('successDelete') }} </h3>
                        </div>
                        @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($etudiants as $etudiant)
                            <tr>
                            <th scope="row"> {{$loop->index}}  </th>
                            <td>{{$etudiant-> nom}}</td>
                            <td>{{$etudiant-> prenom}}</td>
                            <td>{{$etudiant->classe_libelle}}</td>
                            <td>
                                <a href="{{ route('etudiant.edit',['etudiant'=>$etudiant->id] ) }}" class="btn btn-info">Editer</a>
                                <a  href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment suprimer cet etudiant? ')){document.getElementById('form-{{$etudiant->id}}').submit()}">suprimer</a>
                                <form  id="form-{{$etudiant->id}}" action="{{route('etudiant.supprimer',['etudiant'=>$etudiant->id])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
