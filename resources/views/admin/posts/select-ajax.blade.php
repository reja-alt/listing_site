<option disabled selected>--- Select One ---</option>
@if(!empty($get_data))
    @foreach($get_data as $key => $value)
    @if(!empty($select))
        <option {{$select}} value="{{ $value->id }}">{{ $value->name}}</option>
    @else
        <option value="{{ $value->id }}">{{ $value->name }}
    @endif
    @endforeach
@endif