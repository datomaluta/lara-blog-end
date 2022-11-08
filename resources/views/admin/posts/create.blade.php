<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name='title' />
            <x-form.input name='slug' />
            <x-form.input name='thumbnail' type="file" />
            <x-form.textarea name='excerpt' />
            <x-form.textarea name='body' />




            <x-form.field class="mb-6">
                <x-form.label name="Category"/>

                <select name="category_id" id="category_id" required>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach

                </select>

                <x-form.error name="category_id"/>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
    
</x-layout>
