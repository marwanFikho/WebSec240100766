<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', optional($product)->name) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ old('price', optional($product)->price) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3" required>{{ old('description', optional($product)->description) }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Quantity In Stock</label>
    <input type="number" min="0" name="stock_quantity" class="form-control" value="{{ old('stock_quantity', optional($product)->stock_quantity) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control">
        <option value="">-- None --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (string) old('category_id', optional($product)->category_id) === (string) $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Tags</label>
    <div>
        @php
            $selectedTags = old('tags', isset($product) ? $product->tags->pluck('id')->toArray() : []);
        @endphp
        @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
