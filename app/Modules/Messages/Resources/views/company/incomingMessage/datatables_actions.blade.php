<div class='btn-group'>
    <a href="{{ route('companyIncomingMessages.show', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
</div>

<div class='btn-group'>
    <a href="#" class='btn btn-danger'
       onclick="document.getElementById('delete-message-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['companyIncomingMessages.destroy', $id]]) !!}
        <button hidden id="delete-message-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>
