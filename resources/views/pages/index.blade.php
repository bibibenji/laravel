@extends ('pages/default')

@section ('content')

<script type="text/javascript">
$( document ).ready(function() {

    $(".myBtn").click(function () {
       var id = this.id;
       var modal = $(".myModal#modal_" + id);
       modal.css("display", "block");
    });
       
    $(".close").click(function () {
       var id = this.id;
       var modal = $(".myModal#modal_" + id);
        modal.css("display", "none");
    });
     $(".close_del").click(function () {
       var id = this.id;
       var modal = $(".myModal#modal_" + id);
        modal.css("display", "none");
    });

   $(".btn_del").click(function () {
       var id = this.id;
       var modal = $(".myModal#modal_del_" + id);
       modal.css("display", "block");
    });
});
</script>
<script type="text/javascript">
    $( document ).ready(function() {
        $(".cadre_post").mouseover(function () {
            var id = this.id;
            $(".cadre_post#" + id).addClass("active");
        });
         $(".cadre_post").mouseout(function () {
            var id = this.id;
            $(".cadre_post#" + id).removeClass("active");
        });
    });
</script>
<h1>Les destinations</h1>
    <p>
        <!-- Trigger/Open The Modal -->
        <button class="myBtn btn btn-success" id="add">
        <span>Ajouter une destination</span>
        </button>
        <br>
        <!-- The Modal -->
        <div class="myModal" id="modal_add"><!-- class="modal" -->
        
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close" id="add">&times;</span>
            <p>
            <center><h3>Ajout d'une destination</h3></center>
                <br>
                <form action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" name="title" id="title" placeholder="Titre" class="form-control">
                        <input type="text" name="content" id="content" placeholder="Description" class="form-control">
                         <br><label for="img">Lien de l'image</label>
                         <input type="text" name="img_url" id="img_url" placeholder="http://..." class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary right">Ajouter</button>
                    </div>
                </form>
            </p>
          </div>
        
        </div>
    </p>
        
    @foreach($posts as $post)
        <div id="{{ $post->id }}" class="cadre_post">
            <div id="{{ $post->id }}" class="cadre_post_img">
                <img src="{{ $post->img_url }}" />
                <div class="overlay">
                    <h1 id="{{ $post->id }}" class="post_title">{{ $post->title }}</h1>
                </div>
            </div>
            <p class="post_desc">
            {{ $post->content }}
            <br/>
            <button class="btn btn-danger btn_del" id="{{ $post->id }}"><img src="https://www.shareicon.net/data/2016/09/01/822390_delete_512x512.png" /></button>
            <button class="myBtn btn btn-primary btn_edit" id="{{ $post->id }}"><img src="https://icon-icons.com/icons2/569/PNG/512/edit-document_icon-icons.com_54542.png" /></button>
            </p>
        </div>
        <div class="myModal" id="modal_{{ $post->id }}" style="display: none;">
          <div class="modal-content">
            <span class="close" id="{{ $post->id }}">&times;</span>
            <p>
            <center><h3>Modification de la destination {{ $post->title }}</h3></center>
                <br>
                <form action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
                        <input type="text" name="content" id="content" value="{{ $post->content }}" class="form-control">
                         <br><label for="img">Lien de l'image</label>
                         <input type="text" name="img_url" id="img_url" value="{{ $post->img_url }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary right">Modifier</button>
                    </div>
                </form>
            </p>
          </div>
        </div>
        <div class="myModal" id="modal_del_{{ $post->id }}" style="display: none;">
          <div class="modal-content">
            <span class="close" id="del_{{ $post->id }}">&times;</span>
            <p>
                <center><h3>Voullez-vous vraiment supprimer la destination {{ $post->title }} ?</h3></center>
                <br>
                <form action="delete/{{ $post->id }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="myBtn btn btn-danger right close_del" id="del_{{ $post->id }}">Non</button>
                    <button class="myBtn btn btn-success right">Oui</button>
                </form>
                
            </p>
          </div>
        </div>
    @endforeach

@endsection