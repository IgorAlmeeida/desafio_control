<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @can('view', \App\Models\Candidato::class)

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Inscricoes</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('selecionarProgramaInscricao')}}">Inscrever-se</a>
                    <a class="collapse-item" href="{{route('listMyInscricoes')}}">Minhas Inscrições</a>
                </div>
            </div>
        </li>
    @endcan


    <!-- Nav Item - Charts -->
    @can('edit', \App\Models\Servidor::class)
    <li class="nav-item">
        <a class="nav-link" href="{{route('listPrograma')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Programas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('listEdital')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Editais</span></a>
    </li>
    @endcan



    @can('view', \App\Models\Conta::class)
    <li class="nav-item">
        <a class="nav-link" href="{{route('listaContas')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Contas</span></a>
    </li>
    @endcan


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
