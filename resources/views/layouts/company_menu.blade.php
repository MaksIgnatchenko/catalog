<li class="{{ActiveLink::checkDashboard() ? 'active' : ''}}">
    <a href="{{route('company')}}"><i class="fa fa-dashboard"></i> <span>Main info</span></a>
</li>

<li class="treeview {{ActiveLink::checkCompany() ? 'active' : ''}}">
    <a href="#" class="treeview-toggle"><i class="fa fa-building"></i><span>My company</span>
        <span class="pull-right-container">
                    <i class="fa fa-angle-{{ActiveLink::checkCompany() ? 'right' : 'down'}} pull-right"></i>
                  </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyShow() ? 'active' : ''}}">
            <a href="{{route('my-company.show')}}"><i class="fa {{ActiveLink::checkCompanyShow() ? 'fa-circle' : 'fa-circle-o'}}"></i>Company info</a>
        </li>
    </ul>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyEdit() ? 'active' : ''}}">
            <a href="{{route('my-company.edit')}}"><i class="fa {{ActiveLink::checkCompanyEdit() ? 'fa-circle' : 'fa-circle-o'}}"></i>Edit company</a>
        </li>
    </ul>
</li>

<li class="{{ActiveLink::checkAccount() ? 'active' : ''}}">
    <a href="{{route('account.edit')}}"><i class="fa fa-user"></i> <span>Account settings</span></a>
</li>

