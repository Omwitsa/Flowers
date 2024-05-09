<div class="card">
    <div class="card-header">
        <h5>Variety Range</h5>
    </div>
    <div class="card-block">
        <form wire:submit="updateRange" class="form-material" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label class="col-xs-12 col-sm-2 col-form-label">Name</label>
                <div class="col-xs-12 col-sm-4">
                    <input wire:model="Name" name="Name" type="text" class="form-control" autocomplete="off" required>
                    <x-input-error :messages="$errors->get('Name')" class="mt-2" />
                </div>

                <label class="col-xs-12 col-sm-2 col-form-label">Head Size</label>
                <div class="col-xs-12 col-sm-4">
                    <input wire:model="HeadSize" name="HeadSize" type="text" class="form-control" autocomplete="off" required>
                    <x-input-error :messages="$errors->get('HeadSize')" class="mt-2" />
                </div>

                <label class="col-xs-12 col-sm-2 col-form-label">Brand</label>
                <div class="col-xs-12 col-sm-4">
                    <select wire:model="Brand" class="form-control" required>
                        <option disabled value=""></option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('Brand')" class="mt-2" />
                </div>
            </div>

            <div class="form-group row">
                <div class="form-check form-check-inline">
                    <input wire:model="active" class="form-check-input" type="checkbox" id="active">
                    <label class="form-check-label" for="active">Active</label>
                </div>
            </div><br>

            <br><button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
        </form> 
    </div>
</div>
