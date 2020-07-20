@csrf

@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome: </label>
    <input type="text" name="name" class="form-control" placeholder="Nome: " value="{{ $permission->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Descrição: </label>
    <input type="text" name="description" class="form-control" placeholder="Descricão: " value="{{ $permission->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>