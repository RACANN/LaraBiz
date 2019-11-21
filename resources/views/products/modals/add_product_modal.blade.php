<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modal title</p>
            <div class="delete is-danger" aria-label="close" id="close_add_new"></div>
        </header>
        <section class="modal-card-body">
            <form method="POST" action="/products">
                {{ csrf_field() }}
                <div class="field">
                    <label>UPC</label>
                    <div class="control">
                        <input class="input" type="text"  name="upc">
                    </div>
                </div>

                <div class="field">
                    <label>Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name" required>
                    </div>
                </div>

                <div class="field">
                    <label>Description</label>
                    <div class="control">
                        <input class="input" type="text"  name="description" required>
                    </div>
                </div>

                <div class="field">
                    <label>Cost</label>
                    <div class="control">
                        <input class="input" type="text" name="cost" required>
                    </div>
                </div>

                <div class="field">
                    <label>Price</label>
                    <div class="control">
                        <input class="input" type="text" name="price" required>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Add Item</button>
                    </div>
                    <div class="control">
                        <div class="button is-link" id="btn_cancel_add_new">Cancel</div>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>