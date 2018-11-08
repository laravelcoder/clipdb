@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('title', "Pro")


@section('content')

<section class="content-header">
	<h1>
		User Profile
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">User profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					{{-- https://docs.spatie.be/laravel-medialibrary/v7/basic-usage/retrieving-media --}}
					{{-- https://www.youtube.com/watch?v=G71igfoSrWM&index=4&list=PLe30vg_FG4ORLxQcrsJdGAuo_AVnLSKvG --}}

					@foreach($avatars as $avatar)
 					<img class="profile-user-img img-responsive" src="{{ $avatar->getUrl() }}" alt="User profile picture">
 					@endforeach

					<h3 class="profile-username text-center">{{ @$user->name }}</h3>

{{--               <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
            </ul> --}}

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
{{--     <div class="box box-primary">
    	<div class="box-header with-border">
    		<h3 class="box-title">About Me</h3>
    	</div>
    	<!-- /.box-header -->
    	<div class="box-body">
    		<strong><i class="fa fa-book margin-r-5"></i> Education</strong>

    		<p class="text-muted">
    			B.S. in Computer Science from the University of Tennessee at Knoxville
    		</p>

    		<hr>

    		<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

    		<p class="text-muted">Malibu, California</p>

    		<hr>

    		<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

    		<p>
    			<span class="label label-danger">UI Design</span>
    			<span class="label label-success">Coding</span>
    			<span class="label label-info">Javascript</span>
    			<span class="label label-warning">PHP</span>
    			<span class="label label-primary">Node.js</span>
    		</p>

    		<hr>

    		<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
    	</div>
    	<!-- /.box-body -->
    </div> --}}
    <!-- /.box -->

{{-- <article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="https://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
      </p>
    </div>
    <nav class="level is-mobile">
      <div class="level-left">
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-reply"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-retweet"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-heart"></i></span>
        </a>
      </div>
    </nav>
  </div>
  <div class="media-right">
    <button class="delete"></button>
  </div>
</article> --}}
</div>
<!-- /.col -->
<div class="col-md-9">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
			<li><a href="#timeline" data-toggle="tab">Timeline</a></li>
			<li><a href="#settings" data-toggle="tab">Settings</a></li>
		</ul>
		<div class="tab-content">
			<div class="active tab-pane" id="activity">
				<!-- Post -->
				<div class="post">
        {{--           <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>

                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment"> --}}
              </div>
              <!-- /.post -->

              <!-- /.post -->


          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
          	<!-- The timeline -->

          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
          	{{-- <form class="form-horizontal"> --}}
          		{!! Form::open(['method' => 'POST', 'route' => ['admin.avatar.store'], 'files' => true, 'enctype' => 'multipart/form-data', 'class'=> 'form-horizontal']) !!}
          		@csrf
          		<div class="form-group ">
          			<label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
          			<div class="col-sm-10">
          				<input type="file" name="avatar" id="exampleInputFile">
          			</div>

          			<p class="help-block"></p>
          		</div>

{{-- 
          		<div class="form-group">

          			{!! Form::label('name', trans('global.users.fields.name').'*', ['class' => 'col-sm-2 control-label']) !!}

          			<div class="col-sm-10">

          				{!! Form::text('name', old('name'), ['id'=>'inputName','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
          			</div>
          			<p class="help-block"></p>
          			@if($errors->has('name'))
          			<p class="help-block">
          				{{ $errors->first('name') }}
          			</p>
          			@endif
          		</div> --}}
        {{--   		<div class="form-group">
          			{!! Form::label('email', trans('global.users.fields.email').'*', ['class' => 'col-sm-2 control-label']) !!}
          			<div class="col-sm-10">
          				{!! Form::email('email', old('email'), ['id'=>'inputEmail','class' => 'form-control', 'placeholder' => 'Email', 'required' => '']) !!}
          			</div>
          			<p class="help-block"></p>
          			@if($errors->has('email'))
          			<p class="help-block">
          				{{ $errors->first('email') }}
          			</p>
          			@endif
          		</div> --}}



               {{--    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                </div> --}}
                <div class="form-group">
                	<div class="col-sm-offset-2 col-sm-10">
                		{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
                		{{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                	</div>
                </div>
                {!! Form::close() !!}
            {{-- </form> --}}
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>



@stop

@section('javascript')

@endsection
