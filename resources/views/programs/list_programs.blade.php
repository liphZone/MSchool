@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des programmes de cours')
<style>
    @media print{
        .no-print{
            /*visibility: hidden;*/
            display: none;
        }
        .formulaire{
            visibility: hidden;
            display: none;
        }

        .impression{
            visibility: hidden;
            display: none;
        }

        .print{
            visibility: visible;
        }
        .tt{
            margin-top: 5em;
        }
        .date{
            margin-left: 50%;
        }
        .titre{
            text-align: left;
            margin-bottom: 0;
        }

        textarea{
            overflow: auto;
            overflow: hidden;
        }
    }
</style>
<div class="row">
    <div class="col-md-4">
        <form action="" method="GET">
            <div class="form-inline">
                <select class="form-control" name="classe" required>
                    <option value=""> Choisir la classe </option>
                    @foreach($classe as $classes)
                        <option> {{"$classes->libelle $classes->serie$classes->groupe"}}</option>
                    @endforeach
                </select>
                    &nbsp;&nbsp;&nbsp;
                <input class="btn btn-primary" type="submit" name="search" value="CHERCHER">
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="impression">
            <p style="font-weight:bold;">
                <button class="btn btn-secondary" onclick="imprimer('SectionAImprimer')">
                    <i class="fa fa-print"> </i> Imprimer
                </button>
            </p>
        </div>
    </div>
</div>

<div id="SectionAImprimer">
    <div> 	EMPLOI DU TEMPS  de la classe :  {{ request('classe') }}  </div>
    <table class="table">
        <thead>
            <tr>
            <th>Horaire\Jour</th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="active">
            <th scope="row">1 iere Heure</th>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 1)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 1)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 1)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 1)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 1)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
            <th scope="row">2 iem Heure</th>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 2)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 2)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 2)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 2)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 2)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr class="success">
            <th scope="row">3 iem Heure</th>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 3)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 3)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 3)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 3)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 3)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <td>R  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; E </td>
                    <td>C  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  R </td>
                    <td>E &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;   A </td>
                    <td>T &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;   I </td>
                    <td>O  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  N</td>
                </th>
            </tr>

            <tr>
            <th scope="row">4iem Heure</th>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 4)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 4)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 4)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 4)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 4)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr class="info">
            <th scope="row">5iem Heure</th>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 5)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 5)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 5)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 5)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 5)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <td>P  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;   </td>
                    <td>A  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;   </td>
                    <td>U &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;    </td>
                    <td>S &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;    </td>
                    <td>E  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  </td>
                </th>
            </tr>
            <tr>
            <th scope="row">6iem Heure </th>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 6)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                                @if ($timetables->position == 6)
                                    @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 6)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 6)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 6)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr class="warning">
            <th scope="row">7iem Heure</th>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 7)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 7)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 7)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 7)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 7)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
            <th scope="row">8iem Heure</th>

                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 8)
                                @if ($timetables->jour ==='Lundi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 8)
                                @if ($timetables->jour ==='Mardi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 8)
                                @if ($timetables->jour ==='Mercredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 8)
                                @if ($timetables->jour ==='Jeudi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($timetable as $timetables)
                        @if ( request('classe') === $timetables->classe)
                            @if ($timetables->position == 8)
                                @if ($timetables->jour ==='Vendredi')
                                    <p> {{ $timetables->matiere }} </p>
                                    <p>{{$timetables->h_debut}} - {{$timetables->h_fin}} </p>
                                    <p>{{$timetables->professeur}} </p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function imprimer(bulletin_eleve) {
    var printContents = document.getElementById(bulletin_eleve).innerHTML;
    var originalContents = document.body.innerHTML; document.body.innerHTML = printContents; window.print();
    document.body.innerHTML = originalContents; }
</script>

@endsection
