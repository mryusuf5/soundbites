<x-layouts.layout>
    <div class="container my-4">
        <form action="" method="post">
            <h3>Voeg nieuwe categorie toe</h3>
            @csrf
            @method('POST')
            <div class="form-floating">
                <input type="text" name="name" placeholder="Categorie naam" class="form-control">
                <label for="">Categorie naam</label>
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </form>
    </div>
</x-layouts.layout>
