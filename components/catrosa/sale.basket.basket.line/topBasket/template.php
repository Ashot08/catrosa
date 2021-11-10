<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<a href="<?= $arParams["PATH_TO_BASKET"] ?>" class="cart-header"><!-- BASKET -->
    <?php if(count($arParams["PRODUCTS_IN_CARD"])): ?>
<!--        <span class="basket__products-count">--><?php //count($arParams["PRODUCTS_IN_CARD"]); ?><!--</span>-->
    <?php endif; ?>
    <div>
        <?= number_format($arResult["FULL_PRICE"], 0, ',', ' ') ?> €
    </div>

</a>
