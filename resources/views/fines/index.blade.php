@extends('layouts.app')
@section('title', $template->title)
@section('content')
	<x-management :template="$template" :create="false" />
@endsection