<div>
    <h2 class="mb-4">Create Client</h2>
    <form wire:submit="store" class="space-y-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name">
            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input wire:model.defer="surname" type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Enter surname">
            @error('surname') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input wire:model.defer="company" type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Enter company">
            @error('company') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input wire:model.defer="position" type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Enter position">
            @error('position') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input wire:model.defer="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone">
            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea wire:model.defer="observation" class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation" rows="3" placeholder="Enter observation"></textarea>
            @error('observation') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-between">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
