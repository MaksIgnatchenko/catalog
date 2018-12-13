<li class="{{ActiveLink::checkDashboard() ? 'active' : ''}}">
    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>

<li class="treeview {{ActiveLink::checkManagement() ? 'active' : ''}}">
    <a href="#" class="treeview-toggle"><i class="fa fa-table"></i><span>Management</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-{{ActiveLink::checkManagement() ? 'left' : 'down'}} pull-right"></i>
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

<li class="{{ActiveLink::checkAdblock() ? 'active' : ''}}">
    <a href="{{route('adblock.index')}}"><i class="fa fa-bullhorn"></i> <span>Advertisement</span></a>
</li>

