<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name') ?? $menu->name ?? null }}" required>
    </div>
</div>

<div class="form-group row">
    <input type="submit" value="{{ __('Save') }}">
</div>
