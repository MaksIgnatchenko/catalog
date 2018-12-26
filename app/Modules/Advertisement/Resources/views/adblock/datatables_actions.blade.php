@permission('delete_adblocks')
    <div class='btn-group'>
        <a href="#" class='btn btn-danger'
           onclick="document.getElementById('delete-adblock-{{$id}}-button').click()">
            {!! Form::open(['method'=>'DELETE', 'route'=>['adblock.destroy', $id]]) !!}
            <button hidden id="delete-adblock-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Delete"
                    type="submit" class="dropdown-item"
                    onclick="return confirm('Are you sure you want to delete this item?');">
            </button>
            {!! Form::close() !!}
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
@endpermission
