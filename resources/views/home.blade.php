@extends('layouts.app')
<script>
    window.store = {!! json_encode($store) !!};
</script>
@section('content')
@endsection
