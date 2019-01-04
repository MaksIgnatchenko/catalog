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
        {{ Form::label('status1', 'Company status: ') }}
    </p>
    {!! Form::select('status', $dto->getStatuses(), ['class' => 'form-control'], ['placeholder' => 'Select company status']) !!}
    @if ($errors->has('status'))
        <div class="text-red">{{ $errors->first('status') }}</div>
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

<!-- Logo Field -->
<div class="form-group">
    <p>
        {{ Form::label('logo', 'Logo: ') }}
    </p>
    {!! Form::file('logo', false, ['class' => 'form-control']) !!}
    @if ($errors->has('logo'))
        <div class="text-red">{{ $errors->first('logo') }}</div>
    @endif
</div>

<!-- Company image Field -->
<div id="company-images">
    <div class="input-group-btn">
        <span>Company images:</span>
        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add new company image</button>
    </div>
    <div id="company_image_field" class="increment company-image-field form-group">
        <p>
            {{ Form::label('company_image', 'Company image: ') }}
        </p>
        {!! Form::file('company_image[]', ['class' => 'form-control company-image']) !!}
        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
    </div>
</div>


@if ($errors->has('company_image'))
    <div class="text-red">{{ $errors->first('company_image') }}</div>
@endif

<!-- Company Team image Field -->
<div id="company-team-images">
    <div class="input-group-btn">
        <span>Team images:</span>
        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add new team image</button>
    </div>
    <div id="company_team_image_field" class="form-group input-group control-group increment company-image-field">
        <p>
            {{ Form::label('company_team_image', 'Team image: ') }}
        </p>
        {!! Form::file('company_team_image[]', ['class' => 'form-control company-image']) !!}
        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
    </div>
</div>

@if ($errors->has('company_team_image'))
    <div class="text-red">{{ $errors->first('company_team_image') }}</div>
@endif

<!-- About us Field -->
<div class="form-group">
    <p>
        {{ Form::label('about_us', 'About us: ') }}
    </p>
    {!! Form::textarea('about_us', null, ['class' => 'form-control', 'maxlength' => 10000]) !!}
    @if ($errors->has('about_us'))
        <div class="text-red">{{ $errors->first('about_us') }}</div>
    @endif
</div>

<!-- Our services Field -->
<div class="form-group">
    <p>
        {{ Form::label('our_services', 'Our services: ') }}
    </p>
    {!! Form::textarea('our_services', null, ['class' => 'form-control', 'maxlength' => 10000]) !!}
    @if ($errors->has('our_services'))
        <div class="text-red">{{ $errors->first('our_services') }}</div>
    @endif
</div>

<!-- Working days Fields -->
<div class="form-group">
    <table>
        <thead>
            <tr>
                <th>Day of week</th>
                <th>Is working day</th>
                <th>Work from</th>
                <th>Work to</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dto->getWeekDays() as $day)
            <tr>
                <td>
                    {{ $day['name'] }}
                </td>
                <td>
                    {!! Form::checkbox('work_days[' . $day['abbreviation'] . '][is_work]', true, false, ['id' => $day['abbreviation'], 'class' => 'custom-checkbox']) !!}
                    {{ Form::label($day['abbreviation'], 'Now' . ': ') }}
                </td>
                <td>
                    {!! Form::text('work_days[' . $day['abbreviation'] . '][from]', null, ['id' => $day['abbreviation'] . '_from', 'class' => 'form-control time-field']) !!}
                </td>
                <td>
                    {!! Form::text('work_days[' . $day['abbreviation'] . '][to]', null, ['id' => $day['abbreviation'] . '_to', 'class' => 'form-control time-field']) !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>


<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    $('.time-field').each(function() {
        console.log($(this));
        // $(this).timepicker(timeOptions);
    });

    var companyImagesIterator = 1;
    $(".btn-success").click(function(){
        var parent = $(this).parent().parent();
        var parentBlock = $(this).parent().siblings().first();
        if (companyImagesIterator < 5) {
            var html = parentBlock.clone();
            // clean image field value
            html.children().eq(1).val('');
            companyImagesIterator++;
            parent.append(html);
        } else {
            alert('You can add up to 5 photos at a time.');
        }
    });

    $("body").on("click",".btn-danger",function(){
        var parentChildrenCount = $(this).parent().parent().children().length;
        if (parentChildrenCount > 2) {
            $(this).parent().remove();
            companyImagesIterator--;
        }
    });

    var datePicker;
    var options= {
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    jQuery(function($){
        datePicker = $('#dateField').datepicker(options);
    });

    var timeOptions = {
        'timeFormat' : 'H:i'
    };

    var isNowCheckbox = $('#isNow');

    if (isNowCheckbox.attr('checked')) {
        $('#dateField').attr('disabled', 'disabled');
    }

    isNowCheckbox.click(function(){
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
        getDependsOptions({{ old('speciality_id') }}, '/api/types/', typeSelect, "{{ old('type_id') }}")
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
