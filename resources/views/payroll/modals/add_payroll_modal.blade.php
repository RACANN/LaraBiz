<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Run New Payroll</p>
            <div class="delete is-danger" aria-label="close" id="close_add_new"></div>
        </header>
        <section class="modal-card-body">
            <form method="POST" action="/payrolls">
                {{ csrf_field() }}
                <input type="hidden" name="origin" value="manager">
                <div class="field">
                    <label class="label is-danger">Pay Period Start</label>
                    <div class="control">
                        <input class="input" type="datetime-local" name="start_date" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-danger">Interval</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="interval"  value=1 checked>
                            1 Week
                        </label>
                        <label class="radio">
                            <input type="radio" name="interval" value=2>
                            2 Weeks
                        </label>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Run Payroll</button>
                    </div>
                    <div class="control">
                        <a href="/payrolls" class="button is-link">Cancel</a>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>