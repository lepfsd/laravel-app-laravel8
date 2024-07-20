@csrf 
<div class="form-group">
  <div class="mb-3">
    <label for="formFile" class="form-label">file input </label>
    <input class="form-control" type="file" id="formFile" name="image">
  </div>
</div>
<div class="form-group">
<label for="category_id">categoria </label>
  <select name="category_id" id="category_id" class="form-control shadow-sm">
    <option value="">Seleccione</option>
    @foreach($categories as $id => $name)
      <option 
        value="{{ $id }}" 
        @if($id == $project->category_id) selected @endif 
          >{{ $name }}
      </option>
    @endforeach
  </select>
</div>
<div class="form-group">
<label for="title">titulo </label>
  <input type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}">
</div>
<div class="form-group">
<label for="title">url </label>
  <input type="text" class="form-control" name="url" value="{{ old('url', $project->url) }}">
</div>
<div class="form-group">
<label for="title">descripcion </label>
  <input type="text" class="form-control" name="description" value="{{ old('description', $project->description) }}">
</div>
<button class="btn btn-primary btn-block">{{$btn}}</button>