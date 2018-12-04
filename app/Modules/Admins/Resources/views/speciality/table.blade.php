@section('css')
    @include('layouts.datatables_css')
@endsection
<div class='btn-group'>
    <a href="{{ route('speciality.create') }}" class='btn btn-success btn-lg'>
        <i class="glyphicon glyphicon-plus"></i>
    </a>
</div>
{!! $dataTable->table(['width' => '100%']) !!}

@section('script')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection