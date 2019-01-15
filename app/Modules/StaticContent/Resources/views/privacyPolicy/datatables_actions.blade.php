@permission('read_static_content')
    <div class='btn-group'>
        <a href="{{ route('privacy-policy.show', $id) }}" class='btn btn-primary'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    </div>
@endpermission

@permission('edit_static_content')
<div class='btn-group'>
    <a href="{{ route('privacy-policy.edit', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
@endpermission

@permission('delete_static_content')
<div class='btn-group'>
    <a href="#" class='btn btn-danger'
       onclick="document.getElementById('delete-privacyPolicy-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['privacy-policy.destroy', $id]]) !!}
        <button hidden id="delete-privacyPolicy-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>
@endpermission
