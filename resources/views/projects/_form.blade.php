@csrf 
<div class="form-group">
<div class="mb-3">
  <label for="formFile" class="form-label">file input </label>
  <input class="form-control" type="file" id="formFile" name="image">
</div>
</div>
<div class="form-group">
  <input type="text" class="form-control" name="title" placeholder="titulo..." value="{{ old('title', $project->title) }}">
</div>
<div class="form-group">
  <input type="text" class="form-control" name="url" placeholder="url..." value="{{ old('url', $project->url) }}">
</div>
<div class="form-group">
  <input type="text" class="form-control" name="description" placeholder="descripcion..." value="{{ old('description', $project->description) }}">
</div>
<button class="btn btn-primary btn-block">{{$btn}}</button>