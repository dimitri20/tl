@extends('admin.layouts.index')


@section('content')


<div style="height: 100vh;">

</div>

<input type="hidden" id="api_token" name="api_token" value="{{ $api_token }}">

<script>


    let api_token = document.querySelector('#api_token').value
    document.cookie = "api_token="+api_token

</script>

@endsection
