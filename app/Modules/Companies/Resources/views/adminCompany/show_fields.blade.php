<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {{ $company->name }}
    </p>
</div>

<!-- Email Field -->
<div class="form-group">
    <p>
        {{ Form::label('email', 'Email: ') }}
        {{ $company->companyOwner->email }}
    </p>
</div>

@foreach($company->phones as $phone)
    <!-- Phone Field -->
    <div class="form-group">
        <p>
            {{ Form::label('phone', 'Phone: ') }}
            {{ $phone }}
        </p>
    </div>
@endforeach

<!-- Website Field -->
<div class="form-group">
    <p>
        {{ Form::label('website', 'Website: ') }}
        {{ $company->website }}
    </p>
</div>

<!-- Status Field -->
<div class="form-group">
    <p>
        {{ Form::label('status', 'Company status: ') }}
        {{ $company->status }}
    </p>
</div>

@isset($company->date_change_status)
<!-- Change status date Field -->
<div class="form-group">
    <p>
        {{ Form::label('date_change_status', 'Date for change status: ') }}
        {{ $company->date_change_status }}
    </p>
</div>
@endisset

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
        {{ $company->country->name }}
    </p>
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
        {{ $company->city->name }}
    </p>
</div>

<!-- Category Field -->
<div class="form-group">
    <p>
        {{ Form::label('category', 'Category: ') }}
        {{ $company->category->name }}
    </p>
</div>

<!-- Speciality Field -->
<div class="form-group">
    <p>
        {{ Form::label('speciality', 'Speciality: ') }}
        {{ $company->speciality->name }}
    </p>
</div>

<!-- Type Field -->
<div class="form-group">
    <p>
        {{ Form::label('type', 'Type: ') }}
        {{ $company->type->name }}
    </p>
</div>

<!-- Company's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('company_images_limit', 'Company\'s images limit: ') }}
        {{ $company->company_images_limit }}
    </p>
</div>

<!-- Team's images limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('team_images_limit', 'Team\'s images limit: ') }}
        {{ $company->team_images_limit }}
    </p>
</div>

<!-- Logo Field -->
<div class="form-group company-logo-image">
    <p>
        {{ Form::label('logo', 'Logo: ') }}
    </p>
        {!!  ImageTag::get(CustomUrl::getFull(Storage::url($company->logo)), ['class' => 'company-logo-image']) !!}
</div>

<!-- Company image Field -->
<h3>Company images</h3>
<div>
    <p>
        {{ Form::label('company_image', 'Company image: ') }}
    </p>
    <ul class="company-images__list">
        @foreach($company->company_images as $image)
            <li class="company-images__item">
                {!!  ImageTag::get(CustomUrl::getFull(Storage::url($image->url))) !!}
            </li>
        @endforeach
    </ul>
</div>

<!-- Company Team image Field -->
<h3>Team images</h3>
<div>
    <p>
        {{ Form::label('company_team_image', 'Team image: ') }}
    </p>
    <ul class="company-images__list">
        @foreach($company->team_images as $image)
            <li class="company-images__item">
                {!!  ImageTag::get(CustomUrl::getFull(Storage::url($image->url))) !!}
            </li>
        @endforeach
    </ul>
</div>

<!-- About us Field -->
<div class="form-group">
    <p>
        {{ Form::label('about_us', 'About us: ') }}
    </p>
    {{ $company->about_us }}
</div>

<!-- Our services Field -->
<div class="form-group">
    <p>
        {{ Form::label('our_services', 'Our services: ') }}
    </p>
    {{ $company->our_services }}
</div>

<!-- Working days Fields -->
<div class="form-group">
    <p>
        {{ Form::label('schedule', 'Schedule: ') }}
    </p>
    <div width="100px">
        {!! Schedule::build($company->work_days, ['class' => 'schedule-table']) !!}
    </div>
</div>

<!-- Latitude Field -->
<div class="form-group">
    <p>
        {{ Form::label('latitude', 'Latitude: ') }}
        {{ $company->latitude }}
    </p>
</div>

<!-- Longitude Field -->
<div class="form-group">
    <p>
        {{ Form::label('longitude', 'Longitude: ') }}
        {{ $company->longitude }}
    </p>
</div>

<!-- Company images capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_company_capture', 'Company images capture: ') }}
        {{ $company->our_company_capture }}
    </p>
</div>

<!-- About us capture -->
<div class="form-group">
    <p>
        {{ Form::label('about_us_capture', 'About as capture: ') }}
        {{ $company->about_us_capture }}
    </p>
</div>

<!-- Our services capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_services_capture', 'Our services capture: ') }}
        {{ $company->our_services_capture }}
    </p>
</div>

<!-- Our team capture -->
<div class="form-group">
    <p>
        {{ Form::label('our_team_capture', 'Team images capture: ') }}
        {{ $company->our_team_capture }}
    </p>
</div>

<!-- Booking an appointment capture -->
<div class="form-group">
    <p>
        {{ Form::label('booking_an_appointment_capture', 'Booking an appointment capture: ') }}
        {{ $company->booking_an_appointment_capture }}
    </p>
</div>
