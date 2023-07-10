@extends('layouts.master')
@section('main')

	<div class="modal-dialog">
<div class="modal-content">
    <form action="{{ route('articles.update', $article->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
       
       <div class="modal-header">
          <h4 class="modal-title">Ajouter Article</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
       
                    <div class="modal-body">	
       
        	<div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title"  value="{{ $article->title }}">
        </div>
       
        	<div class="form-group">
            <label for="content">Contenu :</label>
            <textarea name="content" id="content" cols="30" rows="10" >{{ $article->content }}</textarea>
        </div>
       
        	<div class="form-group">
        <label for="user_id">Utilisateur :</label>
  <select name="user_id">
        @foreach ($users as $userId => $userName)
            <option value="{{ $userId }}" {{ $userId == $article->user_id ? 'selected' : '' }}>
                {{ $userName }}
            </option>
        @endforeach
        </select>
        </div>
       
        <div>
        	<a href="/articles"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
        <input type="submit" class="btn btn-info" value="Modifier">
       </div>
        
       
       
        </div>
    </form>
      </div>
</div>

@endsection