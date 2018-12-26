@permission('edit_companies')
    @if(CheckCompanyStatus::isActive($status))
        <div class='btn-group'>
            <a href="#" class='btn btn-success'
               onclick="document.getElementById('update-{{$id}}-button').click()">
                {!! Form::open(['method'=>'PUT', 'route'=>['company.update', $id]]) !!}
                {!! Form::hidden('status', \App\Modules\Companies\Enums\CompanyStatusEnum::BLOCK) !!}
                <button hidden id="update-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Block"
                        type="submit" class="dropdown-item"
                        onclick="return confirm('Are you sure you want to block this company?');">
                </button>
                {!! Form::close() !!}
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    @endif

    @if(CheckCompanyStatus::isBlock($status))
        <div class='btn-group'>
            <a href="#" class='btn btn-danger'
               onclick="document.getElementById('update-{{$id}}-button').click()">
                {!! Form::open(['method'=>'PUT', 'route'=>['company.update', $id]]) !!}
                {!! Form::hidden('status', \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE) !!}
                <button hidden id="update-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Activate"
                        type="submit" class="dropdown-item"
                        onclick="return confirm('Are you sure you want to activate this company?');">
                </button>
                {!! Form::close() !!}
                <i class="glyphicon glyphicon-ok"></i>
            </a>
        </div>
    @endif
    <div class='btn-group'>
        <a href="{{ route('company.edit', $id) }}" class='btn btn-primary'>
            <i class="glyphicon glyphicon-wrench"></i>
        </a>
    </div>
@endpermission
