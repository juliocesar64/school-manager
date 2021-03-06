@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4>Usuário <b>{{ $user->name }}</b></h4>
                        </div>
                        @if (auth()->user()->role->isAdmin())
                          <div class="col-4">
                              @can ('view', $user)
                                  <a href="{{ route('profile.index') }}" class="btn btn-info btn-sm">
                                      <i class="fa fa-fw fa-list"></i>
                                      Listar usuários
                                  </a>
                              @endcan
                              <a href="{{ route('profile.create') }}" class="btn btn-success btn-sm">
                                  <i class="fa fa-fw fa-plus"></i>
                                  Adicionar usuário
                              </a
                          </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-5" style="margin-right: -30px;">Nome:</label>
                                        <div class="col-7">
                                            <p class="form-control-static">
                                                <b>{{ $user->name }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-4" style="margin-right: -30px;">E-mail:</label>
                                        <div class="col-8">
                                            <p class="form-control-static">
                                                <b>{{ $user->email }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-4" style="margin-right: -30px;">Grupo:</label>
                                        <div class="col-8">
                                            <p class="form-control-static">
                                                <b>{{ $user->role->name }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @can('update', $user)
                            <div class="form-actions">
                                <div class="col-12">
                                    <div class="float-right">
                                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-warning">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Editar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    @include('partials.messagers_sweetalert')
@endpush
