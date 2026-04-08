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
<button class="btn btn-primary" type="submit">Save</button>
