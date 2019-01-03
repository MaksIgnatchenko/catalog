<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Email Field -->
<div class="form-group">
    <p>
        {{ Form::label('email', 'Email: ') }}
        {!! Form::text('email', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('email'))
        <div class="text-red">{{ $errors->first('email') }}</div>
    @endif
</div>

<!-- Password Field -->
<div class="form-group">
    <p>
        {{ Form::label('password', 'Password: ') }}
        {!! Form::text('password', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('password'))
        <div class="text-red">{{ $errors->first('password') }}</div>
    @endif
</div>

<!-- Password confirmation Field -->
<div class="form-group">
    <p>
        {{ Form::label('password_confirmation', 'Password confirmation: ') }}
        {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('password_confirmation'))
        <div class="text-red">{{ $errors->first('password_confirmation') }}</div>
    @endif
</div>


<!-- Status Field -->
<div class="form-group">
    <p>
        {{ Form::label('status', 'Company status: ') }}
    </p>
    {!! Form::select('statuses',$dto->getStatuses(), ['class' => 'form-control'], ['placeholder' => 'Select company status']) !!}
    @if ($errors->has('statuses'))
        <div class="text-red">{{ $errors->first('statuses') }}</div>
    @endif
</div>

<!-- IsNow Field -->
<div class="form-group">
    <p>
        {!! Form::checkbox('isNow', true, false, ['id' => 'isNow', 'class' => 'custom-checkbox']) !!}
        {{ Form::label('isNow', 'Now' . ': ') }}
    </p>
</div>

<!-- Change status date Field -->
<div class="form-group">
    <p>
        {{ Form::label('date_change_status', 'Date for change status: ') }}
        {!! Form::text('date_change_status', null, ['id' => 'dateField', 'class' => 'form-control']) !!}
    </p>
    @if ($errors->has('date_change_status'))
        <div class="text-red">{{ $errors->first('date_change_status') }}</div>
    @endif
</div>

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
    </p>
    {!! Form::select('country_id', $dto->getCountries(), ['class' => 'form-control'], ['placeholder' => 'Select country']) !!}
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('country_id') }}</div>
    @endif
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
    </p>
    {!! Form::select('city_id', [], ['class' => 'form-control'], ['placeholder' => 'Select city']) !!}
    @if ($errors->has('city_id'))
        <div class="text-red">{{ $errors->first('city_id') }}</div>
    @endif
</div>

<!-- Category Field -->
<div class="form-group">
    <p>
        {{ Form::label('category', 'Category: ') }}
        {!! Form::select('category_id', $dto->getCategories(), ['class' => 'form-control'], ['placeholder' => 'Select category']) !!}
    </p>
    @if ($errors->has('category_id'))
        <div class="text-red">{{ $errors->first('category_id') }}</div>
    @endif
</div>

<!-- Speciality Field -->
<div class="form-group">
    <p>
        {{ Form::label('speciality', 'Speciality: ') }}
    </p>
    {!! Form::select('speciality_id', [], ['class' => 'form-control'], ['placeholder' => 'Select speciality']) !!}
    @if ($errors->has('speciality_id'))
        <div class="text-red">{{ $errors->first('speciality_id') }}</div>
    @endif
</div>

<!-- Type Field -->
<div class="form-group">
    <p>
        {{ Form::label('type', 'Type: ') }}
    </p>
    {!! Form::select('type_id', [], ['class' => 'form-control'], ['placeholder' => 'Select type']) !!}
    @if ($errors->has('type_id'))
        <div class="text-red">{{ $errors->first('type_id') }}</div>
    @endif
</div>

<!-- Company's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('company_images_limit', 'Company\'s images limit: ') }}
        {!! Form::text('company_images_limit', $dto->getDefaultCompanyImagesLimit(), ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('company_images_limit'))
        <div class="text-red">{{ $errors->first('company_images_limit') }}</div>
    @endif
</div>

<!-- Team's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('team_images_limit', 'Team\'s images limit: ') }}
        {!! Form::text('team_images_limit', $dto->getDefaultTeamImagesLimit(), ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('team_images_limit'))
        <div class="text-red">{{ $errors->first('team_images_limit') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    var datePicker;
    var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    jQuery(function($){
        datePicker = $('#dateField').datepicker(options);
    });

    $('#isNow').click(function(){
        if(this.checked == true){
            $('#dateField').attr('disabled', 'disabled');
        } else {
            $('#dateField').removeAttr('disabled');
        }
    });

    var categorySelect = $('select[name=category_id]');
    var specialitySelect = $('select[name=speciality_id]');
    var typeSelect = $('select[name=type_id]');

    var countrySelect = $('select[name=country_id]');
    var citySelect = $('select[name=city_id]');

    @if( count($errors) > 0 && old('category_id'))
        getDependsOptions(categorySelect[0].value, '/api/specialities/', specialitySelect, "{{ old('speciality_id') }}")
    @endif

    @if( count($errors) > 0 && old('speciality_id'))
        getDependsOptions(specialitySelect[0].value, '/api/types/', typeSelect, "{{ old('type_id') }}")
    @endif

    categorySelect.change('change', function() {
        var selectValue = this.value;
        if(selectValue) {
            getDependsOptions(selectValue, '/api/specialities/', specialitySelect);
        } else {
            cleanSelect(specialitySelect);
        }
    });

    specialitySelect.change('change', function() {
        var selectValue = this.value;
        if(selectValue) {
            getDependsOptions(selectValue, '/api/types/', typeSelect);
        } else {
            cleanSelect(typeSelect);
        }
    });

    @if( count($errors) > 0 && old('country_id'))
        if (countrySelect[0].value) {
            getDependsOptions(countrySelect[0].value, '/api/cities/', citySelect, "{{ old('city_id') }}")
        }
    @endif

    countrySelect.change('change', function() {
        var selectValue = this.value;
        if(selectValue) {
            getDependsOptions(selectValue, '/api/cities/', citySelect);
        } else {
            cleanSelect(citySelect);
        }
    });

    function insertNewOption(select, key, val, selected = false) {
        if (selected) {
            var newOption = $('<option value="'+key+'">'+val+'</option>').attr('selected','selected');
        } else {
            var newOption = $('<option value="'+key+'">'+val+'</option>')
        }
        select.append(newOption);
    }

    function cleanSelect(select) {
        select.children().not(':first').remove().end();
    }

    function getDependsOptions(mainOption, url, dependSelect, selectedKey) {
        $.ajax({
            url: url + mainOption,
            cache: false,
            type: 'GET',
            headers: {
                "Content-Type":"json",
            },
            success: function (data, textStatus, xhr) {
                cleanSelect(dependSelect);
                $.each(data, function(key, value){
                    insertNewOption(dependSelect, key, value, key == selectedKey);
                });
            },
            error :function(err) {
                cleanSelect(dependSelect);
            }
        })
    }
</script>