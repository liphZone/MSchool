<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('accueil') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-school"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> MBSVI</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('accueil') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Accueil</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
        auth()->user()->grade === 'Comptable' || auth()->user()->grade === 'Professeur' ||
        auth()->user()->grade === 'Surveillant')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_inscriptions')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>ELEVES</span></a>
            </li>
        @endif

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_programs')}}">
                <i class="fa fa-table"></i>
                <span> EMPLOI DU TEMPS </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CLASSES"
                    aria-expanded="true" aria-controls="CLASSES">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>CLASSES</span>
                </a>
                <div id="CLASSES" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('list_classes')}}">Liste des classes</a>
                        <a class="collapse-item" href="{{route('add_year')}}"> Année scolaire</a>
                        <a class="collapse-item" href="{{route('list_levels')}}">Niveaux</a>
                    </div>
                </div>
            </li>
        @endif

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' || auth()->user()->grade === 'Comptable')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ECOLAGE"
                    aria-expanded="true" aria-controls="ECOLAGE">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ECOLAGE</span>
                </a>
                <div id="ECOLAGE" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header"> Liste des élèves </h6> --}}
                        <a class="collapse-item" href="{{ route('student_updated') }}">Eleves à jour</a>
                        <a class="collapse-item" href="{{ route('student_unupdated') }}">Eleves non à jour</a>
                    </div>
                </div>
            </li>
        @endif

        @if ( auth()->user()->grade === 'Comptable')
            @php
                //si la caisse est deja initialisée , le bouton d'initialisation disparait
                $transaction = \App\Models\Transaction::where('status',0)->first();
            @endphp

            @if (empty($transaction))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#TRANSACTIONS"
                        aria-expanded="true" aria-controls="TRANSACTIONS">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>TRANSACTIONS</span>
                    </a>
                    <div id="TRANSACTIONS" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('init_caisse_form') }}">Initialiser la caisse </a>
                            <a class="collapse-item" href="{{ route('list_transactions') }}"> Liste des transactions </a>
                        </div>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('list_transactions')}}">
                    <i class="fa fa-pencil"></i>
                    <span>TRANSACTIONS</span></a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#COMPTABILITE"
                    aria-expanded="true" aria-controls="COMPTABILITE">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>COMPTABILITE</span>
                </a>
                <div id="COMPTABILITE" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('list_comptes') }}"> Comptes comptables </a>
                        <a class="collapse-item" href="{{ route('list_depenses') }}">Liste des depenses </a>
                    </div>
                </div>
            </li>
        @endif

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
        auth()->user()->grade === 'Comptable' || auth()->user()->grade === 'Eleve' ||
        auth()->user()->grade === 'Professeur' || auth()->user()->grade === 'Surveillant')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_messages')}}">
                <i class="fas fa-fw fa-comment"></i>
                <span>MESSAGES</span></a>
            </li>
        @endif

        @if (auth()->user()->grade === 'Professeur' || auth()->user()->grade === 'Eleve')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#NOTE"
                    aria-expanded="true" aria-controls="NOTE">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>NOTES</span>
                </a>
                <div id="NOTE" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('list_notes') }}"> Liste des notes </a>
                        <a class="collapse-item" href="{{ route('list_moyennes') }}">Moyennes matière </a>
                    </div>
                </div>
            </li>
        @elseif (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#NOTE"
                    aria-expanded="true" aria-controls="NOTE">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>NOTES</span>
                </a>
                <div id="NOTE" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('list_bulletins') }}">Bulletin </a>
                    </div>
                </div>
            </li>
        @endif


        @if (auth()->user()->grade === 'Professeur')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_warnings')}}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>ABSENCES</span>
                </a>
            </li>
        @elseif (auth()->user()->grade === 'Surveillant')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_warnings')}}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>RETARDS</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
            <li class="nav-item">
                <a class="nav-link" href="{{route('list_matieres')}}">
                <i class="fas fa-fw fa-book"></i>
                <span>MATIERES</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('list_cantines')}}">
                <i class="fas fa-fw fa-hamburger"></i>
                <span>CANTINE</span></a>
            </li>

            @php
                $description = \App\Models\Description::all();
            @endphp
          @if (empty($description) === false)

          @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('add_description')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>INFORMATIONS ECOLE </span></a>
            </li>
          @endif

        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{route('list_persons')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>UTILISATEURS</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
