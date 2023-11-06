@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('tache.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titre</label>
                <input type="text" class="form-control" required name="title" id="exampleFormControlInput1"
                    placeholder="titre de la tâche">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date d'echeance</label>
                <input type="datetime-local" required name="echeance" id="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">statut de la tâche</label>
                <select name="status" id="">
                    <option value="0">en cour</option>
                    <option value="1">terminé</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('tache.index') }}"><button type="button"
                        class="btn btn-secondary btn-md mx-3">Retour</button></a>
                <button type="submit" class="btn btn-success btn-sm me-5 ">Enregister</button>
            </div>
        </form>
    </div>
@endsection
