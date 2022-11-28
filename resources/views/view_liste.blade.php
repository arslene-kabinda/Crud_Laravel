@extends('view_index')
@section('main')


 <main id="main" class="main">

<div class="pagetitle">
  <h1>Listes des utilisateurs</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">list</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users</h5>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
         
              </tr>
            </thead>
            <tbody>
            @foreach($users as $ligne)

              <tr>
            
                <td>{{$ligne->id}}</td>
                <td id=>{{$ligne->name}}</td>
                <td id=>{{$ligne->email}}</td>
                <td>
                  <a class ="btn btn-primary" href="{{route('edit',$ligne->id)}}">edit</a>
                  <a class ="btn btn-danger btnDelete" data-id="{{$ligne->id}}" type="button">delete</a>
              </td>  
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->


          <!-- Primary Color Bordered Table -->
         
          <!-- End small tables -->

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
          let ids=$(this).data('id');
                $.ajax({
                       url:"/delete/"+ids,
                       type:'GET',
                       async:true,
                      
                    success:function(response){
                        if(response.success==200){
                            alert("Voulez-vous supprimer ?");
                           
                            window.location.href="{{route('list')}}"
                        }
                    },
                    error:function(response){
                        if(response.status==500){
                            console.log("error")
                        }
                    }
                });
            
        });
       
      
    })();
</script>
@endsection















                                                                                                                                