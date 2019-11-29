<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Add Shift</p>
            <div class="delete is-danger" aria-label="close" id="close_add_new"></div>
        </header>
        <section class="modal-card-body">
            <form method="POST" action="/shifts">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label">Employee Number</label>
                    <div class="control">
                        <input @click="showClockIn" class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
                    </div>
                    <br />
                    <div class="control has-text-centered">
                        <button class="button is-link is-outlined is-rounded" type="submit">Enter</button>
                    </div>
                </div>
                <div style="display: none" class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Add New Shift</button>
                    </div>
                    <div class="control">
                        <a href="/employees" class="button is-link">Cancel</a>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>