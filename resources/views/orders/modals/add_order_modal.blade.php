<div class="modal" id="add_new_modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Order</p>
            <div class="delete is-danger" aria-label="close" id="close_add_new"></div>
        </header>
        <section class="modal-card-body">
            <div id="pos">
                <nav class="panel">
                    <p class="panel-heading">
                        Sale
                    </p>
                    <p class="panel-tabs">
                        <a class="is-active">New Sale</a>
                    </p>
                    <div class="panel-block">
                        <p class="control has-icons-left">
                            <input class="input" type="text" placeholder="Enter upc code" v-model="upc">
                            <span class="icon is-left">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
                        </p>
                        <button class="button is-primary" @Click="addItem">Search</button>
                    </div>
                    <h1>Sale Items</h1>

                    <div class="panel-block">

                        <div style="min-height: 200px">
                            <ul>
                                <li v-for="(product, index) in products" class="list-item">@{{product.name + ' | $' + product.price}} <i @click="removeItem(index)" style="color:#ff0000" class="fa fa-times" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-block">
                        <div class="control">
                            <p>Total : $@{{ total }}</p>
                        </div>
                    </div>

                    <label class="panel-block">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="paytype" value="cash" checked>
                                Cash
                            </label>
                            <label class="radio">
                                <input type="radio" name="paytype" value="credit">
                                Credit
                            </label>
                        </div>
                    </label>
                    <div class="panel-block">
                        <p class="control">Enter total amount paid</p>
                        <input class="input" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Pay Amount" v-model="paid">
                    </div>
                    <div class="panel-block">
                        <button class="button is-link is-outlined is-fullwidth" @click="completeSale">
                            Complete Sale
                        </button>
                    </div>
                </nav>
            </div>
        </section>

    </div>
</div>