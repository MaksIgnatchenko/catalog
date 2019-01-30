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

<!-- Phone Field -->
<div class="form-group">
    <p>
        {{ Form::label('phones[0]', 'Phone 1: ') }}
        {!! Form::text('phones[0]', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('phones.0'))
        <div class="text-red">{{ 'Incorrect phone number' }}</div>
    @endif
</div>

<!-- Phone Field -->
<div class="form-group">
    <p>
        {{ Form::label('phones[1]', 'Phone 2: ') }}
        {!! Form::text('phones[1]', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('phones.1'))
        <div class="text-red">{{ 'Incorrect phone number' }}</div>
    @endif
</div>

<!-- Phone Field -->
<div class="form-group">
    <p>
        {{ Form::label('phones[2]', 'Phone 3: ') }}
        {!! Form::text('phones[2]', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('phones.2'))
        <div class="text-red">{{ 'Incorrect phone number' }}</div>
    @endif
</div>

<!-- Website Field -->
<div class="form-group">
    <p>
        {{ Form::label('website', 'Website: ') }}
        {!! Form::text('website', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('website'))
        <div class="text-red">{{ $errors->first('website') }}</div>
    @endif
</div>

<!-- Password Field -->
<div class="form-group">
    <p>
        {{ Form::label('password', 'Password: ') }}
        {!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
    </p>
    @if ($errors->has('password'))
        <div class="text-red">{{ $errors->first('password') }}</div>
    @endif
</div>

<!-- Password confirmation Field -->
<div class="form-group">
    <p>
        {{ Form::label('password_confirmation', 'Password confirmation: ') }}
        {!! Form::password('password_confirmation', ['placeholder'=>'Password', 'class'=>'form-control', 'maxlength' => 50, 'autocomplete' => 'off']) !!}
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
        {!! Form::text('date_change_status', null, ['id' => 'dateField', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
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
<div class="form-group image-field">
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
    <h3>Company images</h3>
    <div class="images-paren-div">
        <div id="company-image-field" class="increment company-image-field form-group image-field">
            <p>
                {{ Form::label('company_image', 'Company image: ') }}
            </p>
            {!! Form::file('company_image[]', false, ['class' => 'form-control company-image']) !!}
            <button class="btn btn-danger" type="button">Remove</button>
        </div>
    </div>
    <div class="input-group-btn">
        <button class="btn btn-success" type="button">Add new company image</button>
    </div>
</div>


@if ($errors->has('company_image.*'))
    <div class="text-red">'The company image must be an image of types:jpeg, png</div>
@endif

<!-- Company Team image Field -->
<div id="company-team-images">
    <h3>Team images</h3>
    <div class="images-paren-div">
        <div class="increment company-image-field form-group image-field">
            <p>
                {{ Form::label('company_team_image', 'Team image: ') }}
            </p>
            {!! Form::file('company_team_image[]', false, ['class' => 'form-control company-image']) !!}
            <button class="btn btn-danger" type="button">Remove</button>
        </div>
    </div>
    <div class="input-group-btn">
        <button class="btn btn-success" type="button">Add new team image</button>
    </div>
</div>

@if ($errors->has('company_team_image.*'))
    <div class="text-red">'The team image must be an image of types:jpeg, png</div>
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
                <th>Is working day</th>
                <th>Work from</th>
                <th>Work to</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dto->getWeekDays() as $day)
            <tr>
                <td>
                    {!! Form::checkbox('work_days[' . $day['abbreviation'] . '][is_work]', true, false, ['id' => $day['abbreviation'], 'class' => 'custom-checkbox time-checkbox']) !!}
                    {{ Form::label($day['abbreviation']) }}
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
    @if ($errors->has('work_days'))
        <div class="text-red">{{ $errors->first('work_days') }}</div>
    @endif
        <div class="text-red">{{ $errors->first('work_days.*') }}</div>
</div>

<!-- Location Field -->
<div class="form-group">
    <p>
        {{ Form::label('location_link', 'Link to google map location: ') }}
        {!! Form::text('location_link', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    </p>
    @if ($errors->has('location_link'))
        <div class="text-red">{{ $errors->first('location_link') }}</div>
    @endif
</div>

<!-- Company images capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_company_capture', 'Company images capture: ') }}
        {!! Form::text('our_company_capture', $dto->getDefaultOurCompanyCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_company_capture'))
        <div class="text-red">{{ $errors->first('our_company_capture') }}</div>
    @endif
</div>

<!-- About us capture -->
<div class="form-group">
    <p>
        {{ Form::label('about_us_capture', 'About as capture: ') }}
        {!! Form::text('about_us_capture', $dto->getDefaultAboutAsCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_company_capture'))
        <div class="text-red">{{ $errors->first('about_us_capture') }}</div>
    @endif
</div>

<!-- Our services capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_services_capture', 'Our services capture: ') }}
        {!! Form::text('our_services_capture', $dto->getDefaultOurServicesCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_services_capture'))
        <div class="text-red">{{ $errors->first('our_services_capture') }}</div>
    @endif
</div>

<!-- Our team capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_team_capture', 'Team images capture: ') }}
        {!! Form::text('our_team_capture', $dto->getDefaultOurTeamCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_team_capture'))
        <div class="text-red">{{ $errors->first('our_team_capture') }}</div>
    @endif
</div>

<!-- Booking an appointment capture -->
<div class="form-group">
    <p>
        {{ Form::label('booking_an_appointment_capture', 'Booking an appointment capture: ') }}
        {!! Form::text('booking_an_appointment_capture', $dto->getDefaultBookingAnAppointmentCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('booking_an_appointment_capture'))
        <div class="text-red">{{ $errors->first('booking_an_appointment_capture') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>

    var imageSizeLimit = {{ config('image.company_images_max_size') }} * 1024;

    $('.image-field').each(function() {
        $(this).children().eq(1).change(imageSizeLimitter);
    })

    function imageSizeLimitter() {
        if (this.files[0].size > imageSizeLimit) {
            alert("The image should be no more than " + imageSizeLimit / 1024 + "Kb");
            this.value = '';
        }
    }

    $(".btn-success").click(function(){
        var imagesCount = $('.increment').length;
        var parent = $(this).parent().parent().find('.images-paren-div');
        var clonedBlock = parent.children().first();
        if (imagesCount < 10) {
            var html = clonedBlock.clone();
            // clean image field value
            var uploadField = html.children().eq(1);
            uploadField.val('');
            parent.append(html);
            uploadField.change(imageSizeLimitter);
        } else {
            alert('You can add up to 10 images at a time.');
        }
    });



    $("body").on("click",".btn-danger",function(){
        var parentChildrenCount = $(this).parent().parent().children().length;
        if (parentChildrenCount > 1) {
            $(this).parent().remove();
        }
    });

    $(".time-checkbox").each(function() {
        var isWorkCheckbox = $(this);
        handleTimeInputs($(this));
    });

    $(".time-checkbox").click(function(){
        var isWorkCheckbox = $(this);
        handleTimeInputs($(this));
    });


    function handleTimeInputs(isWorkDayCheckbox) {
        var from = isWorkDayCheckbox.parent().siblings().eq(0).children().first();
        var to = isWorkDayCheckbox.parent().siblings().eq(1).children().first();
        if (isWorkDayCheckbox.prop('checked')) {
            from.prop('disabled', false);
            to.prop('disabled', false);
        } else {
            from.prop('disabled', 'disabled');
            to.prop('disabled', 'disabled');
        }
    }

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

    jQuery(function($){
        timePicker = $('.time-field').timepicker(timeOptions);
    });

    var isNowCheckbox = $('#isNow');

    if (isNowCheckbox.attr('checked')) {
        $('#dateField').attr('disabled', 'disabled');
    }

    isNowCheckbox.click(function(){
        console.log(this);
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
