<div class="btn-group dropdown custom-dropdown">
    <a class="btn btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
    </a>
    <div class="dropdown-menu custom-dropdown-item" aria-labelledby="dropdownMenuLink" style="width: 100%">
        @permission('create_messages')
            <a href="{{ route('adminOutgoingMessages.create', $id) }}" class='btn btn-primary dropdown-item custom-dropdown-item' style="width: 100%">
                <i class="glyphicon glyphicon-envelope"></i>
            </a>
        @endpermission

        @permission('read_companies')
            <a href="{{ route('company.show', $id) }}" class='btn btn-primary dropdown-item' style="width: 100%">
                <i class="glyphicon glyphicon-eye-open"></i>
            </a>
        @endpermission

        @permission('edit_companies')
        @if(CheckCompanyStatus::isActive($status))
                <a href="{{ route('company.edit',
                [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::BLOCK]) }}" class='btn btn-primary dropdown-item custom-dropdown-item' style="width: 100%">
                    <i class="glyphicon glyphicon-ok"></i>
                </a>
        @endif

        @if(CheckCompanyStatus::isBlock($status))
                <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE]) }}" class='btn btn-dark dropdown-item custom-dropdown-item' style="width: 100%">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
        @endif

        @if(CheckCompanyStatus::isWaitingForActivation($status))
                <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::BLOCK]) }}" class='btn btn-info dropdown-item custom-dropdown-item' style="width: 100%">
                    <i class="glyphicon glyphicon-ok"></i>
                </a>
        @endif

        @if(CheckCompanyStatus::isWaitingForBlock($status))
                <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE]) }}" class='btn btn-warning dropdown-item custom-dropdown-item' style="width: 100%">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
        @endif

            <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::OTHER]) }}" class='btn btn-primary dropdown-item custom-dropdown-item' style="width: 100%">
                <i class="glyphicon glyphicon-wrench"></i>
            </a>
        @endpermission

        @permission('delete_companies')
            <a href="#" class='btn btn-danger dropdown-item custom-dropdown-item' style="width: 100%"
               onclick="document.getElementById('delete-{{$id}}-button').click()">
                {!! Form::open(['method'=>'DELETE', 'route'=>['company.destroy', $id]]) !!}
                <button hidden id="delete-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                        type="submit" class="dropdown-item"
                        onclick="return confirm('Are you sure you want to delete this company?');">
                </button>
                {!! Form::close() !!}
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        @endpermission
    </div>
</div>