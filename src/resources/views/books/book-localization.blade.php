@extends('layouts.app')

@section('content')

<p>
    {{ $bookLocalization->name . '. ' . $bookLocalization->author }}
</p>
<div>
    {{ $bookLocalization->description }}
</div>

@endsection