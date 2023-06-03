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
                            <div class="form-group col-6 auto">
                                <label for="book_id">Book</label>
                                <input type="hidden" name="book_id" value="{{ isset($data) ? $data->book->id : old('book_id') }}" required>
                                <input
                                    class="form-control"
                                    name="book_title"
                                    id="books_id"
                                    spellcheck=false
                                    autocorrect="off"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    type="text"
                                    value="{{ isset($data) ? $data->book->title : old('book_title') }}"
                                    required
                                >
                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6 auto">
                                <label for="user_id">User</label>
                                <input type="hidden" name="user_id" value="{{ isset($data) ? $data->user->id : old('user_id') }}" required>
                                <input
                                    class="form-control"
                                    name="user_name"
                                    id="users_id"
                                    spellcheck=false
                                    autocorrect="off"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    type="text"
                                    value="{{ isset($data) ? $data->user->name : old('user_name') }}"
                                    required
                                >
                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="borrow_date">Borrow Date</label>
                                <input id="borrow_date" type="datetime-local" class="form-control @error('borrow_date') is-invalid @enderror" name="borrow_date" value="{{ isset($data) ? date('Y-m-d\TH:i', strtotime($data->borrow_date)) : old('borrow_date') }}" required>
                                @error('borrow_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="return_date">Return Date</label>
                                <input id="return_date" type="datetime-local" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{ isset($data) ? date('Y-m-d\TH:i', strtotime($data->return_date)) : old('return_date') }}">
                                @error('return_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                    <option value="borrowed" @if(isset($data) && $data->status == 'borrowed') selected @endif>Borrowed</option>
                                    <option value="returned" @if(isset($data) && $data->status == 'returned') selected @endif>Returned</option>
                                </select>
                                @error('status')
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

@section('script')