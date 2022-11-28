
@extends('view_index')
@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Post</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Edit Post</a></li>
      <li class="breadcrumb-item">Edit Post</li>
      <li class="breadcrumb-item active">Edit Post</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">General Form Elements</h5>

          <!-- General Form Elements -->
          <form action ="#" method="POST" name="form_post">
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name='title' id="title" required value='{{$post->title}}'>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
              <textarea class="form-control" style="height: 100px" name ="description" id="description" required value='{{$post->description}}'></textarea>
              </div>
            </div>   <br>

            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="button" class="btn btn-primary" id="btnEdit">Modifier</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>

    
  </div>
</section>

</main>
@endsection

@section ('script')
<script type="text/javascript">
    (function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#btnEdit').click(function(){
            let title=$("#title").val();
            let description=$("#description").val();
            if(title!="" && description!=""){
                $.ajax({
                       url:"{{route('updates',$post->id)}}",
                       type:'POST',
                       async:true,
                       data:{title:$('#title').val(),
                        description:$("#description").val(),
                    },
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous modifier ce post ?");
                            $("#title").val("");
                            $("#description").val("");
                            window.location.href="{{route('view_posts')}}"
                        }
                    },
                    error:function(response){
                        if(response.status==500){
                            console.log("error")
                        }
                    }
                });
            }
            
        });
       
      
    })();
</script>
@endsection






































                                                                                                                                