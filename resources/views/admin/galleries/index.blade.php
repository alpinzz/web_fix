<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery Management') }}
        </h2>
    </x-slot>

    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
        <style>
            .filepond--root {
                max-width: 100%;
            }
        </style>
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Upload Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Upload Photos') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Upload multiple photos for the gallery. Max size 2MB per photo. Allowed formats: JPG, PNG, JPEG.') }}
                        </p>
                    </header>

                    <div class="mt-6">
                        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                            @csrf
                            <input type="file" 
                                   class="filepond"
                                   Name="images[]" 
                                   multiple 
                                   data-max-file-size="2MB"
                                   data-max-files="10" 
                                   accept="image/png, image/jpeg, image/jpg"
                            />
                            <!-- Fallback button if JS fails, though FilePond handles submit usually -->
                            <div class="flex items-center gap-4 mt-4">
                                <x-primary-button>{{ __('Upload Files') }}</x-primary-button>
                            
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <!-- Gallery Grid -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Existing Photos') }}
                    </h2>
                </header>

                @if($galleries->isEmpty())
                    <p class="text-gray-500 text-sm">No photos uploaded yet.</p>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($galleries as $gallery)
                            <div class="relative group bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                                
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Register plugins
                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateSize,
                    FilePondPluginFileValidateType
                );

                // Get a reference to the file input element
                const inputElement = document.querySelector('input[type="file"].filepond');

                // Create a FilePond instance
                const pond = FilePond.create(inputElement, {
                    storeAsFile: true, // Important: This makes FilePond act like a normal file input
                    maxFileSize: '2MB',
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                    labelIdle: 'Drag & Drop your photos or <span class="filepond--label-action">Browse</span>',
                });
            });
        </script>
    @endpush
</x-app-layout>
