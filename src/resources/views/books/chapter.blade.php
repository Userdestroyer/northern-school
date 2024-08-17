@extends('layouts.app')

@section('content')

<p>
    {{ $chapter->number . '. ' . $chapter->title }}
</p>
<div>
    {{ $chapter->content }}
</div>

@endsection