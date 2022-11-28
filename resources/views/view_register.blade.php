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
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">General Form Elements</h5>

          <!-- General Form Elements -->
          <form action ="#" method="POST" name="form_register">
            @csrf
          <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"> Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div> <br>
            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" id="btncreate">create</button>
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
            let name=$("#yourName").val();
            let email=$("#yourEmail").val();
            let password=$("#yourPassword").val();
            if(name!="" && email!="" && password!=""){
                $.ajax({
                       url:"{{route('stores')}}",
                       type:'POST',
                       async:true,
                       data:{name:$('#yourName').val(),
                        email:$("#yourEmail").val(),
                        password:$("#yourPassword").val(),
                    },
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous créer ce user ?");
                            $("#yourName").val("");
                            $("#yourEmail").val("");
                            $("#yourPassWord").val("");
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








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{route('store')}}" method="POST" name="form_register">
        @csrf
        <label for="login">Name</label>
        <input type="text" name="name" placeholder="name" require/><br><br>
        <label for="login">Email</label>
        <input type="text" name="email" placeholder="Email" require/><br><br>
        <label for="login">Password</label>
        <input type="password" name="password" placeholder="password" require/><br><br>
        <button type="submit" name="create">Create</button>

    </form>
</body>
</html>                                                                                                                                   0 -->