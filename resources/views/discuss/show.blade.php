@extends('layouts.master')


@section('content')
	


	<div class="container">

	<!-- <div>
		<a href="#" class="btn btn-primary pull-left"><< Prev</a>
		<a href="#" class="btn btn-primary pull-right">Next >></a>
	</div> -->

	<div class="clearfix"></div>
	<br>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Discussion</h3>
	  </div>
	  <div class="panel-body" style="font-size: 17px;color: #000;">
	    
	    <h4>{{ $discussion->question }}</h4>

	   
	  </div>
	</div>

	<div class="page-header">
		<h5>Comments</h5>
	</div>




	@foreach($discussion->comments as $comment)
       
       <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="font-weight: bold;">{{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</h3>
		  </div>
		  <div class="panel-body">
		    <div class="media"> 
		      <div class="media-body" style="font-size: 16px;color: #000"> {!! $comment->body !!} </div> 
		      <br><br>
		    </div>
		  </div>
		   <div class="panel-footer">
		   	<a href="/comment/{{$comment->id}}/like"><i class="fa fa-thumbs-up"></i> {{ $comment->likes }}</a> |  <a href="/comment/{{$comment->id}}/dislike"><i class="fa fa-thumbs-down"></i> {{ $comment->dislikes }}</a> 
		   </div>
		</div>


	@endforeach




	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Add New Comment ( You can use latex for writing mathematics )</h3>
	  </div>
	  <div class="panel-body">
	  <form method="POST" action="/comments/{{ $question->id }}">
	    {{ csrf_field() }}
	     <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
	   
    
	    <textarea id="marked-mathjax-input" name="comment" rows="8" class="form-control"></textarea>

    </div>
       
       <br>

    	<button class="btn btn-success" type="submit">Post Comment</button>	


       </form>
	    
	  </div>
	</div>

	</div>

@endsection


@section('js')
  


  <script type="text/javascript" src="/js/functions.js"></script>

@endsection