@extends('layouts.frontend.app')
@section('content')
<!-- Profile Start -->
<div class="dashboard container">
    <!-- Sidebar -->
    @include('frontend.includes.frontend.dashboard.sidbar')

    <!-- Main Content -->
    <div class="main-content ">
        <!-- Settings Section -->
        <section id="settings" class="content-section active">
            <h2>Settings</h2>
            <form class="settings-form" action="{{ route('frontend.dashboard.updateSetting') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="username">Name:</label>
                    <input type="text" name="name" id="username" value="{{ $user->name }}" />
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="{{ $user->username }}" /> 
                     @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" />
                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profile-image">Profile Image:</label>
                    <input type="file" name="image" id="profile-image" accept="image/*" />
                    	<img src="{{asset($user->image)}}" alt="{{$user->name}}" style="width: 200px;">
                      @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                       <input type="hidden" value="{{asset($user->image)}}" name="oldImage">
                </div>

                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" value="{{ $user->country }}" />
                      @error('country')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" value="{{ $user->city }}" />
                      @error('city')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" value="{{ $user->street }}" />
                      @error('street')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
               <div class="form-group">
                    <label for="street">Phone:</label>
                    <input type="text" name="phone" id="street" value="{{ $user->phone }}" />
                      @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="save-settings-btn">
                    Save Changes
                </button>
            </form>

            <!-- Form to change the password -->
            <form action="{{ route('frontend.dashboard.setting.change-password') }}" method="POST" class="change-password-form">
                @csrf
                <h2>Change Password</h2>
                <div class="form-group">
                    <label for="current-password">Current Password:</label>
                    <input type="password" name="currentPassword" id="current-password" placeholder="Enter Current Password" />
                 @error('currentPassword')
                     <strong class="text-danger">{{ $message }}</strong>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" name="password" id="new-password" placeholder="Enter New Password" />
                   @error('password')
                     <strong class="text-danger">{{ $message }}</strong>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm New Password:</label>
                    <input type="password" name="password_confirmation" id="confirm-password" placeholder="Enter Confirm New " />
                </div>
                <button type="submit" class="change-password-btn">
                    Change Password
                </button>
            </form>
        </section>
    </div>
</div>
<!-- Profile End -->

@endsection
@section('title')
{{ config('app.name') }} | Setting
@endsection
