@permission('read_supervisors')
    <div class='btn-group'>
        <a href="{{ route('supervisor.show', $id) }}" class='btn btn-primary'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    </div>
@endpermission

@permission('edit_supervisors')
<div class='btn-group'>
    <a href="{{ route('supervisor.edit', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
@endpermission

@permission('delete_supervisors')
<div class='btn-group'>
    <a href="#" class='btn btn-danger'
       onclick="document.getElementById('delete-supervisor-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['supervisor.destroy', $id]]) !!}
        <button hidden id="delete-supervisor-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>
@endpermission
