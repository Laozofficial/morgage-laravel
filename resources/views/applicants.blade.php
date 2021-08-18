@extends('layouts.app')

@section('content')
    @include('layouts.header')
<!-- inner-banner -->
<section class="inner-banner" id="home" {{asset('images/innerbanner.jpg')}}>
	<div class="inner-layer">
		<div class="container">
		</div>
	</div>
</section>
<!-- //inner-banner -->

<!-- breadcrumb -->
<div class="breadcrumb-w3pvt">
	<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
			</li>
			<li class="breadcrumb-item" aria-current="page">Applicants</li>
		</ol>
	</nav>
	</div>
</div>
<!-- //breadcrumb -->


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Work Place</th>
                <th scope="col">Bank Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Bvn</th>
                <th scope="col">Drivers Licence</th>
                <th scope="col">Avatar</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->full_name }}</td>
                <td>{{$user->work_place}}</td>
                <td>{{ $user->bank_name }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{$user->bvn}}</td>
                <td><img src="{{$user->full_avatar_image_path}}"/></td>
                <td><img src="{{$user->full_licence_image_path}}"/></td>
                <td>{{$user->address}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>

            </tr>
            @endforeach
        </tbody>
        </table>
</div>



@endsection
