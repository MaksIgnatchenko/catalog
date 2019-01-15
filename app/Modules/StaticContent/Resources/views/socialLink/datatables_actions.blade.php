@permission('read_static_content')
    <div class='btn-group'>
        <a href="{{ route('social-link.show', $id) }}" class='btn btn-primary'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    </div>
@endpermission

@permission('edit_static_content')
<div class='btn-group'>
    <a href="{{ route('social-link.edit', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
@endpermission

@permission('delete_static_content')
<div class='btn-group'>
    <a href="#" class='btn btn-danger'
       onclick="document.getElementById('delete-socialLink-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['social-link.destroy', $id]]) !!}
        <button hidden id="delete-socialLink-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>
@endpermission
