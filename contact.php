<?php
  session_start();
  include "parts\_header.php"
?>

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <div class="blog__details__title">
              <h6>Action, Magic <span>- December 11, 2022</span></h6>
              <h2>MyGames: All your favorite games in one place</h2>
              <div class="blog__details__social">
                <a href="#" class="facebook"
                  ><i class="fa fa-facebook-square"></i> Facebook</a
                >
                <a href="#" class="pinterest"
                  ><i class="fa fa-pinterest"></i> Pinterest</a
                >
                <a href="#" class="linkedin"
                  ><i class="fa fa-linkedin-square"></i> Linkedin</a
                >
                <a href="#" class="twitter"
                  ><i class="fa fa-twitter-square"></i> Twitter</a
                >
              </div>
            </div>
          </div>
          
                <div class="row">
                  <div class="col-lg-6">
                    
                  </div>
                  <div class="col-lg-6">
                    <div class="blog__details__btns__item next__btn">
                      <h5>
                        
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="blog__details__comment">
                <h4>3 Comments</h4>
                <div class="blog__details__comment__item">
                  <div class="blog__details__comment__item__pic">
                    <img src="img/blog/details/comment-1.png" alt="" />
                  </div>
                  <div class="blog__details__comment__item__text">
                    <span>Sep 08, 2020</span>
                    <h5>Olivia Smith</h5>
                    <p>
                      Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                      amet, consectetur, adipisci velit, sed quia non numquam
                      eius modi
                    </p>
                    <a href="#">Like</a>
                    <a href="#">Reply</a>
                  </div>
                </div>
                <div
                  class="blog__details__comment__item blog__details__comment__item--reply"
                >
                  <div class="blog__details__comment__item__pic">
                    <img src="img/blog/details/comment-2.png" alt="" />
                  </div>
                  <div class="blog__details__comment__item__text">
                    <span>Sep 08, 2020</span>
                    <h5>Elizabeth Perry</h5>
                    <p>
                      Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                      amet, consectetur, adipisci velit, sed quia non numquam
                      eius modi
                    </p>
                    <a href="#">Like</a>
                    <a href="#">Reply</a>
                  </div>
                </div>
                <div class="blog__details__comment__item">
                  <div class="blog__details__comment__item__pic">
                    <img src="img/blog/details/comment-3.png" alt="" />
                  </div>
                  <div class="blog__details__comment__item__text">
                    <span>Sep 08, 2020</span>
                    <h5>Adrian Coleman</h5>
                    <p>
                      Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                      amet, consectetur, adipisci velit, sed quia non numquam
                      eius modi
                    </p>
                    <a href="#">Like</a>
                    <a href="#">Reply</a>
                  </div>
                </div>
              </div>
              <div class="blog__details__form">
                <h4>Leave A Comment</h4>
                <form action="#">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <input type="text" placeholder="Name" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <input type="text" placeholder="Email" />
                    </div>
                    <div class="col-lg-12">
                      <textarea placeholder="Message"></textarea>
                      <button type="submit" class="site-btn">
                        Send Message
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Details Section End -->

<?php
	include_once "parts\_footer.php"
?>