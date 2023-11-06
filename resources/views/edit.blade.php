@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('tache.update', $tache->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titre</label>
                <input type="text" class="form-control" value="{{ $tache->title }}" name="title"
                    id="exampleFormControlInput1" placeholder="titre de la tâche" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" data-value="{{ $tache->description }}"
                    id="exampleFormControlTextarea1" required rows="3">{{ $tache->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date d'echeance</label>
                <input type="datetime-local" required value="{{ $tache->echeance }}" name="echeance" id="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">statut de la tâche</label>
                <select name="status" id="">
                    <option value="0" @if($tache->status == 0) selected @endif>en cour</option>
                    <option value="1"  @if($tache->status == 1) selected @endif>terminé</option>
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
