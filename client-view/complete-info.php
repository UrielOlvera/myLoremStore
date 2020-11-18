<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

<script src="https://js.stripe.com/v3/"></script>
<div class="container" style="display: flex; justify-content: center;">
    <div class="card-panel teal darken-4 z-depth-3" style="width: 60%;">
        <form action="../client-view/addDetails.php" method="POST" id="payment-form">
            <div class="card-content white-text center-align">
                <h4>Complete Information</h4>
                <div class="row">
                    <div class="input-field col m6 l6 white-text">
                        <input id="firstName" name="firstName" type="text" class="validate" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="input-field col m6 l6 white-text">
                        <input id="lastName" name="lastName" type="text" class="validate" required>
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 l6 white-text">
                        <input id="email" name="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col m6 l6 white-text">
                        <input id="phone" name="phone" type="text" class="validate" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field white-text">
                        <textarea id="comentary" name="comentary" class="materialize-textarea"></textarea>
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
                <button type="submit" class="waves-effect waves-light btn" style="width: 100%;">
                    Send<i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
<script src="../assets/js/checkout.js"></script>