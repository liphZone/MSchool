@extends('layout.utilisateur.index')
@section('content')
@section('title','Moyenne matière')
    <div class="panel panel-info">
        <h3 class="panel-heading text-center"> FORMULAIRE CALCUL MOYENNE MATIERE </h3>
    </div>
    <div class="form-inline">
        <form action="" method="GET">
            <select name="lesson" class="form-control" id="lesson" required>
                <option value=""> Choisir la matière</option>
                @foreach ($matiere as $matieres)
                    <option value="{{ $matieres->libelle }}"> {{ $matieres->libelle }} </option>
                @endforeach
            </select>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary"> Choisir </button>
        </form>
    </div>


@if (request('lesson') === null)
    <h4 class="text-danger"> Veuillez choisir la matière !</h4>
@else

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('moyennes.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PERIODE</label>
                            <select class="form-control" name="periode" required>
                                <option value="">Choisir la période </option>
                                <option value="Semestre">Semestre</option>
                                <option value="Trimestre">Trimestre</option>
                            </select>
                            @error('periode')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>TERME</label>
                            <select class="form-control" name="term" required>
                                <option value="">Choisir le terme </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            @error('term')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NOM</label>
                            <input class="form-control" type="text" name="nom" value="{{ $eleve->nom }}" readonly>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PRENOM</label>
                            <input class="form-control" type="text" name="prenom" value="{{$eleve->prenom}}" readonly>
                            @error('prenom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>PROFESSEUR</label>
                            <input class="form-control" type="text" name="professeur" value="{{ "$user->nom $user->prenom"}}" readonly>
                            @error('professeur')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>MATIERE</label>
                            <input class="form-control" type="text" name="matiere" value="{{ request('lesson')}}" readonly>
                            @error('matiere')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> TYPE MATIERE</label>
                                <input class="form-control" type="text" name="type_matiere" value="{{ $type_matiere->type_matiere }}" readonly>
                            @error('type_matiere')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h3 class="text-center"> NOTE </h3>

                @if ($nbre->nbre_interro === 1 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note) === false || isset($note_devoir_one->note) === false)
                    <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    @else

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{ number_format($note_interro_one->note,2) }}" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format($note_devoir_one->note,2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    @endif

                @elseif ($nbre->nbre_interro === 1 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note) === false || isset($note_devoir_one->note) === false ||
                    isset($note_devoir_two->note) === false)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{ number_format($note_interro_one->note,2) }}" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format((($note_devoir_one->note + $note_devoir_two->note)/2),2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                @elseif ($nbre->nbre_interro === 2 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note) === false || isset($note_interro_two->note) === false ||
                    isset($note_devoir_one->note) === false)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{ number_format((($note_interro_one->note + $note_interro_two->note)/2),2) }}" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format($note_devoir_one->note,2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                @elseif ($nbre->nbre_interro === 2 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note) === false || isset($note_interro_two->note) === false ||
                    isset($note_devoir_one->note) === false || isset($note_devoir_two->note) === false )

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{  number_format((($note_interro_one->note + $note_interro_two->note)/2),2) }}" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format((($note_devoir_one->note + $note_devoir_two->note)/2),2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                @elseif ($nbre->nbre_interro === 3 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note )=== false || isset($note_interro_two->note) === false ||
                     isset($note_interro_three->note) === false  || isset($note_devoir_one->note) === false)

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{ number_format((($note_interro_one->note + $note_interro_two->note + $note_interro_three->note)/3),2) }}" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format($note_devoir_one->note,2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                @elseif ($nbre->nbre_interro === 3 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note )=== false || isset($note_interro_two->note) === false ||
                    isset($note_interro_three->note) === false || isset($note_devoir_one->note) === false ||
                    isset($note_devoir_two->note) === false )

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value="" required readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INTERROGATION</label>
                                    <input class="form-control" type="text" name="interrogation" id="interro" value=" {{ number_format((($note_interro_one->note + $note_interro_two->note + $note_interro_three->note)/3),2) }}" readonly>
                                    @error('interrogation')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DEVOIR</label>
                                        <input class="form-control" type="text" name="devoir" id="devoir" value="{{ number_format((($note_devoir_one->note + $note_devoir_two->note)/2),2) }}" required readonly>
                                    @error('devoir')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EXAMEN</label>
                                    <input class="form-control" type="text" name="examen" id="examen" value="{{ number_format($note_examen->note,2) }}" required readonly>
                                    @error('examen')
                                        <div style="color:red;"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                @endif

                <div class="form-group">
                    <label>CLASSE</label>
                    <input class="form-control" type="text" name="classe" value="{{ $eleve->classe }}" readonly>
                    @error('classe')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label>MOYENNE MATIERE</label>
                            <input class="form-control" type="text" name="avg_matiere" id="moyenne_matiere" readonly>
                            @error('avg_matiere')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <label>APPRECIATION</label>
                            <input class="form-control" type="text" name="appreciation">
                            @error('appreciation')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                   </div>
               </div>

                <div hidden class="form-group">
                    <input class="form-control" type="text" name="coefficient" id="coef" value="{{ $type_matiere->coefficient }}" readonly>
                    <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                    <input class="form-control" type="text" name="utilisateur" value="{{ auth()->user()->username }}" readonly>
                    <input type="text" class="form-control" name="annee_scolaire" value="{{ $eleve->annee_scolaire }}" readonly>
                    <input class="form-control" type="text" name="avg_matiere_coef" id="moyenne_matiere_coef" readonly>
                </div>


                @if ($nbre->nbre_interro === 1 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note) === false || isset($note_devoir_one->note) === false)
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif

                @elseif ($nbre->nbre_interro === 1 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note) === false || isset($note_devoir_one->note) === false ||
                    isset($note_devoir_two->note) === false)
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif

                @elseif ($nbre->nbre_interro === 2 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note) === false || isset($note_interro_two->note) === false ||
                    isset($note_devoir_one->note) === false)
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif

                @elseif ($nbre->nbre_interro === 2 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note) === false || isset($note_interro_two->note) === false ||
                    isset($note_devoir_one->note) === false || isset($note_devoir_two->note) === false )
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif

                @elseif ($nbre->nbre_interro === 3 AND $nbre->nbre_devoir === 1)
                    @if (isset($note_interro_one->note )=== false || isset($note_interro_two->note) === false ||
                    isset($note_interro_three->note) === false  || isset($note_devoir_one->note) === false)
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif

                @elseif ($nbre->nbre_interro === 3 AND $nbre->nbre_devoir === 2)
                    @if (isset($note_interro_one->note )=== false || isset($note_interro_two->note) === false ||
                    isset($note_interro_three->note) === false || isset($note_devoir_one->note) === false ||
                    isset($note_devoir_two->note) === false )
                        <h3 class="text-danger"> Notes pas complètes ! </h3>
                        <button type="submit" disabled class="btn btn-primary" id="btn"> Enregistrer</button>
                    @else
                        <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>
                    @endif
                @endif

                    {{-- <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button> --}}

            </form>
        </div>
    </div>

    <script>
        var interro      = parseFloat(document.getElementById('interro').value);
        var devoir       = parseFloat(document.getElementById('devoir').value);
        var examen       = parseFloat(document.getElementById('examen').value);
        var coefficient  = document.getElementById('coef').value;
        var examen       = parseFloat(document.getElementById('examen').value);

        var moyenne_matiere = document.getElementById('moyenne_matiere').value = ((interro + devoir + examen)/3);
        document.getElementById('moyenne_matiere_coef').value = moyenne_matiere*coefficient;
    </script>
@endif



@endsection
