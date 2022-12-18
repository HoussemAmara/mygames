<?php
  session_start();

	include "parts\_header.php"
?>

    <section class="product spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="trending__product">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                  <div class="section-title">
                    <h4>Black Jack</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container2">
        <div class="container1">
          <h2>Dealer:<span id="dealer-sum"></span></h2>
          <div id="dealer-cards">
            <img id="hidden" src="./cards/BACK.png" />
          </div>
          <h2>You:<span id="your-sum"></span></h2>
          <div id="your-cards"></div>
          <br />
          <div>
            <button id="hit">Hit</button>
            <button id="stay">Stay</button>
            <button id="start">Start</button>
          </div>
          <div class="result">
            <div class="result">
              <p id="results"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
	include_once "parts\_footer.php"
?>