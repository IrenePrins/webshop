<div class="row">
    <div class="col-md-8">
        <div class="dropdown show">
            <form action="{{ route('filter') }}">
                <div class="form-group">
                    <label for="sel1">Select filter:</label>
                    <select class="form-control" id="sel1" name="filter">
                        <option value="Boots">Boots</option>
                        <option value="Heels">Heels</option>
                        <option value="Sandals">Sandals</option>
                        <option value="Sneakers">Sneakers</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
{{-- 
<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filter
    </a> --}}