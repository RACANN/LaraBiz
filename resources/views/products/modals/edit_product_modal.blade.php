div class="modal" id="add_new_modal">
<div class="modal-background"></div>
<div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">Modal title</p>
        <div class="delete is-danger" aria-label="close" id="close_edit"></div>
    </header>
    <section class="modal-card-body">
        <form method="POST" action="/products/{{$product->id}}">
            {{ csrf_field() }}
            <div class="field">
                <label class="label is-danger">UPC</label>
                <div class="control">
                    <input class="input" type="text" name="upc" value="{{$product->upc}}" required>
                </div>
            </div>

            <div class="field">
                <label class="label is-danger">Name</label>
                <div class="control">
                    <input class="input" type="text" name="name" value="{{$product->name}}" required>
                </div>
            </div>

            <div class="field">
                <label class="label is-danger">Description</label>
                <div class="control">
                    <input class="input" type="text"  name="description" value="{{$product->description}}" required>
                </div>
            </div>

            <div class="field">
                <label class="label is-danger">Cost</label>
                <div class="control">
                    <input class="input" type="text" name="cost"  value="{{$product->cost}}" required>
                </div>
            </div>

            <div class="field">
                <label class="label is-danger">Price</label>
                <div class="control">
                    <input class="input" type="text" value="{{$product->price}}" name="price" required>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Add Item</button>
                </div>
                <div class="control">
                    <button class="button is-text">Cancel</button>
                </div>
            </div>
        </form>
    </section>

</div>
</div>