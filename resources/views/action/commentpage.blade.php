@extends('main')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="container mb-5 mt-5">		  
  <div class="card_comment">
   <div class="row">
     <div class="col-md-12">
       <h3 class="text-center mb-5">
         Nested comment section
       </h3>
       <div class="mb-5">
        <form id="algin-form" method="POST" action="{{url('comment_submit')}}">
        @csrf
            <div class="form-group">
                <label for="message">Message</label>
                <textarea cols="30" rows="5" class="form-control" name="content" required></textarea>
            </div>
            <div class="form-group">
                <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
            </div>
            <div class="form-group">
                <button type="submit" id="post" class="loginbtn">Post Comment</button>
            </div>
        </form>
      </div>
       <div class="row">
         @foreach($comment as $row)
         @foreach($user as $data)
         @if($row->iduser == $data->id) 
         <div class="col-md-12 mt-4 mb-4 tabs_comment">
          <div class="media">
            <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{ asset('/image/user_image/' . $data->image) }}" />
            <div class="media-body">
              <div class="row">
               <div class="col-8 d-flex">
                  <h5>{{$data->name}}</h5>
                <span>{{$row->created_at}}</span>
               </div>
               <div class="col-4">
               <div class="pull-right reply">
              <button type="button" class="replybtn"><span><i class="fa fa-reply"></i> reply</span></button>
               </div>
               </div>
              </div>		
              {{$row->content}}     
              @foreach($replycomment as $reply)
              @if($reply->idcomment == $row->id)   
              @foreach($user as $name)
              @if($name->id == $reply->iduser) 
              <div class="media mt-4">
                 <a class="pr-3" href="#"><img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{ asset('/image/user_image/' . $name->image) }}" /></a>
                <div class="media-body">
                  <div class="row">
               <div class="col-12 d-flex">  
                  <h5>{{$name->name}}</h5>
                <span>{{$reply->created_at}}</span>
               </div>      
              </div>
                  {{$reply->content}}
                </div>
              </div>
              @endif
				      @endforeach
              @endif
				      @endforeach
              <div class="form_reply mt-4">
                <form id="algin-form" method="POST" action="{{url('comment_reply',$row->id)}}">
                @csrf
                    <div class="form-group">
                       <label for="message">Message</label>
                        <textarea cols="30" rows="5" class="form-control" name="replycontent" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit"  id="post" class="loginbtn">Post Comment</button>
                    </div>
                </form>
              </div>   
            </div>
          </div> 
        </div>
        @endif
				@endforeach
				@endforeach
       </div>
     </div>
   </div>
   </div>
   
 </div>
 
</body>
<script>
  let tabs_cmt = document.querySelectorAll(".tabs_comment");
  let replycomment = document.querySelectorAll(".form_reply");
  let replyBtn = document.querySelectorAll(".replybtn");

  tabs_cmt.forEach((element, index) => {
    replyBtn[index].onclick = function () {
      replycomment[index].style.display = "block";
    }
  });

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
@endsection('content')