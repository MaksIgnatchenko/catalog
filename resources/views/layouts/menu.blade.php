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
    <li class="{{ActiveLink::checkAdminCompany() ? 'active' : ''}}">
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

@permission('index_static_content')
<li class="treeview {{ActiveLink::checkStaticContent() ? 'active' : ''}}">
    <a href="#" class="treeview-toggle"><i class="fa fa-book"></i><span>Site Content</span>
        <span class="pull-right-container">
                    <i class="fa fa-angle-{{ActiveLink::checkStaticContent() ? 'right' : 'down'}} pull-right"></i>
                  </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkWhoWeAre() ? 'active' : ''}}">
            <a href="{{route('who-we-are.index')}}"><i class="fa {{ActiveLink::checkWhoWeAre() ? 'fa-circle' : 'fa-circle-o'}}"></i>Who we are</a>
        </li>
        <li class="{{ActiveLink::checkOurVision() ? 'active' : ''}}">
            <a href="{{route('our-vision.index')}}"><i class="fa {{ActiveLink::checkOurVision() ? 'fa-circle' : 'fa-circle-o'}}"></i>Our vision</a>
        </li>
        <li class="{{ActiveLink::checkTerm() ? 'active' : ''}}">
            <a href="{{route('term.index')}}"><i class="fa {{ActiveLink::checkTerm() ? 'fa-circle' : 'fa-circle-o'}}"></i>Terms and conditions</a>
        </li>
        <li class="{{ActiveLink::checkPrivacyPolicy() ? 'active' : ''}}">
            <a href="{{route('privacy-policy.index')}}"><i class="fa {{ActiveLink::checkPrivacyPolicy() ? 'fa-circle' : 'fa-circle-o'}}"></i>Privacy policy</a>
        </li>
        <li class="{{ActiveLink::checkHelp() ? 'active' : ''}}">
            <a href="{{route('help.index')}}"><i class="fa {{ActiveLink::checkHelp() ? 'fa-circle' : 'fa-circle-o'}}"></i>Help</a>
        </li>
        <li class="{{ActiveLink::checkSocialLink() ? 'active' : ''}}">
            <a href="{{route('social-link.index')}}"><i class="fa {{ActiveLink::checkSocialLink() ? 'fa-circle' : 'fa-circle-o'}}"></i>Social Links</a>
        </li>
    </ul>
</li>
@endpermission

@permission('index_messages')
<li class="treeview {{ActiveLink::checkAdminMessages() ? 'active' : ''}}">
    <a href="#" class="treeview-toggle"><i class="fa fa-envelope"></i><span>Messages</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-{{ActiveLink::checkAdminMessages() ? 'right' : 'down'}} pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyIncomingMessagesController() ? 'active' : ''}}">
            <a href="{{route('adminIncomingMessages.index')}}"><i class="fa {{ActiveLink::checkAdminIncomingMessagesController() ? 'fa-circle' : 'fa-circle-o'}}"></i>Incoming messages</a>
        </li>
    </ul>
    <ul class="treeview-menu">
        <li class="{{ActiveLink::checkCompanyOutgoingMessagesController() ? 'active' : ''}}">
            <a href="{{route('adminOutgoingMessages.index')}}"><i class="fa {{ActiveLink::checkAdminOutgoingMessagesController() ? 'fa-circle' : 'fa-circle-o'}}"></i>Outgoing messages</a>
        </li>
    </ul>
</li>
@endpermission
