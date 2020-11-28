<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Employee</p>
            <div class="delete is-danger close" aria-label="close"></div>
        </header>
        <section class="modal-card-body">
            <form method="POST" action="/employees">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label">User</label>
                    <div class="field">
                        <select name="user_id" type="email" required>
                            @foreach($user_ids as $user_id)
                                <option value="{{$user_id->id}}">{{$user_id->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Employee Number</label>
                    <div class="control">
                        <input class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">First Name</label>
                    <div class="control">
                        <input class="input" type="text" name="first_name" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Last Name</label>
                    <div class="control">
                        <input class="input" type="text"  name="last_name" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Social Security Number</label>
                    <div class="control">
                        <input class="input" type="text" name="ssn" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Birth Date</label>
                    <div class="control">
                        <input class="input" type="date" name="birth_date" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Hire Date</label>
                    <div class="control">
                        <input class="input" type="date" name="hire_date" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="text" name="phone" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Pay</label>
                    <div class="control">
                        <input class="input" type="text" name="pay" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Position</label>
                    <div class="control">
                        <input class="input" type="text" name="position" required>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Add Item</button>
                    </div>
                    <div class="control">
                        <div class="button is-link close">Cancel</div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>