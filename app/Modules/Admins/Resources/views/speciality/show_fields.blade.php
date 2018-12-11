<!-- Name Field -->
<div class="form-group">
    <p>
        {!! Form::label('name', 'Name:') !!}
        {!! $speciality->name !!}
    </p>
</div>

<!-- Category Field -->
<div class="form-group">
    <p>
        {{ Form::label('category', 'Category: ') }}
        {!! $speciality->category->name !!}
    </p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {!! Form::label('description', 'Description:') !!}
        {!! $speciality->description !!}
    </p>
</div>
