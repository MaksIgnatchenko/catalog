<li class="{{ActiveLink::checkDashboard() ? 'active' : ''}}">
    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>

@permission('index_categories')
    <li class="treeview {{ActiveLink::checkManagement() ? 'active' : ''}}">
        <a href="#" class="treeview-toggle"><i class="fa fa-table"></i><span>Categories</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-{{ActiveLink::checkManagement() ? 'right' : 'down'}} pull-right"></i>
                  </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ActiveLink::checkCategory() ? 'active' : ''}}">
                <a href="{{route('category.index')}}"><i class="fa {{ActiveLink::checkCategory() ? 'fa-circle' : 'fa-circle-o'}}"></i>Categories</a>
            </li>
            <li class="{{ActiveLink::checkSpeciality() ? 'active' : ''}}">
                <a href="{{route('speciality.index')}}"><i class="fa {{ActiveLink::checkSpeciality() ? 'fa-circle' : 'fa-circle-o'}}"></i>Specialities</a>
            </li>
            <li class="{{ActiveLink::checkType() ? 'active' : ''}}">
                <a href="{{route('type.index')}}"><i class="fa {{ActiveLink::checkType() ? 'fa-circle' : 'fa-circle-o'}}"></i>Types</a>
            </li>
        </ul>
    </li>
@endpermission

@permission('index_adblocks')
    <li class="{{ActiveLink::checkAdblock() ? 'active' : ''}}">
        <a href="{{route('adblock.index')}}"><i class="fa fa-bullhorn"></i> <span>Advertisement</span></a>
    </li>
@endpermission

@permission('index_companies')
    <li class="{{ActiveLink::checkCompany() ? 'active' : ''}}">
        <a href="{{route('company.index')}}"><i class="fa fa-building"></i> <span>Companies</span></a>
    </li>
@endpermission

@permission('index_roles')
    <li class="{{ActiveLink::checkRole() ? 'active' : ''}}">
        <a href="{{route('role.index')}}"><i class="fa fa-suitcase"></i> <span>Roles</span></a>
    </li>
@endpermission

@permission('index_supervisors')
    <li class="{{ActiveLink::checkSupervisor() ? 'active' : ''}}">
        <a href="{{route('supervisor.index')}}"><i class="fa fa-user"></i> <span>Supervisors</span></a>
    </li>
@endpermission

