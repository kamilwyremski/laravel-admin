<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            @if(isset($blog))
                {{ __('admin.Edit') }} {{ $blog->name }}
            @else
                {{ __('admin.Add new post') }}
            @endif
        </h2>
        <a href="{{ route('admin_blog_list') }}">{{ __('admin.Back to list') }}</a>
    </x-slot>

    <div class="p-10">
      <x-admin.form>
          <x-admin.basic-errors />
         
           <x-inputs.basic-text name="name" label="{{ __('admin.Post name') }}" value="{{ $blog->name ?? old('name')}}" required />

           <x-inputs.basic-wysiwyg name="content" label="{{ __('admin.Content') }}" value="{{ $blog->content ?? old('content') }}" />

            <x-inputs.basic-filemanager name="thumb" label="{{ __('admin.Thumb') }}" value="{{ $blog->thumb ?? old('thumb')}}" />

            <x-inputs.basic-textarea name="lid" label="{{ __('admin.Introduction') }}" value="{{ $blog->lid ?? old('lid')}}" />

            <x-inputs.basic-textarea name="description" label="{{ __('admin.Description SEO') }}" value="{{ $blog->description ?? old('description')}}" />

            <x-inputs.basic-text name="keywords" label="{{ __('admin.Keywords') }}" value="{{ $blog->keywords ?? old('keywords')}}" />
      </x-admin.form>
    </div>

</x-admin-layout>