
@extends('view_index')
@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Modifier l'utilisateur</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Edit Users</a></li>
      <li class="breadcrumb-item">Edit</li>
      <li class="breadcrumb-item active">User</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">General Form Elements</h5>

          <!-- General Form Elements -->
          <form action="#" method="POST" name="form_edit">
            @csrf
          <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required   value='{{$user->name}}'>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"> Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required value='{{$user->email}}'>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required value='{{$user->password}}'>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div> <br>
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
            let name=$("#yourName").val();
            let email=$("#yourEmail").val();
  
            if(name!="" && email!=""){
                $.ajax({
                       url:"{{route('update',$user->id)}}",
                       type:'POST',
                       async:true,
                       data:{name:$('#yourName').val(),
                        email:$("#yourEmail").val(),
                        
                    },
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous modifier cet utilisateur?");
                            $("#name").val("");
                            $("#email").val("");
                          
                            window.location.href="{{route('list')}}"
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









