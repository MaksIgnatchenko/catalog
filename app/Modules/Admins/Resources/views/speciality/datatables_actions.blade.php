<div class='btn-group'>
    <a href="{{ route('speciality.show', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
</div>
<div class='btn-group'>
    <a href="{{ route('speciality.edit', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
<div class='btn-group'>
    <a href="#" class='btn btn-primary'
       onclick="document.getElementById('delete-speciality-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['speciality.destroy', $id]]) !!}
        <button hidden id="delete-speciality-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>