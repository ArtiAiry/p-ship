<?php

?>
<div class="card-deck">
    <div class="owl-carousel owl-theme " id="carusel1">
        <?php foreach($wallets as $wallet):?>
            <div class="item">
             <div class="card custom">
                <div class="zoom">
                    <img class="card-img-top" src="/images/partnership-product.png" alt="Card image cap">
                </div>
                    <div class="card-body">
                        <h5 class="card-title">Wallet <?= $wallet->id ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Type: Cras justo odio</li>
                                <li class="list-group-item">Payout: <?= $wallet->payout_type_id ?></li>
                                <li class="list-group-item">Yandex: <?= $wallet->yandex_money ?></li>
                                <li class="list-group-item">Webmoney: <?= $wallet->webmoney_wmr ?></li>
                                <li class="list-group-item">Paypal: <?= $wallet->paypal_eur ?></li>
                                <li class="list-group-item">Sberbank: <?= $wallet->sberbank_rub ?></li>
                                <li class="list-group-item">User: <?= $wallet->user->username ?></li>
                                <li class="list-group-item">
                                    <a href="#" class="btn btn-primary">Card link</a>
                                    <a href="#" class="btn btn-primary">Banner link</a>
                                </li>
                            </ul>
                     </div>
                </div>
            </div>
    <?php endforeach; ?>
     </div>
 </div>


