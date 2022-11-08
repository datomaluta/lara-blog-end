<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name='title' :value="old('title', $post->title)" />
            <x-form.input name='slug' :value="old('slug', $post->slug)" />
            <div>
                <x-form.input name='thumbnail' type="file" :value="old('thumbnail', $post->thumbnail)" />
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="ssss" class="rounded-xl" width="100">
            </div>
            <x-form.textarea name='excerpt'>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name='body'>{{ old('body', $post->body) }}</x-form.textarea>




            <x-form.field class="mb-6">
                <x-form.label name="Category" />

                <select name="category_id" id="category_id" required>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach

                </select>

                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>

</x-layout>
