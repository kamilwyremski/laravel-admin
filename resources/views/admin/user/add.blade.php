<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            @if(isset($user))
                {{ __('admin.Edit') }} {{ $user->name }}
            @else
                {{ __('admin.Add new user') }}
            @endif
        </h2>
        <a href="{{ route('admin_user_list') }}">{{ __('admin.Back to list') }}</a>
    </x-slot>

    <div class="p-10">
      <x-admin.form>
          <x-admin.basic-errors />
         
           <x-inputs.basic-text name="name" label="{{ __('admin.Name') }}" value="{{ $user->name ?? old('name')}}" required autofocus />

           <x-inputs.basic-text name="email" type="email" label="{{ __('admin.Email') }}" value="{{ $user->email ?? old('email')}}" required />

           <x-inputs.basic-text name="password" type="password" label="{{ __('admin.Password') }}" value="{{old('password')}}" />

            <x-inputs.basic-text name="password_confirmation" type="password" label="{{ __('admin.Repeat password') }}" value="{{old('password_confirmation')}}" />

            <x-inputs.basic-checkbox name="active" label="{{ __('admin.Active') }}" value="{{ $user->email_verified_at ?? old('active')}" />
        
      </x-admin.form>
    </div>

</x-admin-layout>