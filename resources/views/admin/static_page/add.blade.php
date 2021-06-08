<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            @if(isset($static_page))
                {{ __('admin.Edit') }} {{ $static_page->name }}
            @else
                {{ __('admin.Add new page') }}
            @endif
        </h2>
        <a href="{{ route('admin_static_page_list') }}">{{ __('admin.Back to list') }}</a>
    </x-slot>

    <div class="p-10">
      <x-admin.form>
          <x-admin.basic-errors />
         
           <x-inputs.basic-text name="name" label="{{ __('admin.Page name') }}" value="{{ $static_page->name ?? old('name')}}" required />

           <x-inputs.basic-wysiwyg name="content" label="{{ __('admin.Content') }}" value="{{ $static_page->content ?? old('content') }}" />

        
      </x-admin.form>
    </div>

</x-admin-layout>