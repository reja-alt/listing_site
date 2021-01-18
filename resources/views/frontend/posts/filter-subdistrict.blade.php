<option disabled selected>--- Select One ---</option>
@if(!empty($get_data))
    @foreach($get_data as $key => $value)
    @if(!empty($select))
        <option {{$select}} value="{{ $value->id }}">{{ $value->subdis_name}}</option>
    @else
        <option value="{{ $value->id }}">{{ $value->subdis_name }}
    @endif
    @endforeach
@endif