<x-layouts.layout>
    <div class="container my-4">
        <form action="" method="post" class="d-flex flex-column gap-3" enctype="multipart/form-data">
            <h3>Voeg nieuwe geluiden toe</h3>
            @csrf
            @method('POST')
            <div class="form-group">
                <select name="categorie" id="" class="form-control">
                    <option value="">Selecteer categorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Selecteer bestand(en)</label>
                <input type="file" name="files[]" multiple class="form-control">
                <small class="text-muted">Max 20 bestanden</small>
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </form>
    </div>
</x-layouts.layout>
