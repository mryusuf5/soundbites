<x-layouts.layout>
    <div class="container my-4">
        <form action="">
            <select name="categorie" id="select" class="form-control my-4" onchange="this.form.submit()">
                <option value="">Selecteer een categorie</option>
                @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
        </form>
        <input type="text" class="form-control mb-4" placeholder="Zoeken..." oninput="search(this)">
        <div class="row gap-2 justify-content-center">
            @foreach($sounds as $sound)
                <div class="col-lg-2 col-sm-4 col-10 border-primary p-2 soundName" style="border: 1px solid">
                    <p class="text-center text-break">{{Str::limit($sound->name, 25)}}</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <span data-sound="{{asset('sounds/' . $sound->file_name)}}" onclick="playSound(this)"
                        style="border: 1px solid; height: 50px; width: 50px;" class="
                        border-white rounded-circle p-2 d-flex align-items-center justify-content-center playButton">
                            <i class="fa-solid fa-play fs-4"></i>
                        </span>
                    </div>
                    <a href="{{route('deleteSound', 'sound=' . $sound->id)}}" class="text-danger" onclick="
                    if(confirm('Weet je zeker dat je dit wilt verwijderen?')){return true;} else{return false;}
                    "><i class="fa-solid fa-trash"></i></a>
                </div>
            @endforeach
        </div>
    </div>
    <audio id="audioPlayer" class="d-none">
        <source id="source" src=""/>
    </audio>

    <script>
        const player = document.querySelector('#audioPlayer');
        const source = document.querySelector('#source');
        let files = document.querySelectorAll('.soundName');

        const playSound = (e) => {
            source.src = e.dataset.sound;
            player.load();
            player.play();
        }

        const search = (e) => {
            const search = e.value;

            for(i = 0; i < files.length; i++)
            {
                if(!files[i].innerHTML.includes(search))
                {
                    files[i].style.display = 'none';
                }
                else
                {
                    files[i].style.display = 'block';
                }
            }
        }


    </script>
</x-layouts.layout>
