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

<li class="treeview {{ActiveLink::checkCompanyMessages() ? 'active' : ''}}">
    <a href="#" class="treeview-toggle"><i class="fa fa-envelope"></i><span>Messages</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-{{ActiveLink::checkCompanyMessages() ? 'right' : 'down'}} pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyIncomingMessagesController() ? 'active' : ''}}">
            <a href="{{route('companyIncomingMessages.index')}}"><i class="fa {{ActiveLink::checkCompanyIncomingMessagesController() ? 'fa-circle' : 'fa-circle-o'}}"></i>Incoming messages</a>
        </li>
    </ul>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyOutgoingMessagesController() ? 'active' : ''}}">
            <a href="{{route('companyOutgoingMessages.index')}}"><i class="fa {{ActiveLink::checkCompanyOutgoingMessagesController() ? 'fa-circle' : 'fa-circle-o'}}"></i>Outgoing messages</a>
        </li>
    </ul>
</li>

<li class="{{ActiveLink::checkCompanyIncomingMessagesController() ? 'active' : ''}}">
    <a href="{{route('account.edit')}}"><i class="fa fa-user"></i> <span>Account settings</span></a>
</li>


<li>
    {!! \App\Helpers\PaypalButton::insert() !!}
</li>
