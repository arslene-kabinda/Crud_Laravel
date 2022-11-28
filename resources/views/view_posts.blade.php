@extends('view_index')
@section('main')


 <main id="main" class="main">

<div class="pagetitle">
  <h1>Posts list</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Posts</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Posts</h5>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Users</th>
                <th scope="col">Action</th>
         
              </tr>
            </thead>
            <tbody>
            @foreach($posts as $ligne)

              <tr>
            
              <td>{{$ligne->id}}</td>
               <td>{{$ligne->title}}</td>
              <td>{{$ligne->description}}</td> 
              <td>{{$ligne->user->name}}</td> 
                <td>
                  <a class ="btn btn-primary" href="{{route('edit_post',$ligne->id)}}">edit</a>
                  <a class ="btn btn-danger btnDelete" data-id="{{$ligne->id}}" >delete</a>
              </td>  
              </tr>
              @endforeach
            </tbody>
          </table>
          <p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('view_post_register') }}" title="Créer un post" >Créer un nouveau post</a>
	</p>


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
        $('body').delegate('.btnDelete','click',function(){
          let ids=$(this).data('id')
                $.ajax({
                       url:"/delete_post/"+ids,
                       type:'GET',
                       async:true,
                    
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous supprimer");
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
            
        );
       
      
    })();
</script>
@endsection




































<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les posts</title>
</head>
<body>
    <h1>Tous les posts</h1>
    <table border="1">
    
			<tr>
            <th>id</th>
             <th>Title</th>
             <th>description</th>
             <th>user_id</th>
             <th>action</th>
			</tr>
            @foreach($posts as $ligne)

            <tr>
             <td>{{$ligne->id}}</td>
               <td>{{$ligne->title}}</td>
              <td>{{$ligne->description}}</td> 
              <td>{{$ligne->user->name}}</td> 
              <td>
               <a class ="btn btn-primary"  href="{{route('edit_post',$ligne->id)}}">edit</a>
              <a class ="btn btn-primary" href="{{route('delete_post',$ligne->id)}}">delete</a>
            </td>  
               </tr>
               @endforeach
   
		
    </table>
    <p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('view_post_register') }}" title="Créer un post" >Créer un nouveau post</a>
	</p>

</body>
</html> -->