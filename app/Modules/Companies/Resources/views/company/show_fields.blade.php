<!-- Name Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $category->name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $category->description !!}
    </p>
</div>

<!-- Specialities Field -->
<div class="form-group">
    <p>
        {!! Form::label('specialities', 'Specialities:') !!}
    </p>
    @foreach($category->specialities as $speciality)
        <p>
            {{ $speciality->name }}
        </p>
    @endforeach
</div>

