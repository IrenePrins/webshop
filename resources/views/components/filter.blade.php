<div class="row">
    <div class="col-md-8">
        <div class="dropdown show">
            <form action="{{ route('filter') }}">
                <div class="form-group">
                    <label for="sel1">Select filter:</label>
                    <select class="form-control" id="sel1">
                        <option>Boots</option>
                        <option>Heels</option>
                        <option>Sandals</option>
                        <option>Sneakers</option>
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