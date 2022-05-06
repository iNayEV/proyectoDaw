
                <div class="google-div">
                    <span class="d-flex-login">Continuar con Liberty</span>
                </div>
            </a>
            <?php require ("auth.php") ?>
            <a href="<?php echo $client->createAuthUrl() ?>" class="text-dec-none">
                <div class="google-div">
                    <span class="d-flex-login"><img src="uploads/google.png" width="25px" alt="">Continuar con Google</span>
                </div>
            </a>
        </div>
    </div>
</div>