<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            {{ __('admin.Settings') }}
        </h2>
    </x-slot>

    <div class="p-10">
      <x-admin.form>
            <x-admin.basic-errors />
         
            <x-inputs.basic-text name="title" label="{{ __('admin.Title SEO') }}" value="{{ config('settings.title') }}" required autofocus />
        
      </x-admin.form>
    </div>

</x-admin-layout>