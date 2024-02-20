@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('User Settings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="access" class="col-md-4 col-form-label text-md-right">{{ __('Your Access Level') }}</label>
                            <div class="col-md-6">
                                <select id="access" class="form-control @error('access') is-invalid @enderror" name="access" required autocomplete="access">
                                    <option value="admin" @if(Auth::user()->access == 'admin') selected @endif>Admin</option>
                                    <option value="regular" @if(Auth::user()->access == 'regular') selected @endif>Regular</option>
                                </select>

                                @error('access')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="user_access" class="col-md-4 col-form-label text-md-right">{{ __('Set User Access') }}</label>
                            <div class="col-md-6">
                                <select id="user_access" class="form-control  @error('user_access') is-invalid @enderror" name="user_access" required autocomplete="user_access">
                                    <option value="admin">Admin</option>
                                    <option value="regular">Regular</option>
                                </select>

                                @error('user_access')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Adicionando um campo de seleção para escolher o usuário alvo -->
                        <div class="form-group row">
                            <label for="selected_user_id" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>
                            <div class="col-md-6">
                                <select id="selected_user_id" class="form-control @error('selected_user_id') is-invalid @enderror" name="selected_user_id" required>
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @error('selected_user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
