<!-- AdType Field -->
<div class="form-group">
    <p>
        {{ Form::label('type', 'Adblock type: ') }}
    </p>
    {!! Form::select('type', $types, ['class' => 'form-control'], ['placeholder' => 'Select type']) !!}
    @if ($errors->has('type'))
        <div class="text-red">{{ $errors->first('type') }}</div>
    @endif
</div>

<!-- AdPosition Field -->
<div class="form-group">
    <p>
        {{ Form::label('position', 'Adblock position: ') }}
    </p>
    {!! Form::select('position',[], ['class' => 'form-control'], ['placeholder' => 'Select position']) !!}
    @if ($errors->has('position'))
        <div class="text-red">{{ $errors->first('position') }}</div>
    @endif
</div>

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
    </p>
    {!! Form::select('country_id', $countries, ['class' => 'form-control'], ['placeholder' => 'All countries']) !!}
    @if ($errors->has('country_id'))
        <div class="text-red">{{ $errors->first('country_id') }}</div>
    @endif
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
    </p>
    {!! Form::select('city_id', [], ['class' => 'form-control'], ['placeholder' => 'All cities']) !!}
    @if ($errors->has('city_id'))
        <div class="text-red">{{ $errors->first('city_id') }}</div>
    @endif
</div>

<!-- Image Field -->
<div class="form-group">
    <p>
        {{ Form::label('image', 'Image: ') }}
    </p>
    {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
    @if ($errors->has('image'))
        <div class="text-red">{{ $errors->first('image') }}</div>
    @endif
</div>

<!-- URL Field -->
<div class="form-group">
    <p>
        {{ Form::label('url', 'Url: ') }}
    </p>
    {!! Form::text('url', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($errors->has('url'))
        <div class="text-red">{{ $errors->first('url') }}</div>
    @endif
</div>

<!-- Appear Start Field -->
<div class="form-group">
    <p>
        {{ Form::label('appear_start', 'Appear start date: ') }}
        {!! Form::text('appear_start', null, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('appear_start'))
        <div class="text-red">{{ $errors->first('appear_start') }}</div>
    @endif
</div>

<!-- Days to show Field -->
<div class="form-group">
    <p>
        {{ Form::label('appear_finish', 'Days to show: ') }}
        {!! Form::text('appear_finish', null, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('appear_finish'))
        <div class="text-red">{{ $errors->first('appear_finish') }}</div>
    @endif
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
    </p>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    $( document ).ready(function() {
        let typeSelect = $('select[name=type]');
        let positionSelect = $('select[name=position]');

        var countrySelect = $('select[name=country_id]');
        var citySelect = $('select[name=city_id]');

        @if( count($errors) > 0 && old('type'))
            getDependsOptions({'type' : typeSelect[0].value}, '/api/positions', positionSelect, "{{ old('position') }}")
        @endif

        typeSelect.change('change', function() {
            var selectValue = this.value;
            if(selectValue) {
                getDependsOptions({'type' : selectValue}, '/api/positions', positionSelect);
            } else {
                cleanSelect(positionSelect);
            }
        });

        @if( count($errors) > 0 && old('country_id'))
            if (countrySelect[0].value) {
                getDependsOptions({'country' : countrySelect[0].value}, '/api/cities', citySelect, "{{ old('city_id') }}")
            }
        @endif

        countrySelect.change('change', function() {
            var selectValue = this.value;
            if(selectValue) {
                getDependsOptions({'country' : selectValue}, '/api/cities', citySelect);
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

        function getDependsOptions(query, url, dependSelect, selectedKey) {
            var params = $.param(query);
            $.ajax({
                url: url + '?' + params,
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
    });
</script>