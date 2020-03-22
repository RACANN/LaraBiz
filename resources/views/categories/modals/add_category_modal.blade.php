<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Category</p>
            <div class="delete is-danger" aria-label="close" id="close_add_new"></div>
        </header>
        <section class="modal-card-body">
            <form method="POST" action="/categories">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name" maxlength="20" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="taxable"  value=1 checked>
                            Yes
                        </label>
                        <label class="radio">
                            <input type="radio" name="taxable" value=0>
                            No
                        </label>
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