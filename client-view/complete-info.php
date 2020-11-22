<script src="https://js.stripe.com/v3/"></script>
<div class="container">
    <div class="row">
        <div class="col m2"></div>
        <div class="col m8">
            <div class="card blue-grey darken-3 z-depth-3">
                <form action="../client-view/addDetails.php" method="POST" id="payment-form">
                    <div class="card-content  white-text center-align">
                        <h4>Complete Information</h4>
                        <div class="row">
                            <div class="input-field col m6 l6">
                                <input id="firstName" name="firstName" type="text" class="validate white-text" required>
                                <label for="firstName">First Name</label>
                            </div>
                            <div class="input-field col m6 l6">
                                <input id="lastName" name="lastName" type="text" class="validate white-text" required>
                                <label for="lastName">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 l6">
                                <input id="email" name="email" type="email" class="validate white-text" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col m6 l6">
                                <input id="phone" name="phone" type="text" class="validate white-text" required>
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <textarea id="comentary" name="comentary" class="materialize-textarea white-text"></textarea>
                                <label for="comentary">Comentary</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        <button type="submit" class="waves-effect waves-light btn btn-block">
                            Send<i class="right fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col m2"></div>
    </div>
</div>
<script src="../assets/js/checkout.js"></script>