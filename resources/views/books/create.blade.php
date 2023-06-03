@extends('layouts.app')
@section('title', $template->title)
@section('content')
<div class="pc-container">
    <div class="pcoded-content">
        <x-breadcrumb :title="$template->title" :links="$template->breadcrumb" />
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route($template->option['route'] . (isset($data) ? '.update': '.store'), [isset($data) ? $data->id: '']) }}">
                    @csrf
                    @if(isset($data))
                        @method('PUT')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5>@if(isset($data)) Edit @else Create @endif</h5>
                            <span class="d-block m-t-5">Please ensure all fields are filled</span>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($data) ? $data->title : old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author">Author</label>
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ isset($data) ? $data->author : old('author') }}" required autocomplete="author">
                                @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="year_published">Year Published</label>
                                <input id="year_published" type="date" class="form-control @error('year_published') is-invalid @enderror" name="year_published" value="{{ isset($data) ? $data->year_published : old('year_published') }}" required autocomplete="year_published">
                                @error('year_published')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="issuer">Issuer</label>
                                <input id="issuer" type="text" class="form-control @error('issuer') is-invalid @enderror" name="issuer" value="{{ isset($data) ? $data->issuer : old('issuer') }}" required autocomplete="issuer">
                                @error('issuer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="page_number">Page Number</label>
                                <input id="page_number" type="number" class="form-control @error('page_number') is-invalid @enderror" name="page_number" value="{{ isset($data) ? $data->page_number : old('page_number') }}" required autocomplete="page_number">
                                @error('page_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category_id">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(isset($data) && $data->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection