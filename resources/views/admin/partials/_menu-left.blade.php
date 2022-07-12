<ul class="navbar-nav bg-gradient-primary accordion" id="accordionSidebar">          
    <!-- Nav Item - Dashboard -->
    @can('dashboard_call')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard.call')}}">
            <i class="fa fa-list-ul"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @endcan

    @can('dashboard_case')
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin.dashboard.triagem')}}">
          <i class="fa fa-list-ul"></i>
          <span>Dashboard</span>
      </a>
    </li>
    @endcan

    @can('dashboard_process')
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin.dashboard.processual')}}">
          <i class="fa fa-list-ul"></i>
          <span>Dashboard</span>
      </a>
    </li>
    @endcan
    
    @can('view_schedule')
    <li class="nav-item active">
        <a class="nav-link" href="javascript:void(0);">
            <i class="fa fa-calendar-check-o"></i>
            <span>Agenda</span>
        </a>
    </li>
    @endcan

    @can('view_contacts')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.clients.index')}}">
            <i class="fa fa-user-o"></i>
            <span>Contatos</span>
        </a>
    </li>
    @endcan

    @can('view_calls')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.calls.index',['status_call[]'=>'novo'])}}">
            <i class="fa fa-comment-o"></i>
            <span>Atendimentos</span>
        </a>
    </li>
    @endcan

    @can('view_cases')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.cases.index')}}">
            <i class="fa fa-folder-o"></i>
            <span>Casos</span>
        </a>
    </li>
    @endcan


    @can('view_processes')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.process.index')}}">
            <i class="fa fa-balance-scale"></i>
            <span>Processos</span>
        </a>
    </li>  
    @endcan           
    <!-- Divider -->
    <hr class="sidebar-divider">

    
    @can('manager_info_register')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseElements" aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-cube"></i>
        <span>Info. de Registro <i class="fa fa-caret-down p-0 m-0"></i></span>
      </a>
      <div id="collapseElements" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('admin.changetypes.index')}}">Tipos de Alterações</a>
          <a class="collapse-item" href="{{route('admin.goals.index')}}">Metas</a>
          <a class="collapse-item" href="{{route('admin.reasons.index')}}">Motivos</a>
          <a class="collapse-item" href="{{route('admin.documents.index')}}">Documentos</a>          
          <a class="collapse-item" href="{{route('admin.guides.index')}}">Guias</a>          
          <a class="collapse-item" href="{{route('admin.task_lists.index')}}">Listas de tarefas</a>
          <a class="collapse-item" href="{{route('admin.historics.search')}}">Históricos</a>
          <a class="collapse-item" href="{{route('admin.top_questions.index')}}">Principais Dúvidas</a>
          <a class="collapse-item" href="{{route('admin.process_category.index')}}">Etapa processual</a>
          <a class="collapse-item" href="{{route('admin.help.index')}}">Como Podemos Ajudar</a>
          <span class="css-divider"></span>
          <a class="collapse-item" href="{{route('admin.document_categories.index')}}">Categorias de Doc.</a>
          <a class="collapse-item" href="{{route('admin.guide_categories.index')}}">Categorias de Guias</a>
            <a class="collapse-item" href="{{route('admin.top_questions_categories.index')}}">Categorias de Dúvidas</a>
            <a class="collapse-item" href="{{route('admin.process_type.index')}}">Categorias de Processos</a>
        </div>
      </div>
    </li>
    @endcan
    
    @can('manager_permissions')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-expeditedssl"></i>
          <span>Acessos/Permissões <i class="fa fa-caret-down p-0 m-0"></i></span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @can('view_user')
            <a class="collapse-item" href="{{route('admin.users.index')}}">Usuários</a>
            @endcan    
            <a class="collapse-item" href="{{route('admin.roles.index')}}">Cargos</a>
            <a class="collapse-item" href="{{route('admin.permissions.index')}}">Permissões</a>
          </div>
        </div>
    </li>
    @endcan

       

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    @can('manager_settings')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.settings.index')}}">
            <i class="fa fa-gear"></i>
            <span>Configurações</span>
        </a>
    </li>
    @endcan

</ul>