@extends('site.layouts.basico')

{{-- @section('titulo', $titulo) --}}

<form action={{ route('site.sorteio') }} method="get">
    <h1>
        RA Premiado: {{ $premiado }}
        <button type="submit">Sortear</button>
    <h1>
</form>
<br>
