@extends('layout')
@section('title','Registration')
@section('body')
@push('css')
    <link rel="stylesheet" href=".. /resources/css/style.css">
@endpush

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif
<div class="container">
        <form name="registrationForm" method="post" action="{{ route('user.store') }}"  enctype="multipart/form-data">
        @csrf
            <div class="input-field">
                <label for="full-name"> Full Name</label>
                <input type="text" name="fullname" id="full-name" ><span id="fnameErr">*</span><br>
            </div>
            
            <div class="input-field">
                <label for="user-name">User Name</label>
                <input type="text" name="username" id="user-name"><span id="unameErr">*</span><br>
            </div>
             
            <div class="input-field">
                <label for="birthday"> Birthday</label>
                <input type="date" name="birthday" id= "birthday"><span id="birthdayErr">*</span><br>
            </div>
           
            <div class="input-field">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email"><span id="emailErr">*</span><br>
            </div>
        
            <div class="input-field">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone"><span id="phoneErr">*</span><br>
            </div>
             
            <div class="input-field">
                <label for="address">Address</label> 
                <input type="text" name="address" id="address"><span id="addressErr">*</span><br>
            </div>
            
            <div class="input-field">
                <label for="pwd"> Password</label>
                <input type="password" name="password"id="pwd"><span id="passwordErr">*</span><br>
            </div>
            
            <div class="input-field">
                <label for="pwd-confirm">Confirm Password</label>
                <input type="password" name="passwordconfirmation"id="pwd-confirm"><span id="password2Err">*</span><br>
            </div>
            
            <div class="input-field">
                <label for="image">User Image</label>
                <input type="file" name="image" id="image" /><span id="imageErr">*</span><br>
            </div>
        
            <button type="submit">submit</button>
        </form>
    </div>
@endsection
