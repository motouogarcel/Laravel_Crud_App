@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}


    <div class="container">
        <p>
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <a class="btn btn-primary" href="{{ route('tache.create') }}" role="button">Créer une Nouvelle Tache</a>
        </p>
        <div class="row text-center">
            <h1>Tableau des Taches</h1>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date d'echeance</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>

                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tache as $key => $tach)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $tach->echeance }}</td>
                        <td>{{ $tach->title }}</td>
                        <td>{{ $tach->description }}</td>

                        <td class="text-center">
                            @if ($tach->status == 1)
                                <span class="badge text-bg-success">terminé</span>
                            @else
                                <span class="badge text-bg-warning">en cour</span>
                            @endif
                        </td>
                        <td class="text-end">
                            {{-- <a class="btn btn-primary" href="{{ route('tache.show', $tach->id) }}" role="button">Show</a> --}}
                            <div class="row ">
                                <div class="col-sm-3 me-n5">
                                    <a class="btn btn-warning btn-sm" href="{{ route('tache.edit', $tach->id) }}"
                                        role="button">Edit</a>
                                </div>
                                <div class="col-sm-3 me-n5">
                                    <form action="{{ route('tache.destroy', $tach->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this task?')">
                                            <span class="fa fa-trash"></span>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
