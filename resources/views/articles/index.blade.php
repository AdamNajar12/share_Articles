@extends('layouts.master')

@section('main')
 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>liste <b>Articles</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="/articles/create" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter Articles</span></a>
						
                    </div>
                </div>
            </div>

  <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th> Auteur   </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{$article->user_name}}</td>
                    <td>
                       
                        <a href="{{ route('articles.edit', $article->id) }}"class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) document.getElementById('delete-form-{{ $article->id }}').submit();" class="delete" data-toggle="modal">
    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
</a>

<form id="delete-form-{{ $article->id }}" action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                    </td>
                </tr>
               
            @endforeach
            
        </tbody>
        
    </table>
     <a href="{{ route('articles.create') }}">Créer un nouvel article</a>
    
@endsection
