<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', $dto->getCompanyName(), ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
</div>

@isset($dto->getCompanyPhones()[0])
    <!-- Phone Field -->
    <div class="form-group">
        <p>
            {{ Form::label('phones[0]', 'Phone 1: ') }}
            {!! Form::text('phones[0]', $dto->getCompanyPhones()[0], ['class' => 'form-control', 'maxlength' => 100]) !!}
        </p>
        @if ($errors->has('phones.0'))
            <div class="text-red">{{ 'Incorrect phone number' }}</div>
        @endif
    </div>
@endisset

@isset($dto->getCompanyPhones()[1])
    <!-- Phone Field -->
    <div class="form-group">
        <p>
            {{ Form::label('phones[1]', 'Phone 2: ') }}
            {!! Form::text('phones[1]', $dto->getCompanyPhones()[1], ['class' => 'form-control', 'maxlength' => 100]) !!}
        </p>
        @if ($errors->has('phones.1'))
            <div class="text-red">{{ 'Incorrect phone number' }}</div>
        @endif
    </div>
@endisset

@isset($dto->getCompanyPhones()[2])
    <!-- Phone Field -->
    <div class="form-group">
        <p>
            {{ Form::label('phones[2]', 'Phone 3: ') }}
            {!! Form::text('phones[2]', $dto->getCompanyPhones()[2], ['class' => 'form-control', 'maxlength' => 100]) !!}
        </p>
        @if ($errors->has('phones.2'))
            <div class="text-red">{{ 'Incorrect phone number' }}</div>
        @endif
    </div>
@endisset

<!-- Website Field -->
<div class="form-group">
    <p>
        {{ Form::label('website', 'Website: ') }}
        {!! Form::text('website', $dto->getCompanyWebsite(), ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('website'))
        <div class="text-red">{{ $errors->first('website') }}</div>
    @endif
</div>

<!-- Status Field -->
<div class="form-group">
    <p>
        {{ Form::label('status', 'Company status: ') }}
        {{ $dto->getCompanyStatus() }}
    <div class="text-green">*Contact the administrator to change company status</div>
    </p>
</div>

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
    </p>
    {!! Form::select('country_id', $dto->getCountries(), $dto->getCompanyCountryId(), ['id' =>'country_id']) !!}
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('country_id') }}</div>
    @endif
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
    </p>
    {!! Form::select('city_id', [], ['class' => 'form-control'], ['id' =>'city_id']) !!}
    @if ($errors->has('city_id'))
        <div class="text-red">{{ $errors->first('city_id') }}</div>
    @endif
</div>

<!-- Category Field -->
<div class="form-group">
    <p>
        {{ Form::label('category', 'Category: ') }}
        {!! Form::select('category_id', $dto->getCategories(), $dto->getCompanyCategoryId(), ['id' => 'category_id']) !!}
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
        {{ $dto->getCompanyImagesLimit() }}
    </p>
</div>

<!-- Team's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('team_images_limit', 'Team\'s images limit: ') }}
        {{ $dto->getTeamImagesLimit() }}
        <div class="text-green">*Contact the administrator to change image limits</div>
    </p>
</div>

<!-- Logo Field -->
<div class="form-group company-logo-image" id="logo-container">
    <p>
        {{ Form::label('logo', 'Logo: ') }}
    </p>
    @if($dto->getCompanyLogo())
        {!!  ImageTag::get(CustomUrl::getFull(Storage::url($dto->getCompanyLogo())), ['id' => 'hasLogo']) !!}
        <button class="btn btn-danger delete-company-logo" type="button">Remove</button>
    @endif
    {{--<div id="company-logo-field">        --}}
        {{--{{ Form::label('logo', 'New Logo: ') }}--}}
        {{--{!! Form::file('logo', false, ['class' => 'form-control company-logo']) !!}--}}
    {{--</div>--}}
    @if ($errors->has('logo'))
        <div class="text-red">{{ $errors->first('logo') }}</div>
    @endif
</div>

<!-- Company image Field -->
<h3>Company images</h3>
<div>
    <p>
        {{ Form::label('company_image', 'Company image: ') }}
    </p>
    <ul class="company-images__list">
        @foreach($dto->getCompanyImages() as $image)
            <li class="company-images__item">
                {!!  ImageTag::get(CustomUrl::getFull(Storage::url($image->url)), ['id' => $image->id]) !!}
                <button class="btn btn-danger delete-company-image" type="button">Remove</button>
            </li>
        @endforeach
    </ul>
</div>

<!-- Add company image Field -->
<div id="company-images">
    <h3> Add new company images</h3>
    <div class="images-paren-div">
        <div id="company-image-field" class="increment company-image-field form-group image-field">
            <p>
                {{ Form::label('company_image', 'Company image: ') }}
            </p>
            {!! Form::file('company_image[]', false, ['class' => 'form-control company-image']) !!}
            <button class="btn btn-danger delete-company-image-field" action="Remove" type="button">Remove</button>
        </div>
    </div>
    <div class="input-group-btn">
        <button class="btn btn-success" type="button">Add new company image</button>
    </div>
</div>

@if ($errors->has('company_image'))
    <div class="text-red">You have exceeded the maximum count of company images</div>
@endif

@if ($errors->has('company_image.*'))
    <div class="text-red">The team image must be an image of types:jpeg, png</div>
@endif

<!-- Team image Field -->
<h3>Team images</h3>
<div>
    <p>
        {{ Form::label('company_team_image', 'Team image: ') }}
    </p>
    <ul class="company-images__list">
        @foreach($dto->getTeamImages() as $image)
            <li class="company-images__item">
                {!!  ImageTag::get(CustomUrl::getFull(Storage::url($image->url)), ['id' => $image->id]) !!}
                <button class="btn btn-danger delete-team-image" type="button">Remove</button>
            </li>
        @endforeach
    </ul>
</div>

<!-- Add Team image Field -->
<div id="company-team-images">
    <h3>Add team images</h3>
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

@if ($errors->has('company_team_image'))
    <div class="text-red">You have exceeded the maximum count of team images</div>
@endif

@if ($errors->has('company_team_image.*'))
    <div class="text-red">The team image must be an image of types:jpeg, png</div>
@endif

<!-- About us Field -->
<div class="form-group">
    <p>
        {{ Form::label('about_us', 'About us: ') }}
    </p>
    {!! Form::textarea('about_us', $dto->getAboutUs(), ['class' => 'form-control', 'maxlength' => 10000]) !!}
    @if ($errors->has('about_us'))
        <div class="text-red">{{ $errors->first('about_us') }}</div>
    @endif
</div>

<!-- Our services Field -->
<div class="form-group">
    <p>
        {{ Form::label('our_services', 'Our services: ') }}
    </p>
    {!! Form::textarea('our_services', $dto->getOurServices(), ['class' => 'form-control', 'maxlength' => 10000]) !!}
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
                    {!! Form::checkbox('work_days[' . $day['abbreviation'] . '][is_work]', true, $dto->isWorkDay($day['abbreviation']), ['id' => $day['abbreviation'], 'class' => 'custom-checkbox time-checkbox']) !!}
                    {{ Form::label($day['abbreviation']) }}
                </td>
                <td>
                    {!! Form::text('work_days[' . $day['abbreviation'] . '][from]', $dto->getStartTimeForDay($day['abbreviation']), ['id' => $day['abbreviation'] . '_from', 'class' => 'form-control time-field']) !!}
                </td>
                <td>
                    {!! Form::text('work_days[' . $day['abbreviation'] . '][to]', $dto->getEndTimeForDay($day['abbreviation']), ['id' => $day['abbreviation'] . '_to', 'class' => 'form-control time-field']) !!}
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

<!-- Latitude Field -->
<div class="form-group">
    <p>
        {{ Form::label('latitude', 'Latitude: ') }}
        {!! Form::text('latitude', $dto->getCompanyLatitude(), ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('latitude'))
        <div class="text-red">{{ $errors->first('latitude') }}</div>
    @endif
</div>

<!-- Longitude Field -->
<div class="form-group">
    <p>
        {{ Form::label('longitude', 'Longitude: ') }}
        {!! Form::text('longitude', $dto->getCompanyLongitude(), ['class' => 'form-control', 'maxlength' => 20]) !!}
    </p>
    @if ($errors->has('longitude'))
        <div class="text-red">{{ $errors->first('longitude') }}</div>
    @endif
</div>

<!-- Company images capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_company_capture', 'Company images capture: ') }}
        {!! Form::text('our_company_capture', $dto->getOurCompanyCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_company_capture'))
        <div class="text-red">{{ $errors->first('our_company_capture') }}</div>
    @endif
</div>

<!-- About us capture -->
<div class="form-group">
    <p>
        {{ Form::label('about_us_capture', 'About as capture: ') }}
        {!! Form::text('about_us_capture', $dto->getAboutAsCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_company_capture'))
        <div class="text-red">{{ $errors->first('about_us_capture') }}</div>
    @endif
</div>

<!-- Our services capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_services_capture', 'Our services capture: ') }}
        {!! Form::text('our_services_capture', $dto->getOurServicesCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_services_capture'))
        <div class="text-red">{{ $errors->first('our_services_capture') }}</div>
    @endif
</div>

<!-- Our team capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_team_capture', 'Team images capture: ') }}
        {!! Form::text('our_team_capture', $dto->getOurTeamCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
    </p>
    @if ($errors->has('our_team_capture'))
        <div class="text-red">{{ $errors->first('our_team_capture') }}</div>
    @endif
</div>

<!-- Booking an appointment capture -->
<div class="form-group">
    <p>
        {{ Form::label('booking_an_appointment_capture', 'Booking an appointment capture: ') }}
        {!! Form::text('booking_an_appointment_capture', $dto->getBookingAnAppointmentCapture(), ['class' => 'form-control', 'maxlength' => 25]) !!}
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

    $("body").on("click",".delete-company-image-field",function(){
        var parentChildrenCount = $(this).parent().parent().children().length;
        if (parentChildrenCount > 1) {
            $(this).parent().remove();
        }
    });

    $("body").on("click",".delete-company-image",function() {
        var button = $(this);
        var imageId = button.prev().attr('id');

        if (button.attr('action') === 'Restore') {
            var classForRemoving = 'btn-success';
            var classForAdding = 'btn-danger';
            var action = 'Remove';
            $('#delete-company-image-' + imageId).remove();
        } else {
            var classForRemoving = 'btn-danger';
            var classForAdding = 'btn-success';
            var action = 'Restore';
            var hiddenInput = $("<input>");
            hiddenInput.attr('type', 'hidden');
            hiddenInput.attr('name', 'delete_company_images[' + imageId + ']');
            hiddenInput.attr('id', 'delete-company-image-' + imageId);
            hiddenInput.val(imageId);
            $('#company-edit-form').append(hiddenInput);
        }
        button.removeClass(classForRemoving).addClass(classForAdding);
        button.text(action);
        button.attr('action', action);
    });

    var hasLogo = $('#hasLogo');
    if (!hasLogo) {
        toggleLogoField('expandLogoField')
    }

    function toggleLogoField(action) {
        if (action === 'expandLogoField') {
            let label = $("<label for=\"logo\">New Logo: </label>");
            let logoField = $("<input>");
            logoField.attr('type', 'file');
            logoField.attr('name', 'logo');
            logoField.attr('id', 'company-logo-field');
            $("#logo-container").append(label, logoField);

        } else {
            $("#company-logo-field").prev().remove();
            $("#company-logo-field").remove();
        }
    }

    $("body").on("click",".delete-company-logo",function() {
        var button = $(this);

        if (button.attr('action') === 'Restore') {
            var classForRemoving = 'btn-success';
            var classForAdding = 'btn-danger';
            var action = 'Remove';
            toggleLogoField('rollUp');
        } else {
            var classForRemoving = 'btn-danger';
            var classForAdding = 'btn-success';
            var action = 'Restore';
            toggleLogoField('expandLogoField');

        }
        button.removeClass(classForRemoving).addClass(classForAdding);
        button.text(action);
        button.attr('action', action);
    });

    $("body").on("click",".delete-team-image",function() {
        var button = $(this);
        var imageId = button.prev().attr('id');

        if (button.attr('action') === 'Restore') {
            var classForRemoving = 'btn-success';
            var classForAdding = 'btn-danger';
            var action = 'Remove';
            $('#delete-team-image-' + imageId).remove();
        } else {
            var classForRemoving = 'btn-danger';
            var classForAdding = 'btn-success';
            var action = 'Restore';
            var hiddenInput = $("<input>");
            hiddenInput.attr('type', 'hidden');
            hiddenInput.attr('name', 'delete_team_images[' + imageId + ']');
            hiddenInput.attr('id', 'delete-team-image-' + imageId);
            hiddenInput.val(imageId);
            $('#company-edit-form').append(hiddenInput);
        }
        button.removeClass(classForRemoving).addClass(classForAdding);
        button.text(action);
        button.attr('action', action);
    });

    var countrySelect = $('select[name=country_id]');
    var citySelect = $('select[name=city_id]');

    var categorySelect = $('select[name=category_id]');
    var specialitySelect = $('select[name=speciality_id]');
    var typeSelect = $('select[name=type_id]');

    @if( count($errors) > 0 && old('country_id'))
        if (countrySelect[0].value) {
            getDependsOptions(countrySelect[0].value, '/api/cities/', citySelect, {{ old('city_id') }})
        }
    @endif

    if (countrySelect[0].value) {
        getDependsOptions(countrySelect[0].value, '/api/cities/', citySelect, {{ $dto->getCompanyCityId() }})
    }

    countrySelect.change('change', function() {
        var selectValue = this.value;
        if(selectValue) {
            getDependsOptions(selectValue, '/api/cities/', citySelect);
        } else {
            cleanSelect(citySelect);
        }
    });

    if (categorySelect[0].value) {
        $.when(getDependsOptions(categorySelect[0].value, '/api/specialities/', specialitySelect, {{ $dto->getCompanySpecialityId() }}))
            .then(getDependsOptions({{ $dto->getCompanySpecialityId() }}, '/api/types/', typeSelect, {{ $dto->getCompanyTypeId() }}));
    }

    @if( count($errors) > 0 && old('category_id'))
        getDependsOptions(categorySelect[0].value, '/api/specialities/', specialitySelect, {{ old('speciality_id') }})
    @endif


    if (specialitySelect[0].value) {
        getDependsOptions(specialitySelect[0].value, '/api/specialities/', specialitySelect, {{ $dto->getCompanyTypeId() }})
    }

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

    function insertNewOption(select, key, val, selected = false) {
        if (selected) {
            var newOption = $('<option value="'+key+'">'+val+'</option>').attr('selected','selected');
        } else {
            var newOption = $('<option value="'+key+'">'+val+'</option>');
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
                "Content-Type": "json",
            },
            success: function (data, textStatus, xhr) {
                cleanSelect(dependSelect);
                $.each(data, function (key, value) {
                    insertNewOption(dependSelect, key, value, key == selectedKey);
                });
            },
            error: function (err) {
                cleanSelect(dependSelect);
            }
        })
    }

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

    var timeOptions = {
        'timeFormat' : 'H:i'
    };

    jQuery(function($){
        timePicker = $('.time-field').timepicker(timeOptions);
    });
</script>
