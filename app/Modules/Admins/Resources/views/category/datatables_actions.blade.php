<div class='btn-group'>
    <a href="{{ route('category.show', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
</div>
<div class='btn-group'>
    <a href="{{ route('category.edit', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
<div class='btn-group'>
    <a href="#" class='btn btn-primary'
       onclick="document.getElementById('delete-category-{{$id}}-button').click()">
        {!! Form::open(['method'=>'DELETE', 'route'=>['category.destroy', $id]]) !!}
        <button hidden id="delete-category-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this item?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</div>