@extends('view_index')
@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Register</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Register</a></li>
      <li class="breadcrumb-item">Register</li>
      <li class="breadcrumb-item active">Register</li>
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
          <form action ="#" method="POST">
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name='title' id="title">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
              <textarea class="form-control" style="height: 100px" name ="description" id="description"></textarea>
              </div>
            </div>   <br>

            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="button" class="btn btn-primary" id="btncreate">create</button>
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
        $('#btncreate').click(function(){
            let title=$("#title").val();
            let description=$("#description").val();
            if(title!="" && description!=""){
                $.ajax({
                       url:"{{route('store')}}",
                       type:'POST',
                       async:true,
                       data:{title:$('#title').val(),
                        description:$("#description").val(),
                    },
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous créer ce post ?");
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

























<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <form method="POST" action="{{ route('store') }}" name="post_register">
    @csrf
        <h1>Post</h1>
        <label for="title">Titre</label>
        <input type="text" name="title" placeholder="title" require/><br><br>
        <label for="description">description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
        <button type="submit" name="create">créer</button>
    </form>
</body>
</html> -->