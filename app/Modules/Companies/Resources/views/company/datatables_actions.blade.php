@if(CheckCompanyStatus::isActive($status))
    <div class='btn-group'>
        <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::BLOCK]) }}" class='btn btn-primary'>
            <i class="glyphicon glyphicon-ok"></i>
        </a>
    </div>
@endif

@if(CheckCompanyStatus::isBlock($status))
    <div class='btn-group'>
        <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE]) }}" class='btn btn-dark'>
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
@endif

@if(CheckCompanyStatus::isWaitingForActivation($status))
    <div class='btn-group'>
        <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::BLOCK]) }}" class='btn btn-info'>
            <i class="glyphicon glyphicon-ok"></i>
        </a>
    </div>
@endif

@if(CheckCompanyStatus::isWaitingForBlock($status))
    <div class='btn-group'>
        <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::CHANGE_STATUS, 'newStatus' => \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE]) }}" class='btn btn-warning'>
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
@endif

<div class='btn-group'>
    <a href="{{ route('company.edit', [$id, 'operation' => CompanyEditOperationsEnum::OTHER]) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-wrench"></i>
    </a>
</div>

<div class='btn-group'>
    <a href="#" class='btn btn-danger'
       onclick="document.getElementById('delete-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['company.destroy', $id]]) !!}
        <button hidden id="delete-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this company?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>
